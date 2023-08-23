<?php

namespace App\Repositories\MedicineOfMedicalSession;

use App\Repositories\BaseRepositoryInterface;

interface MedicineOfMedicalSessionRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * get list MedicineOfMedicalSession
     * @param mixed $idPrescriptionOfMedical
     *
     * @return [type]
     */
    public function list($idPrescriptionOfMedical);
    public function getListMedicine($idPrescriptionOfMedical);
}
