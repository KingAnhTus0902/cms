<?php

namespace App\Services\User;

use App\Helpers\QueryHelper;
use App\Helpers\RoleHelper;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserRoom\UserRoomRepositoryInterface;
use App\Services\FileService\FileServiceInterface;
use App\Services\Mail\MailServiceInterface;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Throwable;

class UserService implements UserServiceInterface
{
    /** @var string */
    protected const PATH_FILE = '/users';

    /** @var UserRepositoryInterface */
    protected UserRepositoryInterface $userRepository;

    /** @var DepartmentRepositoryInterface */
    protected DepartmentRepositoryInterface $departmentRepository;

    /** @var RoleRepositoryInterface */
    protected RoleRepositoryInterface $roleRepository;

    /** @var MailServiceInterface */
    protected MailServiceInterface $mailService;

    /** @var FileServiceInterface */
    protected FileServiceInterface $fileService;

    /** @var UserRoomRepositoryInterface */
    protected UserRoomRepositoryInterface $userRoomService;

    /**
     * Base construction Admin
     *
     * @param UserRepositoryInterface $userRepository
     * @param DepartmentRepositoryInterface $departmentRepository
     * @param RoleRepositoryInterface $roleRepository
     * @param MailServiceInterface $mailService
     * @param FileServiceInterface $fileService
     * @param UserRoomRepositoryInterface $userRoomService
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        DepartmentRepositoryInterface $departmentRepository,
        RoleRepositoryInterface $roleRepository,
        MailServiceInterface $mailService,
        FileServiceInterface $fileService,
        UserRoomRepositoryInterface $userRoomService
    ) {
        $this->userRepository = $userRepository;
        $this->departmentRepository = $departmentRepository;
        $this->roleRepository = $roleRepository;
        $this->mailService = $mailService;
        $this->fileService = $fileService;
        $this->userRoomService = $userRoomService;
    }

    /**
     * Data for user homepage
     *
     * @return Collection
     */
    public function index(): Collection
    {
        try {
            $isHeadDepartment = RoleHelper::getName() == ADMIN ? [] : [
                'user_head_id' => QueryHelper::setQueryInput(auth()->user()->id)
            ];
            return $this->departmentRepository->getList(['id', 'name', 'user_head_id'], $isHeadDepartment)->get();
        } catch (Throwable $e) {
            report($e);
        }

        return collect([]);
    }

