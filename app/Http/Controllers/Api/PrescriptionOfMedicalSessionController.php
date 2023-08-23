<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PrescriptionOfMedicalSessionController extends Controller
{
    protected $prescriptionRepository;
    public function __construct(
        NewsService $newsService,
        NewsCategoryRepositoryInterface $categoryRepository
    ) {
        $this->newsService = $newsService;
        $this->categoryRepository = $categoryRepository;
    }

    public function detail($id)
    {
        $response['data'] = $this->medicalSessionService->findOneOrFail($id);
        return $this->successResponse($response);
    }
}
