<?php

namespace App\Http\Controllers\Cms;

use App\Services\DesignatedServiceOfMedicalSession\DSMedSessionServiceInterface;
use App\Services\Room\RoomServiceInterface;
use Illuminate\Contracts\View\View;

class DesignatedServiceOfMedicalSessionController extends BaseController
{
    /** @var DSMedSessionServiceInterface */
    protected DSMedSessionServiceInterface $dsMedSessionService;

    /** @var RoomServiceInterface */
    protected RoomServiceInterface $roomService;

    /**
     * Base constructor
     *
     * @param DSMedSessionServiceInterface $designatedServiceOfMedicalSession
     * @param RoomServiceInterface $roomService
     */
    public function __construct(
        DSMedSessionServiceInterface $designatedServiceOfMedicalSession,
        RoomServiceInterface $roomService
    ) {
        $this->roomService = $roomService;
        $this->dsMedSessionService = $designatedServiceOfMedicalSession;
    }

    /**
     * Display medical test that include all designated service of medical session
     *
     * @return View
     */
    public function index(): View
    {
        $rooms = $this->roomService->index();

        return view('medical_test.index', compact('rooms'));
    }

    /**
     * Display designated service of medical session for medical test
     *
     * @param $id
     * @return View
     */
    public function view($id): View
    {
        $designatedServiceMedicalSession = $this->dsMedSessionService->view($id);

        return view('medical_test.view', compact('designatedServiceMedicalSession'));
    }
}
