<?php

namespace App\Http\Controllers\Api;

use App\Constants\MedicalSessionConstants;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Report\ReportServiceInterface;

class ReportController extends Controller
{

    /** @var ReportServiceInterface */
    protected $reportService;

    /**
     * Base constructor
     *
     * @param ReportServiceInterface $reportService
     */
    public function __construct(ReportServiceInterface $reportService)
    {
        $this->reportService = $reportService;
    }

    /**
     * Display list disease
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function insuranceList(Request $request): JsonResponse
    {
        $response = $this->reportService->getInsuranceList($request->get('data'), true,
            MedicalSessionConstants::STATUS_DONE);

        return response()->json([
            'success' => true,
            'html' => view('elements.report.listInsurance', $response)->render(),
        ]);
    }
}
