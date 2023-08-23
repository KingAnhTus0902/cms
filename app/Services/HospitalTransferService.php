<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Models\Folk;
use App\Models\HospitalTransfer;
use App\Repositories\Cadres\CadresRepositoryInterface;
use App\Repositories\Hospital\HospitalRepositoryInterface;
use App\Repositories\HospitalTransfer\HospitalTransferRepositoryInterface;
use App\Repositories\MedicalSession\MedicalSessionRepositoryInterface;
use App\Services\Setting\SettingServiceInterface;
use Carbon\Carbon;

class HospitalTransferService extends BaseService
{
    protected $mainRepository;

    protected $cadreRepository;
    protected $hospitalRepository;

    protected SettingServiceInterface $settingService;

    /**
     * Constructor
     * Before
     * @param HospitalTransferRepositoryInterface $hospitalsRepositoryInterface
     */
    public function __construct(
        HospitalRepositoryInterface $hospitalRepository,
        SettingServiceInterface $settingService,
        HospitalTransferRepositoryInterface $hospitalTransferRepositoryInterface,
        MedicalSessionRepositoryInterface $medicalSessionRepositoryInterface
    )
    {
        $this->mainRepository = $hospitalTransferRepositoryInterface;
        $this->medicalSessionRepository = $medicalSessionRepositoryInterface;
        $this->settingService = $settingService;
        $this->hospitalRepository = $hospitalRepository;
    }
    public function list($data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $time = [
            0 => Carbon::today()->toDateString() . ' 00:00:00',
            1 => Carbon::today()->toDateString() . ' 23:59:59'
        ];
        if (!empty($data[CommonConstants::KEYWORD]['time'])) {
            $time = explode('-', $data[CommonConstants::KEYWORD]['time']);
            $time[0] = Carbon::createFromFormat('d/m/Y', trim($time[0]))->format('Y-m-d') . ' 00:00:00';
            $time[1] = Carbon::createFromFormat('d/m/Y', trim($time[1]))->format('Y-m-d') . ' 23:59:59';
        }
        $data[CommonConstants::KEYWORD]['time'] = $time;
        $hospitalTransfers = $this->mainRepository->list($data, $paginate, $select);
        return [
            'hospitalTransfers' => $hospitalTransfers,
            'itemStart' => $hospitalTransfers->firstItem(),
            'itemEnd' => $hospitalTransfers->lastItem(),
            'total' => $hospitalTransfers->total(),
            'lastPage' => $hospitalTransfers->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? "",
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? ""
        ];
    }
    public function generateResponse(HospitalTransfer $hospitalTransfer)
    {
        $response['data'] = $hospitalTransfer;
        $response['id'] = $hospitalTransfer->id;
        $medical = $this->medicalSessionRepository->findOneOrFail($hospitalTransfer->medical_session_id);
        $folks = Folk::all();
        $setting = $this->settingService->view();
        $hospital = $this->hospitalRepository->findOneOrFail($setting['hospital_id']);
        $response['print'] = view(
            'hospital_transfer.print', compact('hospitalTransfer', 'medical', 'folks', 'hospital')
        )->render();
        return $response;
    }
}
