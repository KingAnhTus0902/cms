<?php

namespace App\Http\Controllers\Cms;

use App\Services\Hospital\HospitalServiceInterface;
use App\Services\HospitalService;
use App\Services\Setting\SettingServiceInterface;
use App\Models\Hospital;
use Illuminate\Contracts\View\View;

class SettingController extends BaseController
{
    /** @var SettingServiceInterface */
    protected SettingServiceInterface $settingService;

    /** @var HospitalServiceInterface */
    protected HospitalServiceInterface $hospitalService;

    /**
     * Base constructor
     *
     * @param SettingServiceInterface $settingService
     * @param HospitalServiceInterface $hospitalService
     */
    public function __construct(
        SettingServiceInterface $settingService,
        HospitalServiceInterface $hospitalService
    ) {
        $this->settingService = $settingService;
        $this->hospitalService = $hospitalService;
    }

    /**
     * Display index disease
     *
     * @return View
     */
    public function view(): View
    {
        $setting = $this->settingService->view();
        $hospitals = $this->hospitalService->index();
        return view('setting.index', compact('setting', 'hospitals'));
    }
}
