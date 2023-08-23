<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\DiseaseOfMedicalSession\DiseaseOfMedicalSessionRepositoryInterface;
use App\Repositories\Disease\DiseaseRepositoryInterface;
use App\Helpers\QueryHelper;

class DiseaseOfMedicalSessionService extends BaseService
{
    /**
     * @var mainRepository
     */
    protected $mainRepository;

    /**
     * @var diseaseRepository
     */
    protected $diseaseRepository;

    /**
     * @param DiseaseOfMedicalSessionRepositoryInterface $diseaseOfMedicalSessionRepositoryInterface
     * @param DiseaseRepositoryInterface $diseaseRepository
     */
    public function __construct(
        DiseaseOfMedicalSessionRepositoryInterface $diseaseOfMedicalSessionRepositoryInterface,
        DiseaseRepositoryInterface $diseaseRepository
    ) {
        $this->mainRepository       = $diseaseOfMedicalSessionRepositoryInterface;
        $this->diseaseRepository    = $diseaseRepository;
    }

    /**
     * @param array $data
     * @param string $select
     * @return array
     */
    public function list(array $data = []) : array
    {
        $diseaseOfMedicalSessions = $this->mainRepository->findBy([
            'medical_session_id' => $data['id']
        ], CommonConstants::SELECT_ALL);

        return [
            'data' => $diseaseOfMedicalSessions,
        ];
    }

    /**
     * @param [type] $keyword
     * @return void
     */
    public function getDiseaseSuggest($keyword)
    {   
        $searchName = $this->diseaseRepository->getList(
            [
                'id',
                'code',
                'name'
            ]
            ,
            [
                'name' => QueryHelper::setQueryInput($keyword, KEY_LIKE_WHERE),
                'code' => QueryHelper::setQueryInput($keyword, KEY_LIKE_OR_WHERE),
            ],
        )->get();
        return $searchName;
    }

    /**
     * @param [type] $data
     * @return void
     */
    public function createOrUpdate($data, $mainDisease, $sideDisease)
    {
        if (isset($data['mainDiseaseOfMedicalId']) && null !== $mainDisease) {
            $mainDiseaseOfMedicalSession = $this->mainRepository->find($data['mainDiseaseOfMedicalId']);
            $mainDiseaseOfMedicalSession->medical_session_id = $data['id'];
            $mainDiseaseOfMedicalSession->disease_code = $mainDisease->code;
            $mainDiseaseOfMedicalSession->disease_name = $mainDisease->name;
            $mainDiseaseOfMedicalSession->save();
        } else if (isset($data['mainDiseaseOfMedicalId']) && null === $mainDisease) {
            $mainDiseaseOfMedicalSession = $this->mainRepository
                ->find($data['mainDiseaseOfMedicalId']);
            if ($mainDiseaseOfMedicalSession) {
                $mainDiseaseOfMedicalSession->delete();
            }
        } else if (! isset($data['mainDiseaseOfMedicalId']) && null !== $mainDisease) {
            $this->mainRepository->create([
                'medical_session_id' => $data['id'],
                'disease_code' => $mainDisease->code,
                'disease_name' => $mainDisease->name
            ]);
        }

        if (isset($data['sideDiseaseOfMedicalId']) && null !== $sideDisease) {
            $sideDiseaseOfMedicalSession = $this->mainRepository->find($data['sideDiseaseOfMedicalId']);
            $sideDiseaseOfMedicalSession->medical_session_id = $data['id'];
            $sideDiseaseOfMedicalSession->disease_code = $sideDisease->code;
            $sideDiseaseOfMedicalSession->disease_name = $sideDisease->name;
            $sideDiseaseOfMedicalSession->save();
        } else if (isset($data['sideDiseaseOfMedicalId']) && null === $sideDisease) {
            $sideDiseaseOfMedicalSession = $this->mainRepository->find($data['sideDiseaseOfMedicalId']);
            if ($sideDiseaseOfMedicalSession) {
                $sideDiseaseOfMedicalSession->delete();
            }
        } else if (! isset($data['sideDiseaseOfMedicalId']) && null !== $sideDisease) {
            $this->mainRepository->create([
                'medical_session_id' => $data['id'],
                'disease_code' => $sideDisease->code,
                'disease_name' => $sideDisease->name
            ]);
        }
    }
}
