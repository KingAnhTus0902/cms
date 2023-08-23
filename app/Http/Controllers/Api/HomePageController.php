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
     * @var PrescriptionOfMedicalSessionService
     */
    protected $prescriptionOfMedicalSessionService;

    /**
     * @param 
     */
    public function __construct(
        MedicalSessionService $medicalSessionService,
        PrescriptionOfMedicalSessionService $prescriptionOfMedicalSessionService
    )
    {
        $this->medicalSessionService = $medicalSessionService;
        $this->prescriptionOfMedicalSessionService = $prescriptionOfMedicalSessionService;
    }

    public function dashboard()
    {
        $medicalDashboad = $this->medicalSessionService->getDashboardData();
        $medicineDashboard = $this->prescriptionOfMedicalSessionService->getDashboardData();
        $result = array_merge($medicalDashboad, $medicineDashboard);
        return $result;
    }
}
