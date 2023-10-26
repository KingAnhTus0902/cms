<?php

namespace App\Services;

use App\Constants\MedicineConstants;
use App\Constants\PrescriptionConstants;
use App\Helpers\RoleHelper;
use App\Repositories\ImportMaterialsSlip\ImportMaterialsSlipRepositoryInterface;
use App\Repositories\Material\MaterialRepositoryInterface;
use App\Repositories\MaterialBatch\MaterialBatchRepository;
use App\Repositories\MedicineMedicalSessionBatch\MedicineMedicalSessionBatchRepository;
use App\Repositories\MedicineOfMedicalSession\MedicineOfMedicalSessionRepositoryInterface;
use App\Repositories\PrescriptionOfMedicalSession\PrescriptionOfMedicalSessionRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MedicineOfMedicalSessionService extends BaseService
{
    protected $medicineOfMedicalSessionRepository;
    protected $materialRepositoryInterface;
    protected $prescriptionOfMedicalSessionRepository;
    protected $importMaterialsSlipRepository;
    protected $materialBatchRepository;
    protected $medicineMedicalSessionBatchRepository;

    /**
     * Constructor
     * Before
     * @param MedicineOfMedicalSessionRepositoryInterface $medicineOfMedicalSessionRepositoryInterface
     */
    public function __construct(
        MedicineOfMedicalSessionRepositoryInterface $medicineOfMedicalSessionInterface,
        MaterialRepositoryInterface $materialRepositoryInterface,
        ImportMaterialsSlipRepositoryInterface $importMaterialsSlipRepositoryInterface,
        MaterialBatchRepository $materialBatchRepository,
        PrescriptionOfMedicalSessionRepository $prescriptionOfMedicalSessionRepository,
        MedicineMedicalSessionBatchRepository $medicineMedicalSessionBatchRepository,
    ) {
        $this->medicineOfMedicalSessionRepository = $medicineOfMedicalSessionInterface;
        $this->materialRepositoryInterface = $materialRepositoryInterface;
        $this->importMaterialsSlipRepository = $importMaterialsSlipRepositoryInterface;
        $this->materialBatchRepository = $materialBatchRepository;
        $this->prescriptionOfMedicalSessionRepository = $prescriptionOfMedicalSessionRepository;
        $this->medicineMedicalSessionBatchRepository = $medicineMedicalSessionBatchRepository;
    }

    /**
     * @param mixed $medicalSessionId
     *
     * @return [type]
     */
    public function list($medicalSessionId)
    {

        $medicineOfMedicalSessions = $this->medicineOfMedicalSessionRepository->list($medicalSessionId);
        return $medicineOfMedicalSessions;
    }

    /**
     * saveMedicineOfMedicalSession and update amount in batch
     *
     * @param mixed $conditions
     * @param null $medicineOfMedicalSessionId
     *
     * @return array
     */
    public function saveMedicineOfMedicalSession($conditions, $medicineOfMedicalSessionId)
    {
        DB::beginTransaction();
        try {
            if(!empty($conditions['medical_session_id'])) {
                $dataSave['medical_session_id'] = $conditions['medical_session_id'];
            }
            if (!empty($conditions['material_id'])) {
                $material = $this->materialRepositoryInterface->find($conditions['material_id']);
                if (!$material) {
                    return Response::HTTP_NOT_FOUND;
                }
                if (!empty($material)) {
                    $dataSave['materials_name'] = $material->name;
                    $dataSave['materials_code'] = $material->code;
                    $dataSave['materials_unit'] = !empty($material->unit) ? $material->unit->name : '';
                    $dataSave['materials_unit_price'] = $material->service_unit_price;
                    $dataSave['materials_insurance_unit_price'] = $material->insurance_unit_price;
                    $dataSave['use_insurance'] = $material->use_insurance;
                    $dataSave['materials_type_id'] = $material->material_type_id;
                    $dataSave['materials_active_ingredient_name'] = $material->active_ingredient_name;
                    $dataSave['materials_insurance_code'] = $material->insurance_code ?? '';
                    $dataSave['status'] = MedicineConstants::STATUS_WAITING_DISPENSED;
                    $dataSave['materials_dosage_form'] = $material->dosage_form ?? '';
                    $dataSave['materials_method'] = $material->method ?? '';
                    $dataSave['materials_content'] = $material->content ?? '';
                    $dataSave['materials_type_name'] = $material->materialType->name ?? '';
                }

                // get data medicine medical session if created
//                $conditionMedicineMedicalSession = [
//                    'prescription_id' => $idPrescriptionOfMedical,
//                    'materials_code' => $material->code,
//                    'status' => MedicineConstants::STATUS_WAITING_DISPENSED
//                ];
//                if (!RoleHelper::getByRole([ADMIN])) {
//                    $conditionMedicineMedicalSession['user_id'] = Auth::user()->id;
//                }
//                $oldMedineOfMedicalSession = $this->medicineOfMedicalSessionRepository
//                    ->findOneBy($conditionMedicineMedicalSession);
//                if (
//                    !empty($oldMedineOfMedicalSession)
//                    && (
//                        RoleHelper::getByRole([ADMIN])
//                        || (!RoleHelper::getByRole([ADMIN]) && Auth::user()->id == $oldMedineOfMedicalSession->user_id)
//                    )
//                ) {
//                    $conditions['materials_amount'] = (int) $conditions['materials_amount']
//                        + $oldMedineOfMedicalSession->materials_amount;
//                    $medicineOfMedicalSessionId = $oldMedineOfMedicalSession->id;
//                }
            }
            $dataSave['payment_status'] = MedicineConstants::PAYMENT_PENDING;
            $dataSave['materials_usage'] = $conditions['materials_usage'];
            $dataSave['advice'] = $conditions['advice'] ?? null;
            $dataSave['materials_amount'] = $conditions['materials_amount'];
            $dataSave['user_id'] = !empty($oldMedineOfMedicalSession->user_id) ? $oldMedineOfMedicalSession->user_id : $this->getLoginUserId();

            // revert medicine
//            $medicine = $this->medicineOfMedicalSessionRepository->find($medicineOfMedicalSessionId);
//            if (!empty($medicine)) {
//                $medicineId = !empty($medicine->material->id) ? $medicine->material->id : '';
//                $medicines[] = $medicine;
//                $this->materialBatchRepository->revertMedicines($medicines);
//            }

//            // create or update data medicine of medical session
//            dd($dataSave);
            if (empty($medicineOfMedicalSessionId)) {
                $response = $this->medicineOfMedicalSessionRepository->create($dataSave);
            } else {
                $response = $this->medicineOfMedicalSessionRepository->update($medicineOfMedicalSessionId, $dataSave);
            }

            // take medicine in batchs
//            $column = [
//                'id',
//                'amount'
//            ];
//            $data = [
//                'material_id' => $medicineId
//            ];
//            $batchs = $this->materialBatchRepository->getBatchsForMedicalSession($data, $column);

//            // check amount medicine in batchs
//            $totalMedicines = $batchs->sum('amount');
//            if ($conditions['materials_amount'] > $totalMedicines) {
//                return __('messages.EXM-001');
//            }

            // update batch and create data medicine medical session batch
//            $dataMedicineAndBatchs = [];
//            foreach ($batchs as $batch) {
//                if ($conditions['materials_amount'] > 0) {
//                    if ($batch->amount >= $conditions['materials_amount']) {
//                        $batch->amount -= $conditions['materials_amount'];
//                        $takendAmount = $conditions['materials_amount'];
//                        $conditions['materials_amount'] = 0;
//                    } else {
//                        $takendAmount = $batch->amount;
//                        $conditions['materials_amount'] -= $batch->amount;
//                        $batch->amount = 0;
//                    }
//
//                    $batch->save();
//                    // create new data medicine of medical session and batch
//                    $dataMedicineAndBatchs[] = [
//                        'material_batch_id' => $batch->id,
//                        'medicine_of_medical_session_id' => $response->id,
//                        'amount' => $takendAmount,
//                        'created_at' => now(),
//                        'updated_at' => now(),
//                    ];
//                }
//            }
//
//            if (!empty($dataMedicineAndBatchs)) {
//                $this->medicineMedicalSessionBatchRepository->saveMultipleData($dataMedicineAndBatchs);
//            }

            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return false;
        }
    }

    /**
     * deleteMedicineOfMedicalSession
     * @param mixed $id
     *
     * @return bool
     */
    public function deleteMedicineOfMedicalSession($id)
    {

        $medicineOfMedicalSession = $this->medicineOfMedicalSessionRepository->find($id);
        if (!$medicineOfMedicalSession) {
            return Response::HTTP_NOT_FOUND;
        }
        return $medicineOfMedicalSession->delete();
    }

    /**
     * detailMedicineOfMedicalSession
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detailMedicineOfMedicalSession($id)
    {
        $medicineOfMedicalSession = $this->medicineOfMedicalSessionRepository->find($id);
        return is_null($medicineOfMedicalSession) ? Response::HTTP_NOT_FOUND : $medicineOfMedicalSession;
    }

    public function listMedicinPrint($medicalSessionId)
    {
        $prescriptionOfMedical = $this->prescriptionOfMedicalSessionRepository->findOneBy([
            'medical_session_id' => $medicalSessionId
        ]);
        $idPrescriptionOfMedical = empty($prescriptionOfMedical) ? null : $prescriptionOfMedical->id;
        $medicineOfMedicalSessions = $this->medicineOfMedicalSessionRepository->getListMedicine($idPrescriptionOfMedical);
        return $medicineOfMedicalSessions;
    }
}
