<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MedicalSessionService;
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
        $medicalDashboard = $this->medicalSessionService->getDashboardData();
        return array_merge($medicalDashboard);
    }
}
