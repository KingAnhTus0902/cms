<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Services\CityService;
use App\Services\HospitalService;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    protected $hospitalsService;

    protected $cityService;

    protected $organizationService;


    public function __construct(
        HospitalService $hospitalsService,
        CityService $cityService,
        OrganizationService $organizationService
    ) {
        $this->hospitalsService = $hospitalsService;
        $this->cityService = $cityService;
        $this->organizationService = $organizationService;
    }


    /**
     * List hospitals, list cities
     * @param Request $request
     */
    public function index()
    {
        $organizations = $this->organizationService->all();
        $cities = $this->cityService->all();
        return view('hospital.list', compact('cities', 'organizations'));
    }

}
