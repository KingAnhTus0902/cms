<?php

namespace App\Http\Controllers\Api;

use App\Constants\MedicalSessionConstants;
use App\Http\Controllers\Controller;
use App\Services\MedicalSessionService;
use App\Services\PrescriptionOfMedicalSessionService;
use Carbon\Carbon;

class HomePageController extends Controller
{
    /**
     * @var MedicalSessionService
     */
    protected $medicalSessionService;


    /**
     * @param
     */
    public function __construct(
        MedicalSessionService $medicalSessionService,
    )
    {
        $this->medicalSessionService = $medicalSessionService;
    }

    public function dashboard()
    {
        $medicalDashboad = $this->medicalSessionService->getDashboardData();
        $result = array_merge($medicalDashboad);
        return $result;
    }
}
