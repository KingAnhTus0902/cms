<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DiseaseOfMedicalSessionService;
use App\Services\MedicalSessionService;
use App\Repositories\Disease\DiseaseRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DiseaseOfMedicalSessionController extends Controller
{
    /**
     * @var diseaseMSService
     */
    protected $diseaseMSService;

    /**
     * @var medicalSessionService
     */
    protected $medicalSessionService;

    /**
     * @var diseaseRepository
     */
    protected $diseaseRepository;

    /**
     * @param DiseaseOfMedicalSessionService $diseaseOfMedicalSessionService
     * @param MedicalSessionService $medicalSessionService
     * @param DiseaseService $diseaseService
     */
    public function __construct(
        DiseaseOfMedicalSessionService $diseaseOfMedicalSessionService,
        MedicalSessionService $medicalSessionService,
        DiseaseRepositoryInterface $diseaseRepository
        )
    {
        $this->diseaseMSService = $diseaseOfMedicalSessionService;
        $this->medicalSessionService = $medicalSessionService;
        $this->diseaseRepository = $diseaseRepository;
    }

    /**
     * List Department
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request) : JsonResponse
    {
        $diseases = $this->diseaseMSService->list($request->all());

        return response()->json($diseases);
    }

    /**
     * Suggest diseases
     * @param Request $request
     * @return JsonResponse
     */
    public function searchDiseaseByName(Request $request) : JsonResponse
    {
        $keyword = $request->input('query');
        $diseases = $this->diseaseMSService->getDiseaseSuggest($keyword);

        return response()->json($diseases);
    }

    /**
     * Create or Update diseases of Medical Session
     * @param Request $request
     * @return JsonResponse
     */
    public function createOrUpdate(Request $request) : JsonResponse
    {
        $medicalSessionId = $request->id;

        try {
            $mainDisease = $this->diseaseRepository
                    ->findBy(['code' => $request->main_disease], '*')
                    ->first();
            $sideDisease = $this->diseaseRepository
                    ->findBy(['code' => $request->side_disease], '*')
                    ->first();
            $this->diseaseMSService->createOrUpdate($request->all(), $mainDisease, $sideDisease);

            return $this->createSuccessResponse();
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
}
