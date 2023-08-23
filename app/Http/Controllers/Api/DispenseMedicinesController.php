<?php

namespace App\Http\Controllers\Api;

use App\Constants\MedicineConstants;
use App\Constants\PrescriptionConstants;
use App\Http\Controllers\Controller;
use App\Models\MedicineOfMedicalSession;
use App\Repositories\PrescriptionOfMedicalSession\PrescriptionOfMedicalSessionRepository;
use App\Repositories\MedicineOfMedicalSession\MedicineOfMedicalSessionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\MaterialBatch\MaterialBatchRepository;

class DispenseMedicinesController extends Controller
{
    protected $medicineOfMedicalSessionRepository;
    protected $prescriptionRepository;
    protected $materialBatchRepository;

    public function __construct(
        MedicineOfMedicalSessionRepositoryInterface $medicineOfMedicalSessionInterface,
        PrescriptionOfMedicalSessionRepository $prescriptionRepository,
        MaterialBatchRepository $materialbatchRepository,
    ) {
        $this->medicineOfMedicalSessionRepository = $medicineOfMedicalSessionInterface;
        $this->prescriptionRepository = $prescriptionRepository;
        $this->materialBatchRepository = $materialbatchRepository;
    }

    public function updateStatus(Request $request)
    {
        $data = $request->only(['id', 'action']);
        $count = 0;
        $medicines = [];
        $response = [];
        try {
            DB::beginTransaction();
            $medicinesOfMedicalsessions = $this->medicineOfMedicalSessionRepository->list($data['id']);
            if ($data['action'] == PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_DISPENSED]) {
                foreach ($medicinesOfMedicalsessions as $medicine)
                {
                    if ($medicine->status  == MedicineConstants::STATUS_WAITING_DISPENSED) {
                        $this->medicineOfMedicalSessionRepository->update($medicine->id,
                            [
                                MedicineConstants::COLUMN_STATUS => MedicineConstants::STATUS_DISPENSED
                            ]);

                    }
                }
                $response['data'] = $this->prescriptionRepository->update($data['id'], [
                    'status' => PrescriptionConstants::STATUS_DISPENSED
                ]);
            } elseif ($data['action'] == PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_WAITING_DISPENSED]) {
               foreach ($medicinesOfMedicalsessions as $medicine)
                {
                    if ($medicine->status  == MedicineConstants::STATUS_DISPENSED
                        && $medicine->payment_status == MedicineConstants::PAYMENT_PENDING) {
                        $this->medicineOfMedicalSessionRepository->update($medicine->id,
                            [
                                MedicineConstants::COLUMN_STATUS => MedicineConstants::STATUS_WAITING_DISPENSED
                            ]);

                    }
                }

                $response['data'] = $this->prescriptionRepository->update($data['id'], [
                    'status' => PrescriptionConstants::STATUS_WAITING_DISPENSED
                ]);
            } elseif ($data['action'] == PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_CANCEL]) {

                foreach ($medicinesOfMedicalsessions as $medicine)
                {
                    if ($medicine->status  == MedicineConstants::STATUS_WAITING_DISPENSED) {
                        $medicines[] = $this->medicineOfMedicalSessionRepository->update($medicine->id,
                            [
                                MedicineConstants::COLUMN_STATUS => MedicineConstants::STATUS_CANCEL
                            ]);
                    }
                    if ($medicine->status  == MedicineConstants::STATUS_DISPENSED) {
                        $count++;
                    }
                }
//                update status
                if ($count == 0) {
                    $response['data'] = $this->prescriptionRepository->update($data['id'], [
                        'status' => PrescriptionConstants::STATUS_CANCEL
                    ]);
                } else {
                    $response['data'] = $this->prescriptionRepository->update($data['id'], [
                        'status' => PrescriptionConstants::STATUS_DISPENSED
                    ]);
                }
                if (!empty($medicines)) {
                    $this->materialBatchRepository->revertMedicines($medicines);
                }
            }
            DB::commit();
            return $this->updateSuccessResponse($response);
        } catch (\Throwable $e) {
            DB::rollBack();
            return $this->badRequestErrorResponse($e);
        }
    }
}
