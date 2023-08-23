<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SettingRequest;
use App\Services\Setting\SettingServiceInterface;
use Illuminate\Http\JsonResponse;

class SettingController extends BaseController
{
    /** @var SettingServiceInterface */
    protected SettingServiceInterface $settingService;

    /**
     * Base constructor
     *
     * @param SettingServiceInterface $settingService
     */
    public function __construct(SettingServiceInterface $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * Admin update setting
     *
     * @param SettingRequest $request
     * @return JsonResponse
     */
    public function update(SettingRequest $request): JsonResponse
    {
        $settingRequest = $request->only(
            'hospital_id',
            'default_name',
            'clinic_name',
            'email',
            'logo',
            'address',
            'phone',
            'ministry_of_health',
            'base_salary',
            'clinic_name_acronym'
        );
        $result = $this->settingService->update($settingRequest);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }
}
