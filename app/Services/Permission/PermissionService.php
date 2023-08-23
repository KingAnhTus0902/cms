<?php

namespace App\Services\Permission;

use App\Helpers\QueryHelper;
use App\Models\Permission;
use App\Repositories\GroupPermission\GroupPermissionRepositoryInterface;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Throwable;

class PermissionService implements PermissionServiceInterface
{

    /** @var PermissionRepositoryInterface */
    protected PermissionRepositoryInterface $permissionRepository;

    /** @var RoleRepositoryInterface */
    protected RoleRepositoryInterface $roleRepository;

    /** @var GroupPermissionRepositoryInterface */
    protected GroupPermissionRepositoryInterface $groupPermissionRepository;

    /**
     * Constructor
     *
     * @param PermissionRepositoryInterface $permissionRepository
     * @param RoleRepositoryInterface $roleRepository
     * @param GroupPermissionRepositoryInterface $groupPermissionRepository
     */
    public function __construct(
        PermissionRepositoryInterface $permissionRepository,
        RoleRepositoryInterface $roleRepository,
        GroupPermissionRepositoryInterface $groupPermissionRepository
    ) {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
        $this->groupPermissionRepository = $groupPermissionRepository;
    }

    /**
     * Display list of permission
     *
     * @return Collection
     */
    public function index(): Collection
    {
        try {
            return $this->permissionRepository->getList(['id', 'name', 'default_name'])->get();
        } catch (Throwable $e) {
            report($e);
        }

        return collect([]);
    }

    /**
     * List of permission/role
     *
     * @param array $params
     * @return array
     */
    public function list(array $params): array
    {
        $permissons = collect([]);
        try {
            $repository = $this->isPermissionOrRole($params['type']);

            $permissons = $repository->getList(
                [
                    'id',
                    'name',
                    'default_name',
                    'created_at',
                    'updated_at'
                ],
                [
                    'name' => QueryHelper::setQueryInput($params['name'], KEY_LIKE_WHERE)
                ],
                [
                    KEY_SORT => QueryHelper::setQueryOrder('id', 'DESC'),
                    KEY_PAGINATE => QueryHelper::setQueryPaginate($params[INPUT_PAGE], DEFAULT_LIMIT_PAGE),
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return [
            'permissions' => $permissons,
            'itemStart' => $permissons->firstItem(),
            'itemEnd' => $permissons->lastItem(),
            'total' => $permissons->total(),
            'lastPage' => $permissons->lastPage(),
            'limit' => DEFAULT_LIMIT_PAGE,
            'page' => $params[INPUT_PAGE],
            'type' => $params['type'] ?? Permission::TYPE_PERMISSION
        ];
    }

    /**
     * Register permission/role
     *
     * @param $params
     * @return ?Model
     */
    public function store($params): ?Model
    {
        try {
            $repository = $this->isPermissionOrRole($params['type']);
            unset($params['type']);
            return $repository->create($params);
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Permission/role detail
     *
     * @param $id
     * @param $type
     * @return ?Model
     */
    public function edit($id, $type): ?Model
    {
        $repository = $this->isPermissionOrRole($type);

        try {
            return $repository->getDetail(
                [
                    'id' => QueryHelper::setQueryInput($id)
                ],
                [
                    'id',
                    'name',
                ]
            )->setAttribute('type', $type);
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Update permission/role
     *
     * @param $params
     * @param $id
     * @return ?Model
     */
    public function update($params, $id): ?Model
    {
        $repository = $this->isPermissionOrRole($params['type']);
        unset($params['type']);
        try {
            $permission = $repository->find($id);
            return $repository->updates($permission, $params);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }

    /**
     * Delete permission/role
     *
     * @param $id
     * @param $type
     * @return int|null
     */
    public function delete($id, $type): ?int
    {
        $repository = $this->isPermissionOrRole($type);
        try {
            return $repository->delete($id);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }

    /**
     * Display list set for permission
     *
     * @return array
     */
    public function getPermission(): array
    {
        try {
            $groupPermission = $this->groupPermissionRepository->getList(
                ['id', 'name'],
                [],
                [
                    KEY_SORT => QueryHelper::setQueryOrder('order', 'ASC'),
                ]
            )
            ->pluck('name', 'id')
            ->toArray();

            $permissions = $this->permissionRepository->getList(
                ['permissions.id', 'permissions.name', 'default_name', 'group_id', 'group_permissions.order'],
                [],
                [
                    KEY_RELATE => [
                        QueryHelper::setRelationshipQueryInput('roles', ['id', 'name']),
                    ],
                    KEY_JOIN => [
                        QueryHelper::setJoinQueryInput(
                            'group_permissions',
                            'group_id',
                            'group_permissions.id',
                            KEY_LEFT_JOIN
                        )
                    ],
                    KEY_SORT => QueryHelper::setQueryOrder('order', 'ASC'),
                ]
            )->get()->groupBy('group_id');

            $data = [];
            foreach ($permissions as $key => $value) {
                // Get the name from the mapping or use a default value if the ID is not found in the mapping
                $name = $groupPermission[$key] ?? '';
                $data[$name] = $value;
            }

            return $data;
        } catch (Throwable $e) {
            report($e);
        }

        return [];
    }

    /**
     * Set permission to role
     *
     * @param $params
     * @param $id
     * @return mixed
     */
    public function setPermission($params, $id): mixed
    {
        try {
            $permission = $this->permissionRepository->find($id);
            $admin = $this->roleRepository->getDetail(['name' => QueryHelper::setQueryInput(ADMIN)], ['id']);

            if ($permission) {
                // Get the roles
                $roles = $this->roleRepository->getList(['id'], [
                    'id' => QueryHelper::setQueryInput(
                        array_merge([$admin->id], $params['role_id'] ?? []),
                        KEY_WHERE_IN
                    )
                ])->get();

                app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

                // Sync the roles with the permission
                return $permission->roles()->sync($roles);
            }
        } catch (Throwable $e) {
            report($e);
        }
        return false;
    }

    /**
     * Check if request is an action for permission or role
     *
     * @param $type
     * @return PermissionRepositoryInterface|RoleRepositoryInterface
     */
    public function isPermissionOrRole($type): PermissionRepositoryInterface|RoleRepositoryInterface
    {
        return ($type == Permission::TYPE_PERMISSION)
            ? $this->permissionRepository
            : $this->roleRepository;
    }
}
