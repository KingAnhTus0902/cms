<?php

namespace App\Http\Controllers\Cms;

use App\Constants\CommonConstants;
use App\Http\Controllers\Controller;
use App\Models\Folk;
use App\Services\CityService;
use App\Services\DepartmentService;
use App\Services\MedicalSessionService;
use App\Services\MedicineOfMedicalSessionService;
use App\Services\RoomService;
use App\Services\VitalSignService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DispenseMedicinesController extends Controller
{
    protected $departmentService;
    protected $roomService;
    protected $medicalSessionService;
    protected $vitalSignService;
    protected $cityService;

    public function __construct(
        DepartmentService $departmentService,
        RoomService $roomService,
        MedicalSessionService $medicalSessionService,
        VitalSignService $vitalSignService,
        CityService $cityService,
    ) {
        $this->departmentService = $departmentService;
        $this->roomService = $roomService;
        $this->medicalSessionService = $medicalSessionService;
        $this->vitalSignService = $vitalSignService;
        $this->cityService = $cityService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $departments = $this->departmentService->all();
        $rooms = $this->roomService->all();
        $cities = $this->cityService->all();
        $folks = Folk::all();
        return view('dispense_medicine.index', compact('departments', 'rooms', 'cities', 'folks'));
    }


    /**
     * List Medical Session
     * @param Request $request
     */
    public function list(Request $request)
    {
        $data = $request->get('data');
        $data['get_prescription'] = true;
        if (isset($data[CommonConstants::KEYWORD]['status'])) {
            $data['prescription_status'] = $data[CommonConstants::KEYWORD]['status'];
            unset($data[CommonConstants::KEYWORD]['status']);
        }
        $response = $this->medicalSessionService->list($data, true);
        return view('elements.dispense_medicine.search-result', $response)->render();
    }

    public function detailPresciption($id)
    {
        $response = $this->medicalSessionService->detailPrescription($id);
        return view('elements.dispense_medicine.detail', $response)->render();
    }
}
