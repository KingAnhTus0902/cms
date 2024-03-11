<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Folk;
use App\Services\CadresService;
use App\Services\HospitalService;
use App\Services\HospitalTransferService;
use App\Services\MedicalSessionService;
use App\Services\Setting\SettingServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HospitalTransferController extends Controller
{
    protected SettingServiceInterface $settingService;

    protected $medicalSessionService;
    protected $hospitalTransferService;
    protected $cadreService;
    protected $hospitalsService;

    public function __construct(
        HospitalService $hospitalsService,
        SettingServiceInterface $settingService,
        HospitalTransferService $hospitalTransferService,
        MedicalSessionService $medicalSessionService,
        CadresService $cadreService,
    )
    {
        $this->hospitalsService = $hospitalsService;
        $this->medicalSessionService = $medicalSessionService;
        $this->hospitalTransferService = $hospitalTransferService;
        $this->cadreService = $cadreService;
        $this->settingService = $settingService;
    }

    /**
     * List hospitals, list cities
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('hospital_transfer.index');
    }

    public function create($id)
    {
        $medical = $this->medicalSessionService->findOneOrFail($id);
        $folks = Folk::all();
        $hospitals = $this->hospitalsService->all();
        $medical['cadre_age'] = date_diff(date_create($medical['cadre_birthday']), date_create(date('Y-m-d')))->y;
        return view('hospital_transfer.add',
            compact('hospitals', 'folks', 'medical'));
    }
    public function print($id)
    {
        $setting = $this->settingService->view();
        $hospital = $this->hospitalsService->findOneOrFail($setting['hospital_id']);
        $folks = Folk::all();
        $hospitalTransfer = $this->hospitalTransferService->findOneOrFail($id);
        $medical = $this->medicalSessionService->findOneOrFail($hospitalTransfer['medical_session_id']);;
        return view('hospital_transfer.print',
            compact('hospitalTransfer', 'medical', 'folks', 'hospital'));
    }

    public function detail($id)
    {
        $hospitals = $this->hospitalsService->all();
        $folks = Folk::all();
        $hospitalTransfer = $this->hospitalTransferService->findOneOrFail($id);
        $medical = $this->medicalSessionService->findOneOrFail($hospitalTransfer['medical_session_id']);
        return view('hospital_transfer.edit',
            compact('hospitalTransfer', 'medical', 'folks', 'hospitals'));
    }

}
