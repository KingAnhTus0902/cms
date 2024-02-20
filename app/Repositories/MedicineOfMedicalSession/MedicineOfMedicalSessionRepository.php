<?php

namespace App\Repositories\MedicineOfMedicalSession;
use App\Constants\CommonConstants;
use App\Models\MedicineOfMedicalSession;
use App\Repositories\BaseRepository;

class MedicineOfMedicalSessionRepository extends BaseRepository implements MedicineOfMedicalSessionRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return MedicineOfMedicalSession::class;
    }

    /**
     * get list MedicineOfMedicalSession
     * @param mixed $idPrescriptionOfMedical
     *
     * @return [type]
     */
    public function list($medicalSessionId)
    {
        $query = $this->model->select(CommonConstants::SELECT_ALL);
        if (empty($medicalSessionId)) {
            $query->whereNull('medical_session_id');
        } else {
            $query->where('medical_session_id', $medicalSessionId);
        }
        return $query->get();
    }
}
