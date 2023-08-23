<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Helpers\QueryHelper;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\UserRoom\UserRoomRepository;

class RoomService extends BaseService implements RoomServiceInterface
{
    protected $mainRepository;
    protected $userRepository;
    protected $userRoomRepository;

    public function __construct(
        RoomRepositoryInterface $roomRepositoryInterface,
        UserRepository $userRepository,
        UserRoomRepository $userRoomRepository
    ) {
        $this->mainRepository = $roomRepositoryInterface;
        $this->userRepository = $userRepository;
        $this->userRoomRepository = $userRoomRepository;
    }

    public function list($data, $paginate = false)
    {
        $rooms = $this->mainRepository->list($data, $paginate);
        return [
            'rooms' => $rooms,
            'itemStart' => $rooms->firstItem(),
            'itemEnd' => $rooms->lastItem(),
            'total' => $rooms->total(),
            'lastPage' => $rooms->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? "",
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? ""
        ];
    }

    /**
     * Render room by department
     *
     * @param $params
     * @return mixed
     */
    public function loadRoomByDepartment($params): mixed
    {
        if (!isset($params)) {
            return collect([]);
        }

        return $this->mainRepository->getList(
            ['id', 'name'],
            [
                'department_id' => QueryHelper::setQueryInput($params),
            ],
        )
        ->get();
    }

    public function loadRoomForChangeRoom($roomId, $departmentId)
    {
        return $this->mainRepository->getList(
            ['id', 'name'],
            [
                'department_id' => QueryHelper::setQueryInput($departmentId),
                'id'       => QueryHelper::setQueryInput($roomId, OPERATOR_NOT_EQUAL)
            ]
        )
            ->get();
    }


    /**
     * Get list room of EXAMINATION_DOCTOR.
     *
     * @return mixed
     */
    public function getRoomOfExaminationDoctor($departmentId = null, $isExaminationDoctor = false)
    {
        if ($isExaminationDoctor) {
            $conditionUserRoom = [
                'user_id' => QueryHelper::setQueryInput(auth()->user()->id, OPERATOR_EQUAL)
            ];
        } else {
            $doctorIds = $this->userRepository->getExaminationDoctor();
            $conditionUserRoom = [
                'user_id' => QueryHelper::setQueryInput($doctorIds, KEY_WHERE_IN)
            ];
        }

        $roomIds = $this->userRoomRepository->getList(SELECT_ALL, $conditionUserRoom)
            ->groupBy('room_id')->pluck('room_id');
        $conditionRoom = [
            'id' => QueryHelper::setQueryInput($roomIds, KEY_WHERE_IN)
        ];

        $query = $this->mainRepository->getList(SELECT_ALL, $conditionRoom);
        return $query->get();
    }
}
