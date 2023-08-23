<?php

namespace App\Http\Controllers\Cms;

use App\Helpers\RoleHelper;
use App\Http\Controllers\Controller;
use App\Models\Folk;
use App\Services\CityService;
use App\Services\DepartmentService;
use App\Services\DesignatedService\DesignatedServiceServiceInterface;
use App\Services\DesignatedServiceOfMedicalSession\DSMedSessionServiceInterface;
use App\Services\MedicalSessionService;
use App\Services\RoomService;
use App\Services\VitalSignService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalSessionController extends Controller
{
    protected $departmentService;
    protected $roomService;
    protected $medicalSessionService;
    protected $vitalSignService;
    protected $cityService;

    /** @var DesignatedServiceServiceInterface */
    protected DesignatedServiceServiceInterface $designatedServiceService;

    /** @var DSMedSessionServiceInterface */
    protected DSMedSessionServiceInterface $dsMedSessionService;

    /**
     * @param DepartmentService $departmentService
     * @param RoomService $roomService
     * @param MedicalSessionService $medicalSessionService
     * @param VitalSignService $vitalSignService
     * @param CityService $cityService
     * @param DSMedSessionServiceInterface $designatedServiceOfMedicalSession
     * @param DesignatedServiceServiceInterface $designatedServiceService
     */
    public function __construct(
        DepartmentService $departmentService,
        RoomService $roomService,
        MedicalSessionService $medicalSessionService,
        VitalSignService $vitalSignService,
        CityService $cityService,
        DSMedSessionServiceInterface $designatedServiceOfMedicalSession,
        DesignatedServiceServiceInterface $designatedServiceService
    ) {
        $this->departmentService = $departmentService;
        $this->roomService = $roomService;
        $this->medicalSessionService = $medicalSessionService;
        $this->vitalSignService = $vitalSignService;
        $this->cityService = $cityService;
        $this->dsMedSessionService = $designatedServiceOfMedicalSession;
        $this->designatedServiceService = $designatedServiceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $isExaminationDoctor = false;
        $departments = $this->departmentService->all();
        if (RoleHelper::getByRole([ADMIN, RECEPTIONIST])) {
            $rooms = $this->roomService->getRoomOfExaminationDoctor();
        } else {
            $isExaminationDoctor = true;
            $rooms = $this->roomService->getRoomOfExaminationDoctor(null, true);
        }
        $cities = $this->cityService->all();
        $folks = Folk::all();
        return view('medical_session.index', compact('departments', 'rooms', 'cities', 'folks', 'isExaminationDoctor'));
    }

    /**
     * List Medical Session
     * @param Request $request
     */
    public function list(Request $request)
    {
        $data = $request->get('data');
        session()->put('medicalSessionSearch', $data);
        if (!RoleHelper::getByRole([ADMIN, RECEPTIONIST])) {
            $roomOfExaminationDoctor = $this->roomService
                ->getRoomOfExaminationDoctor(null, true)
                ->pluck('id')
                ->toArray();
            $data['room_of_examination_doctor'] = $roomOfExaminationDoctor;
        }
        $response = $this->medicalSessionService->list($data, true);
        return view('elements.medical_session.search-result', $response)->render();
    }

    /**
     * Examination Detail
     * @param integer $id
     * @return mixed
     */
    public function examination(int $id): mixed
    {
        $medical_session = $this->medicalSessionService->findOneOrFail($id);
        $current_room = $this->medicalSessionService->getCurrentRoom($id);
        if (!RoleHelper::getByRole([ADMIN])) {
            $roomOfExaminationDoctor = $this->roomService
                ->getRoomOfExaminationDoctor(null, true)
                ->pluck('id')
                ->toArray();
            if (!in_array($current_room->id, $roomOfExaminationDoctor)) {
                return redirect()->back()
                    ->with('failed', (__('label.medical_session.message.can_not_examination_in_room')));
            }
        }
        $rooms = $this->roomService
            ->getRoomOfExaminationDoctor();
        $vital_sign      = $this->vitalSignService
            ->findOneBy([
                'medical_session_id' => $medical_session->id
            ]);

        $designatedServiceMedicalSession = $this->dsMedSessionService
            ->list(
                [
                    INPUT_PAGE => PAGE_DEFAULT,
                    KEY_LIMIT => UNLIMITED_PAGE
                ],
                $id
            )['designatedServiceMedicalSession'];

        $designatedService = $this->designatedServiceService->index();

        return view('examination.index', compact(
            'medical_session',
            'vital_sign',
            'designatedServiceMedicalSession',
            'designatedService',
            'current_room',
            'rooms'
        ));
    }
}
