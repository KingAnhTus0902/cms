<?php

namespace App\Http\Controllers\Cms;

use App\Exports\DistributedMaterialExport;
use App\Exports\InsuranceExport;
use App\Exports\InsurancePaidExport;
use App\Http\Controllers\Controller;
use App\Repositories\MedicineOfMedicalSession\MedicineOfMedicalSessionRepository;
use App\Repositories\MedicalSession\MedicalSessionRepository;
use App\Services\MedicalSessionService;
use App\Services\Report\ReportServiceInterface;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ReportController extends Controller
{

    /** @var MedicalSessionService */
    protected $insurancePaidReportService;
    protected MedicalSessionService $medicalSessionService;
    protected MedicalSessionRepository $mainRepository;
    protected MedicineOfMedicalSessionRepository $medicineOfMedicalSessionRepository;

    /** @var ReportServiceInterface */
    protected $reportService;


    /**
     * Base constructor
     *
     * @param ReportServiceInterface $reportService
     */
    public function __construct(ReportServiceInterface $insurancePaidReportService, MedicalSessionService $medicalSessionService ,MedicalSessionRepository $medicalSessionRepository,MedicineOfMedicalSessionRepository $medicineOfMedicalSessionRepository)
    {
        $this->medicalSessionService = $medicalSessionService;
        $this->mainRepository = $medicalSessionRepository;
        $this->insurancePaidReportService = $insurancePaidReportService;
        $this->medicineOfMedicalSessionRepository = $medicineOfMedicalSessionRepository;
    }

    public function insurancePaidIndex(): View
    {
        return view('report.insurance-paid');
    }



    public function exportInsurancePaid(Request $request)
    {
        $start = $request->query("start");
        $end = $request->query("end");
        return Excel::download(new InsurancePaidExport($this->mainRepository, $start, $end) , 'Báo cáo danh sách bệnh nhân bảo hiểm đã thanh toán.xlsx');
    }


    public function distributedMaterialsIndex(): View
    {
        return view('report.distributed_materials');
    }

    public function exportDistributedMaterial(Request $request)
    {
        $start = $request->query("start");
        $end = $request->query("end");
        return Excel::download(new DistributedMaterialExport($this->medicineOfMedicalSessionRepository, $start, $end), 'Báo cáo danh sách thuốc đã phát.xlsx');
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
