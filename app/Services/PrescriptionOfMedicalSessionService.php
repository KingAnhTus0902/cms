<?php

namespace App\Services;

use App\Repositories\PrescriptionOfMedicalSession\PrescriptionOfMedicalSessionRepositoryInterface;
use App\Helpers\CommonHelper;
use Throwable;

class PrescriptionOfMedicalSessionService extends BaseService
{
    protected $mainRepository;

    public function __construct(
        PrescriptionOfMedicalSessionRepositoryInterface $prescriptionOfMedicalSessionRepositoryInterface
    ) {
        $this->mainRepository = $prescriptionOfMedicalSessionRepositoryInterface;
    }

    public function getDashboardData()
    {
        try {
            $revenueMedicine = $this->mainRepository->getRevenueMedicine();
            return [
                'revenueMedicine' => CommonHelper::sortValueByMonth($revenueMedicine),
            ];
        } catch (Throwable $e) {
            report($e);
        }
        return [
            'revenueMedicine' => CommonHelper::sortValueByMonth([]),
        ];
    }
}
