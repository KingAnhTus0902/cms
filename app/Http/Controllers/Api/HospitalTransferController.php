<?php

namespace App\Http\Controllers\Api;

use App\Constants\MedicalSessionConstants;
use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalTransferRequest;
use App\Services\CadresService;
use App\Services\HospitalTransferService;
use App\Services\MedicalSessionService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HospitalTransferController extends Controller
{
    protected $medicalSessionService;
    protected $hospitalTransferService;
    protected $cadreService;

    public function __construct(
        HospitalTransferService $hospitalTransferService,
        MedicalSessionService $medicalSessionService,
        CadresService $cadreService,
    )
    {
        $this->medicalSessionService = $medicalSessionService;
        $this->hospitalTransferService = $hospitalTransferService;
        $this->cadreService = $cadreService;
    }
    /**
     * List Department
     * @param Request $request
     */
    public function list(Request $request)
    {
        $data = $request->get('data');
        session()->put('hospitalTransferSearch', $data);
        $response = $this->hospitalTransferService->list($data, true);
        return view('hospital_transfer.search-form-result', $response)->render();
    }

    public function store(HospitalTransferRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $data =$request->only(
                    'medical_session_id',
                    'cadre_age',
                    'cadre_work_place',
                    'hospital_id',
                    'treatment_start_date',
                    'treatment_end_date',
                    'clinical_signs',
                    'subclinical_results',
                    'diagnose',
                    'treatment_methods',
                    'patient_status',
                    'reasons',
                    'treatment_directions',
                    'transit_times',
                    'transportations',
                    'escort_information',
                );
                $data['user_id'] = $this->hospitalTransferService->getLoginUserId();
                $data = $this->setDateHospitalTransfer($data);
                $hospitalTransfer = $this->hospitalTransferService->create($data);
                $medical = $this->medicalSessionService->find($data['medical_session_id']);
                $medical->update([
                    'status' => MedicalSessionConstants::STATUS_DONE,
                    'medical_examination_day_end' => Carbon::now()->toDateTimeString()
                    ]);
                $response = $this->hospitalTransferService->generateResponse($hospitalTransfer);
                $response['message'] = __('messages.SM-001');
                return $this->successResponse($response);
            });
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
    public function update(HospitalTransferRequest $request, $id)
    {
        try {
            $data = $request->only(
                'medical_session_id',
                'cadre_age',
                'cadre_work_place',
                'hospital_id',
                'treatment_start_date',
                'treatment_end_date',
                'clinical_signs',
                'subclinical_results',
                'diagnose',
                'treatment_methods',
                'patient_status',
                'reasons',
                'treatment_directions',
                'transit_times',
                'transportations',
                'escort_information',
            );
            $data = $this->setDateHospitalTransfer($data);
            $hospitalTransfer = $this->hospitalTransferService->findOneOrFail($id);
            $hospitalTransfer->update($data);
            $response = $this->hospitalTransferService->generateResponse($hospitalTransfer);
            $response['message'] = __('messages.SM-002');
            return $this->successResponse($response);
        } catch (\Exception $e) {
            return $this->internalServerErrorResponse($e);
        }
    }

    public function setDateHospitalTransfer($data)
    {
        try {
            $data['treatment_start_date'] = CommonHelper::formatDate(
                $data['treatment_start_date'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
            $data['treatment_end_date'] = CommonHelper::formatDate(
                $data['treatment_end_date'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
            $data['transit_times'] = CommonHelper::formatDate(
                $data['transit_times'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
            $data['medical_insurance_start_date'] = CommonHelper::formatDate(
                $data['medical_insurance_start_date'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
            $data['medical_insurance_end_date'] = CommonHelper::formatDate(
                $data['medical_insurance_end_date'], DAY_MONTH_YEAR, YEAR_MONTH_DAY);
            return $data;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $data;
        }
    }

}
