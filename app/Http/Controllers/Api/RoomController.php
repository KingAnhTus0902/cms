<?php

namespace App\Http\Controllers\Api;

use App\Constants\CommonConstants;
use App\Helpers\RoleHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Services\DepartmentService;
use App\Services\RoomService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    protected $roomService;
    protected $departmentService;

    public function __construct(
        RoomService $roomService,
        DepartmentService $departmentService
    )
    {
        $this->roomService = $roomService;
        $this->departmentService = $departmentService;
    }

    /**
     * create department
     * @param RoomRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(RoomRequest $request)
    {
        $data = $request->all();
        try {
            $response['data'] = $this->roomService->create($data);
            $response['message'] = __('messages.SM-001');
            return $this->successResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    public function detail($id)
    {
        $room = $this->roomService->findOneOrFail($id);
        $departmentOfRoom = $room->department;
        $response['isAdmin'] = $response['canEdit'] = true;
        if (!RoleHelper::getByRole([ADMIN])) {
            if ($departmentOfRoom->user_head_id != Auth::user()->id) {
                $response['canEdit'] = false;
            }
            $response['isAdmin'] = false;
        }
        $response['data'] = $room;
        $response['departmentOfRoom'] = $departmentOfRoom;
        return $this->successResponse($response);
    }

    /**
     * update department
     * @param RoomRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RoomRequest $request)
    {
        $data = $request->all();
        try {
            $id = $data['id'];
            $room = $this->roomService->findOneOrFail($id);
            if (!RoleHelper::getByRole([ADMIN])) {
                $departmentOfUser = $this->departmentService->findBy(
                    [
                        'id' => $room->department_id,
                        'user_head_id' => Auth::user()->getAuthIdentifier()
                    ]
                );
                if (!$departmentOfUser->count()) {
                    return $this->badRequestErrorResponse([]);
                }
            }
            $response['data'] = $room->update($data);
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * delete room
     * @param RoomRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $id = $request->input('id');
            $room = $this->roomService->findOneOrFail($id);

            if (!RoleHelper::getByRole([ADMIN])) {
                $departmentOfUser = $this->departmentService->findBy(
                    [
                        'id' => $room->department_id,
                        'user_head_id' => Auth::user()->getAuthIdentifier()
                    ]
                );
                if (!$departmentOfUser->count()) {
                    return $this->errorForbiddenResponse(__('label.room.message.can_not_delete'));
                }
            }

            $response['data'] = $room->delete();
            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * Load room by department
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function loadRoomByDepartment(Request $request): JsonResponse
    {
        $rooms = $this->roomService->loadRoomByDepartment($request->get('data'));

        return response()->json([
            'status' => 'success',
            'rooms' => $rooms
        ]);
    }

    public function roomOfExaminationDoctorByDepartment(Request $request)
    {
        $departmentId = $request->data['department_id'] ?? '';
        $roomId = $request->data['room_id'] ?? '';
        $view = '<option value="">--- Chọn phòng khám ---</option>';
        try {
            if ($departmentId) {
                $data = $this->roomService->getRoomOfExaminationDoctor($departmentId);
                $rooms = $data['rooms'];
                foreach ($rooms as $room) {
                    if ($roomId !== '' && $room->id == $roomId) {
                        $view .= '<option value="' . $room->id . '" selected>' . $room->name . '</option>';
                    } else {
                        $view .= '<option value="' . $room->id . '">' . $room->name . '</option>';
                    }
                }
            }

            if (!$departmentId && $roomId) {
                $rooms = $this->roomService->findBy(['id' => $roomId], CommonConstants::SELECT_ALL);
                foreach ($rooms as $room) {
                    $view .= '<option value="' . $room->id . '" selected>' . $room->name . '</option>';
                }
            }
            return $view;
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
}
