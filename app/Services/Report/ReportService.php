<?php

namespace App\Services\Report;
use App\Helpers\RoleHelper;
use Illuminate\Support\Facades\Auth;
use App\Constants\CommonConstants;
use App\Repositories\MedicalSession\MedicalSessionRepositoryInterface;
use App\Repositories\MedicineOfMedicalSession\MedicineOfMedicalSessionRepository;
use Carbon\Carbon;


class ReportService implements ReportServiceInterface
{
    protected $medicalSessionRepository;
    protected $medicineOfMedicalSessionRepository;

    public function __construct(
        MedicalSessionRepositoryInterface $medicalSessionRepository,MedicineOfMedicalSessionRepository $medicineOfMedicalSessionRepository
    ) {
        $this->medicalSessionRepository = $medicalSessionRepository;
        $this->medicineOfMedicalSessionRepository = $medicineOfMedicalSessionRepository;
    }

    /**
     * Get List Insurance
     * @param $data
     * @param $paginate
     * @param $type
     * @return array
     */
    public function getInsuranceList($data, $paginate, $type = null)
    {
        $today = Carbon::today()->toDateString();
        $customDate = Carbon::createFromFormat('Y-m-d', $today)->format('d/m/Y');
        $start =  $customDate;
        $end =  $customDate;

        $time = [
            0 => Carbon::today()->toDateString() . ' 00:00:00',
            1 => Carbon::today()->toDateString() . ' 23:59:59'
        ];
        if (!empty($data[CommonConstants::KEYWORD]['time'])) {
            $time = explode('-', $data[CommonConstants::KEYWORD]['time']);
            $start =  $time[0];
            $end =  $time[1];
            $time[0] = Carbon::createFromFormat('d/m/Y', trim($time[0]))->format('Y-m-d') . ' 00:00:00';
            $time[1] = Carbon::createFromFormat('d/m/Y', trim($time[1]))->format('Y-m-d') . ' 23:59:59';
        }
        $data[CommonConstants::KEYWORD]['time'] = $time;
        $user = Auth::user();
        if(RoleHelper::getByRole([EXAMINATION_DOCTOR])) {
            $roomId = $user->room_id;
            $data[CommonConstants::KEYWORD]['room_id'] = $roomId;
        }
        $medicalSessions = $this->medicalSessionRepository->insuranceList($data, $paginate, ['*'], $type);
        return [
            'medicalSessions' => $medicalSessions,
            'itemStart' => $medicalSessions->firstItem(),
            'itemEnd' => $medicalSessions->lastItem(),
            'total' => $medicalSessions->total(),
            'lastPage' => $medicalSessions->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? '',
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? '',
            'dateNow' => date('Y'),
            'start' => $start,
            'end' => $end,
        ];
    }

}
