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
                }
            }
            $dataSave['materials_usage'] = $conditions['materials_usage'];
            $dataSave['advice'] = $conditions['advice'] ?? null;
            $dataSave['materials_amount'] = $conditions['materials_amount'];
            $dataSave['user_id'] = !empty($oldMedineOfMedicalSession->user_id) ? $oldMedineOfMedicalSession->user_id : $this->getLoginUserId();

            if (empty($medicineOfMedicalSessionId)) {
                $response = $this->medicineOfMedicalSessionRepository->create($dataSave);
            } else {
                $response = $this->medicineOfMedicalSessionRepository->update($medicineOfMedicalSessionId, $dataSave);
            }

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
        $medicineOfMedicalSessions = $this->medicineOfMedicalSessionRepository->list($medicalSessionId);
        return $medicineOfMedicalSessions;
    }
}
