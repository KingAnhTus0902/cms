<?php

namespace App\Http\Controllers\Cms;

use App\Exports\InsuranceExport;
use App\Http\Controllers\Controller;
use App\Repositories\MedicalSession\MedicalSessionRepository;
use App\Services\Report\ReportServiceInterface;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    protected MedicalSessionRepository $mainRepository;
    /**
     * Base constructor
     *
     * @param ReportServiceInterface $reportService
     */
    public function __construct(
        MedicalSessionRepository $medicalSessionRepository)
    {
        $this->mainRepository = $medicalSessionRepository;
    }

    /**
     *  create view report insurance
     */
    public function reportInsuranceIndex(): View
    {
        return view('report.insurance');
    }

    public function exportInsurance(Request $request)
    {
        $start = $request->query("start");
        $end = $request->query("end");
        return Excel::download(new InsuranceExport($this->mainRepository, $start, $end), 'Sổ khám bệnh.xlsx');
    }

}