    /**
     * List of users
     *
     * @param array $params
     * @return array
     */
    public function list(array $params): array
    {
        $users = collect([]);
        try {
            $admin = $this->userRepository->getList(['id'])->role(ADMIN)->pluck('id')->toArray();
            $users = $this->userRepository->getList(
                [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'status',
                    'position',
                    'certificate',
                    'department_id'
                ],
                [
                    'name' => QueryHelper::setQueryInput($params['name'], KEY_LIKE_WHERE),
                    'id' => QueryHelper::setQueryInput(
                        array_merge($admin, [auth()->user()->id]),
                        KEY_WHERE_NOT_IN
                    ),
                    'departments_mst.name' => QueryHelper::setQueryInput(
                        $params['department_id'],
                        KEY_WHERE_HAS_LIKE,
                        'department'
                    ),
                    'rooms_mst.name' => QueryHelper::setQueryInput(
                        $params['room_id'],
                        KEY_WHERE_HAS_LIKE,
                        'room'
                    ),
                    'roles.id' => QueryHelper::setQueryInput(
                        $params['role_id'],
                        KEY_WHERE_HAS,
                        'roles'
                    ),
                ],
                [
                    KEY_SORT => QueryHelper::setQueryOrder('id', 'ASC'),
                    KEY_RELATE => [
                        QueryHelper::setRelationshipQueryInput('department', ['id', 'name', 'user_head_id']),
                        QueryHelper::setRelationshipQueryInput('room', ['rooms_mst.id', 'rooms_mst.name']),
                        QueryHelper::setRelationshipQueryInput('roles', ['roles.*'])
                    ],
                    KEY_PAGINATE => QueryHelper::setQueryPaginate($params[INPUT_PAGE], DEFAULT_LIMIT_PAGE),
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return [
            'users' => $users,
            'itemStart' => $users->firstItem(),
            'itemEnd' => $users->lastItem(),
            'total' => $users->total(),
            'lastPage' => $users->lastPage(),
            'limit' => DEFAULT_LIMIT_PAGE,
            'page' => $params[INPUT_PAGE]
        ];
    }

    /**
     * Display information of login user
     *
     * @return ?Model
     */
    public function view(): ?Model
    {
        try {
            return $this->userRepository->getDetail(
                ['id' => QueryHelper::setQueryInput(auth()->user()->id)],
                ['name', 'password', 'avatar', 'address', 'phone', 'email', 'certificate']
            );
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Register user
     *
     * @param $param
     * @return ?Model
     */
    public function store($param): ?Model
    {
        $user = null;
        DB::beginTransaction();
        try {
            $password = Str::random(10);
            $user = $this->userRepository->create($param['user'] + ['password' => Hash::make($password)]);
            if ($user) {
                $userRoom = [];
                if (!empty($param['room_id'])) {
                    foreach ($param['room_id'] as $room) {
                        $userRoom[] = [
                            'user_id' => $user->id,
                            'room_id' => $room
                        ];
                    }
                    if (!$this->userRoomService->insert($userRoom)) {
                        return null;
                    }
                }
            }
            $token = app(PasswordBroker::class)->createToken($user);
            // Get name role
            $name = $this->roleRepository->getDetail(
                [
                    'id' => QueryHelper::setQueryInput($param['user']['role_id'])
                ],
                ['name']
            );
            // Assign role for user
            $user->assignRole($name['name']);
            $mailParams = [
                'to' => $param['user']['email'],
                'subject' => __('label.email.subject'),
                'html_content' => 'emails.user-register',
                'data' => [
                    'name' => $param['user']['name'],
                    'user_name' => $param['user']['email'],
                    'password' => $password,
                    'link' => url('') . '/doi-mat-khau/' . $token . '?email=' . urlencode($param['user']['email'])
                ]
            ];
            // Send mail
            if (!$this->mailService->send($this->mailService->init($mailParams))) {
                return null;
            }
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            report($e);
        }

        return $user;
    }

    /**
     * Update user
     *
     * @param $param
     * @param $id
     * @param $role
     * @return ?Model
     */
    public function update($param, $id, $role): ?Model
    {
        $result = null;
        DB::beginTransaction();
        try {
            $user = $this->userRepository->find($id);
            // Get name role
            $name = $this->roleRepository->getDetail(['id' => QueryHelper::setQueryInput($role)], ['name']);

            if ($user) {
                // Assign role for user
                $user->syncRoles([$name['name']]);
                $result = $this->userRepository->updates($user, $param['user']);

                if ($result) {
                    $userRooms = $this->userRoomService->getList(
                        ['id', 'room_id'],
                        [
                            'user_id' => QueryHelper::setQueryInput($id)
                        ]
                    )->withTrashed();

                    if (!empty($param['room_id'])) {
                        // Add room
                        $insert = [];
                        $room = $userRooms->pluck('room_id')->toArray();
                        if (!empty(array_diff($param['room_id'], $room))) {
                            foreach (array_diff($param['room_id'], $room) as $value) {
                                $insert[] = [
                                'user_id' => $id,
                                'room_id' => $value
                                ];
                            }
                            if (!$this->userRoomService->insert($insert)) {
                                return null;
                            }
                        }

                        // Delete room
                        if (!empty(array_diff($room, $param['room_id']))) {
                            $delete = [];
                            foreach (array_diff($room, $param['room_id']) as $value) {
                                foreach ($userRooms->get()->toArray() as $v) {
                                    if ($value == $v['room_id']) {
                                        $delete[] = $v['id'];
                                    }
                                }
                            }
                            if (!$this->userRoomService->delete($delete)) {
                                return null;
                            }
                        }

                        // Restore room
                        $restore = $this->userRoomService->getList(
                            ['id', 'room_id'],
                            [
                                'user_id' => QueryHelper::setQueryInput($id),
                                'room_id' => QueryHelper::setQueryInput($param['room_id'], KEY_WHERE_IN),
                            ]
                        )->onlyTrashed();

                        if ($restore->count() > 0 && !$restore->restore()) {
                            return null;
                        }
                    }
                }
            }
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            report($e);
        }
        return $result;
    }

    /**
     * User detail
     *
     * @param $id
     * @return ?Model
     */
    public function edit($id): ?Model
    {
        try {
            return $this->userRepository->getDetail(
                [
                    'id' => QueryHelper::setQueryInput($id)
                ],
                [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'address',
                    'status',
                    'position',
                    'avatar',
                    'certificate',
                    'department_id'
                ],
                [
                    QueryHelper::setRelationshipQueryInput('department', ['id', 'name']),
                    QueryHelper::setRelationshipQueryInput('roles', ['id', 'name']),
                    QueryHelper::setRelationshipQueryInput('room', ['rooms_mst.id', 'rooms_mst.name'])
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Delete user
     *
     * @param $id
     * @return int|null
     */
    public function delete($id): ?int
    {
        try {
            return $this->userRepository->delete($id);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }

    /**
     * list doctor user
     *
     * @return Collection
     */
    public function getListDoctor(): Collection
    {
        try {
            return $this->userRepository->getList(['id', 'name'])->role(EXAMINATION_DOCTOR)->get();
        } catch (Throwable $e) {
            report($e);
        }
        return collect([]);
    }

    /**
     * Update profile user
     *
     * @param $param
     * @return ?Model
     */
    public function profile($param): ?Model
    {
        $result = null;
        try {
            $user = $this->userRepository->find(auth()->user()->id);
            if ($user) {
                if (isset($param['avatar'])) {
                    $file = $this->fileService->upload((array)$param['avatar'], self::PATH_FILE, $user->avatar);
                    $param = array_merge($param, ['avatar' => $file[0]['fileName']]);
                }
                $result = $this->userRepository->updates($user, $param);
            }
        } catch (Throwable $e) {
            report($e);
        }
        return $result;
    }
}
