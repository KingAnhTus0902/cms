<?php

namespace App\Services;

use App\Constants\VitalSignConstants;
use App\Repositories\MedicalSession\MedicalSessionRepositoryInterface;
use App\Repositories\VitalSign\VitalSignRepositoryInterface;

class VitalSignService extends BaseService
{
    protected $mainRepository;
    protected $medicalSessionRepository;

    /**
     * Constructor
     * Before
     *
     * @param VitalSignRepositoryInterface $vitalSignRepositoryInterface
     * @param MedicalSessionRepositoryInterface $medicalSessionRepository
     */
    public function __construct(
        VitalSignRepositoryInterface $vitalSignRepositoryInterface,
        MedicalSessionRepositoryInterface $medicalSessionRepository
    ) {
        $this->mainRepository = $vitalSignRepositoryInterface;
        $this->medicalSessionRepository = $medicalSessionRepository;
    }

    /**
     * @param int $medicalSessionId
     * @param array $data
     *
     * @return array
     */
    public function createOrUpdate(int $medicalSessionId, array $data = []): array
    {
        $whereMedicalSessionId = [
            'medical_session_id' => $medicalSessionId,
        ];
        $dataSaveMedicalSession = [
            'reason_for_examination' => $data['reason_for_examination'] ?? null,
            'pathological_process' => $data['pathological_process'] ?? null,
            'personal_history' => $data['personal_history'] ?? null,
            'family_history' => $data['family_history'] ?? null,
        ];
        $this->medicalSessionRepository->update($medicalSessionId, $dataSaveMedicalSession);
        $conditionsVitalSign = [
            'medical_session_id' => $medicalSessionId,
            'circuit' => $data['circuit'] ?? null,
            'temperature' => $data['temperature'] ?? null,
            'blood_pressure' => $data['blood_pressure'] ?? null,
            'height' => $data['height'] ?? VitalSignConstants::HEIGHT_DEFAULT,
            'weight' => $data['weight'] ?? VitalSignConstants::WEIGHT_DEFAULT,
            'treatment_days' => $data['treatment_days'] ?? null,
            'breathing' => $data['breathing'] ?? null,
            'bmi' => $data['bmi'] ?? null,
        ];
        $vitalSign = $this->mainRepository->findOneBy($whereMedicalSessionId);
        if (empty($vitalSign)) {
            $type = CREATE;
            $response = $this->mainRepository->create($conditionsVitalSign);
        } else {
            $type = UPDATE;
            $vitalSignId = $vitalSign->id;
            $response = $this->mainRepository->update($vitalSignId, $conditionsVitalSign);
        }
        return [
            'type' => $type,
            'data' => $response,
        ];
    }
}
