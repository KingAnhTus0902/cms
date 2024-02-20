<?php

namespace App\Services\DesignatedServiceOfMedicalSession;

use App\Helpers\QueryHelper;
use App\Helpers\RoleHelper;
use App\Repositories\DesignatedService\DesignatedServiceRepositoryInterface;
use App\Repositories\DesignatedServiceOfMedicalSession\DSMedSessionRepositoryInterface;
use App\Repositories\MedicalSession\MedicalSessionRepositoryInterface;
use App\Repositories\UserRoom\UserRoomRepository;
use App\Services\FileService\FileServiceInterface;
use DOMDocument;
use DOMXPath;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class DSMedSessionService implements DSMedSessionServiceInterface
{
    /** @var string */
    protected const PATH_FILE = '/medical_test';

    /** @var DSMedSessionRepositoryInterface */
    protected DSMedSessionRepositoryInterface $designatedServiceOfMedicalSessionRepository;

    /** @var DesignatedServiceRepositoryInterface */
    protected DesignatedServiceRepositoryInterface $designatedServiceRepository;

    /** @var MedicalSessionRepositoryInterface */
    protected MedicalSessionRepositoryInterface $medicalSessionRepository;

    /** @var FileServiceInterface */
    protected FileServiceInterface $fileService;

    /** @var UserRoomRepository */
    protected UserRoomRepository $userRoomRepository;

    /**
     * Base construction
     *
     * @param DSMedSessionRepositoryInterface $designatedServiceOfMedicalSessionRepository
     * @param DesignatedServiceRepositoryInterface $designatedServiceRepository
     * @param MedicalSessionRepositoryInterface $medicalSessionRepository
     * @param FileServiceInterface $fileService
     * @param UserRoomRepository $userRoomRepository
     */
    public function __construct(
        DSMedSessionRepositoryInterface $designatedServiceOfMedicalSessionRepository,
        DesignatedServiceRepositoryInterface $designatedServiceRepository,
        MedicalSessionRepositoryInterface $medicalSessionRepository,
        FileServiceInterface $fileService,
        UserRoomRepository $userRoomRepository
    ) {
        $this->designatedServiceOfMedicalSessionRepository = $designatedServiceOfMedicalSessionRepository;
        $this->designatedServiceRepository = $designatedServiceRepository;
        $this->medicalSessionRepository = $medicalSessionRepository;
        $this->fileService = $fileService;
        $this->userRoomRepository = $userRoomRepository;
    }

    /**
     * List of designated service of medical session
     *
     * @param $params
     * @param $id
     * @return array
     */
    public function list($params, $id): array
    {
        $designatedServiceMedicalSession = collect([]);
        $medicalSession = (object)[];

        $room = $this->userRoomRepository->getList(
            ['id', 'room_id'],
            [
                'user_id' => QueryHelper::setQueryInput(auth()->user()->id)
            ]
        )->pluck('room_id')->toArray();

        try {
            $designatedServiceMedicalSession = $this->designatedServiceOfMedicalSessionRepository->getList(
                [
                    'id',
                    'room_id',
                    'creator_id',
                    'medical_session_id',
                    'designated_service_id',
                    'designated_service_name',
                    'designated_service_unit_price',
                    'status',
                    'description',
                    'designated_service_amount'
                ],
                [
                    'medical_session_id' => QueryHelper::setQueryInput($id),
                    'designated_services_tbl.specialist' => QueryHelper::setQueryInput(
                        $params['specialist'] ?? null,
                        KEY_WHERE_HAS,
                        'designatedService'
                    ),
                    'status' => QueryHelper::setQueryInput($params['status'] ?? null),
                    'medical_sessions_tbl.medical_examination_day' => QueryHelper::setQueryInput(
                        $params['medical_examination_day'] ?? null,
                        KEY_WHERE_HAS_BETWEEN,
                        'medicalSession'
                    ),
                    'room_id' => (RoleHelper::getName() == ADMIN || isset($id))
                        ? QueryHelper::setQueryInput($params['room_id'] ?? null)
                        : QueryHelper::setQueryInput($room, KEY_WHERE_IN)
                ],
                [
                    KEY_SORT => QueryHelper::setQueryOrder('id', ORDER_ASC),
                    KEY_RELATE => [
                        QueryHelper::setRelationshipQueryInput(
                            'medicalSession.cadre',
                            [
                                'cadres_tbl.id',
                                'cadres_tbl.name',
                                'cadres_tbl.birthday',
                                'cadres_tbl.gender',
                                'cadres_tbl.address',
                            ]
                        ),
                        QueryHelper::setRelationshipQueryInput('user', ['id', 'name']),
                        QueryHelper::setRelationshipQueryInput('room', ['id', 'name'])
                    ],
                    KEY_PAGINATE => QueryHelper::setQueryPaginate($params[INPUT_PAGE], $params[KEY_LIMIT]),
                ]
            );

            $medicalSession = $this->medicalSessionRepository->getDetail(
                ['id' => QueryHelper::setQueryInput($id)],
                ['id', 'cadre_id', 'diagnose'],
                [
                    QueryHelper::setRelationshipQueryInput('cadre', [
                        'id',
                        'name',
                        'gender',
                        'code',
                        'birthday',
                        'address'
                    ]),
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return [
            'designatedServiceMedicalSession' => $designatedServiceMedicalSession,
            'medicalSession' => $medicalSession,
            'itemStart' => $designatedServiceMedicalSession->firstItem(),
            'itemEnd' => $designatedServiceMedicalSession->lastItem(),
            'total' => $designatedServiceMedicalSession->total(),
            'lastPage' => $designatedServiceMedicalSession->lastPage(),
            'limit' => DEFAULT_LIMIT_PAGE,
            'page' => $params[INPUT_PAGE]
        ];
    }

    /**
     * Register designated service of medical session
     *
     * @param $param
     * @param $id
     * @return ?Model
     */
    public function store($param, $id): ?Model
    {
        try {
            $designatedService = $this->designatedServiceRepository->getDetail(
                ['id' => QueryHelper::setQueryInput($param['designated_service_id'])],
                [
                    'name',
                    'service_unit_price',
                    'room_id',
                    'type_surgery',
                    'specialist'
                ]
            );

            $existDesignatedServiceOfMedicalSession = $this->designatedServiceOfMedicalSessionRepository->getDetail(
                [
                    'medical_session_id' => QueryHelper::setQueryInput($id),
                    'designated_service_id' => QueryHelper::setQueryInput($param['designated_service_id'])
                ]
            );

            if ($existDesignatedServiceOfMedicalSession) {
                return $this->designatedServiceOfMedicalSessionRepository->updates(
                    $existDesignatedServiceOfMedicalSession,
                    [
                        'designated_service_amount' =>
                            $existDesignatedServiceOfMedicalSession['designated_service_amount'] +
                            $param['designated_service_amount']
                    ]
                );
            } else {
                return $this->designatedServiceOfMedicalSessionRepository->create($param + [
                    'designated_service_name' => $designatedService['name'] ?? '',
                    'room_id' => $designatedService['room_id'] ?? null,
                    'designated_service_unit_price' => $designatedService['service_unit_price'] ?? 0,
                    'designated_service_type_surgery' => $designatedService['type_surgery'] ?? null,
                    'designated_service_specialist' => $designatedService['specialist'] ?? null,
                    'medical_session_id' => $id
                ]);
            }
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Detail designated service of medical session
     *
     * @param $id
     * @return ?Model
     */
    public function edit($id): ?Model
    {
        try {
            return $this->designatedServiceOfMedicalSessionRepository->getDetail(
                [
                    'id' => QueryHelper::setQueryInput($id)
                ],
                [
                    'id',
                    'designated_service_id',
                    'designated_service_amount',
                    'description',
                ],
                [
                    QueryHelper::setRelationshipQueryInput('designatedService', ['id', 'name', 'room_id']),
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Update designated service of medical session
     *
     * @param $param
     * @param $id
     * @return ?Model
     */
    public function update($param, $id): ?Model
    {
        try {
            $designatedServiceOfMedicalSession = $this->designatedServiceOfMedicalSessionRepository->find($id);

            if (isset($param['designated_service_id'])) {
                $designatedService = $this->designatedServiceRepository->getDetail(
                    ['id' => QueryHelper::setQueryInput($param['designated_service_id'])],
                    [
                        'id',
                        'name',
                        'service_unit_price',
                        'type_surgery',
                        'specialist'
                    ]
                );
                $param += [
                    'designated_service_name' => $designatedService['name'] ?? '',
                    'designated_service_unit_price' => $designatedService['service_unit_price'] ?? 0,
                    'designated_service_type_surgery' => $designatedService['type_surgery'] ?? null,
                    'designated_service_specialist' => $designatedService['specialist'] ?? null
                ];
            }

            return $this->designatedServiceOfMedicalSessionRepository->updates(
                $designatedServiceOfMedicalSession,
                $param
            );
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }

    /**
     * Delete designated service of medical session
     *
     * @param $id
     * @return int|null
     */
    public function delete($id): ?int
    {
        try {
            return $this->designatedServiceOfMedicalSessionRepository->delete($id);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }

    /**
     * List print designated service of medical session
     *
     * @param $id
     * @param null $designatedId
     * @return array
     */
    public function print($id, $designatedId = null): array
    {
        try {
            $designatedServiceMedicalSession = $this->designatedServiceOfMedicalSessionRepository->getList(
                [
                    'designated_service_of_medical_sessions_tbl.id',
                    'designated_service_of_medical_sessions_tbl.room_id',
                    'creator_id',
                    'medical_session_id',
                    'designated_service_id',
                    'designated_service_name',
                    'designated_service_unit_price',
                    'designated_service_amount',
                    'designated_service_specialist',
                    'designated_service_of_medical_sessions_tbl.description'
                ],
                [
                    'medical_session_id' => QueryHelper::setQueryInput($id),
                    'designated_service_of_medical_sessions_tbl.id' => QueryHelper::setQueryInput($designatedId)
                ],
                [
                    KEY_SORT => QueryHelper::setQueryOrder(
                        'designated_service_of_medical_sessions_tbl.created_at'
                    ),
                    KEY_RELATE => [
                        QueryHelper::setRelationshipQueryInput('medicalSession', ['id', 'code', 'status']),
                        QueryHelper::setRelationshipQueryInput('room', ['id', 'name'])
                    ]
                ]
            )->get()->groupBy('designated_service_specialist');

            $medicalSession = $this->medicalSessionRepository->getDetail(
                ['id' => QueryHelper::setQueryInput($id)],
                [
                    'id',
                    'cadre_id',
                    'diagnose',
                    'cadre_name',
                    'cadre_gender',
                    'cadre_code',
                    'cadre_birthday',
                    'cadre_address'
                ],
            );

            return [$designatedServiceMedicalSession, $medicalSession];
        } catch (Throwable $e) {
            report($e);
        }

        return [];
    }

    /**
     * Get designated service medical session for medical test
     *
     * @param $id
     * @return ?Model
     */
    public function view($id): ?Model
    {
        try {
            return $this->designatedServiceOfMedicalSessionRepository->getDetail(
                [
                    'id' => QueryHelper::setQueryInput($id)
                ],
                [
                    'id',
                    'designated_service_id',
                    'designated_service_amount',
                    'designated_service_specialist',
                    'designated_service_type_surgery',
                    'description',
                    'medical_session_id',
                    'designated_service_name',
                    'medical_test_result',
                    'medical_test_conclude',
                    'status',
                    'room_id'
                ],
//                [
//                    QueryHelper::setRelationshipQueryInput('medicalSession', ['cadre_gender', 'cadre_address', 'cadre_name', 'cadre_birthday', 'cadre_code']),
//                    QueryHelper::setRelationshipQueryInput('room', ['id', 'name'])
//                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Upload file and return URL of file
     *
     * @param $params
     * @param $id
     * @return mixed
     */
    public function upload($params, $id): mixed
    {
        try {
            $designatedServiceOfMedicalSession = $this->designatedServiceOfMedicalSessionRepository->find($id);

            if (isset($params['code'])) {
                return $this->designatedServiceOfMedicalSessionRepository->updates($designatedServiceOfMedicalSession, [
                    'medical_test_result' => $params['code']
                ]);
            } else {
                $oldPath = $this->fileService->fileFromTextEditor(
                    $designatedServiceOfMedicalSession->medical_test_result
                );
                return $this->fileService->upload($params['file'], self::PATH_FILE, $oldPath);
            }
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }
}
