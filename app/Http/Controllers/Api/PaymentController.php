<?php

namespace App\Http\Controllers\Api;

use App\Constants\MedicalSessionConstants;
use App\Services\MedicalSessionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PaymentController extends BaseController
{
    /** @var MedicalSessionService */
    protected MedicalSessionService $medicalSessionService;

    /**
     * Base constructor
     *
     * @param MedicalSessionService $medicalSessionService
     */
    public function __construct(MedicalSessionService $medicalSessionService)
    {
        $this->medicalSessionService = $medicalSessionService;
    }

    /**
     * Display list disease
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        session()->put('payment', $request->get('data')['keyword']);

        $response = $this->medicalSessionService->list($request->get('data'), true, true);

        return response()->json([
            'success' => true,
            'html' => view('elements.payment.list', $response)->render()
        ]);
    }

    /**
     * Display edit of disease
     *
     * @param $id
     * @return JsonResponse
     */
    public function paymentDetail($id): JsonResponse
    {
        $checkStatus = $this->medicalSessionService->find($id);
        if($checkStatus->getRawOriginal('status') == MedicalSessionConstants::STATUS_DONE) {
            $paymentDetail = $this->medicalSessionService->paymentDetailDone($id);
        } else {
            $paymentDetail = $this->medicalSessionService->paymentDetail($id);
        }
        return response()->json([
            'success' => true,
            'html' => view('elements.payment.detail', $paymentDetail)->render()
        ]);

    }

    public function confirm($id, Request $request): JsonResponse
    {
        $data = $request->all();
        $paymentDetail = $this->medicalSessionService->changePaymentStatus($id, $data);
        return response()->json([
            'success' => true,
            'html' => view('elements.payment.detail', $paymentDetail)->render()
        ]);
    }

    public function print($id): View
    {
        $checkStatus = $this->medicalSessionService->find($id);
        if($checkStatus->getRawOriginal('status') == MedicalSessionConstants::STATUS_DONE) {
            $paymentDetail = $this->medicalSessionService->paymentDetailDone($id);
        } else {
            $paymentDetail = $this->medicalSessionService->paymentDetailPrint($id);
        }
        return view('prints.payment', $paymentDetail);
    }
}
