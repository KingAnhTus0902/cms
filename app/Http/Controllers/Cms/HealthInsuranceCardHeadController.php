<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

class HealthInsuranceCardHeadController extends Controller
{
    /**
     * Get List HealthInsuranceCardHead
     */
    public function index()
    {
        return view('health_insurance_card.index');
    }
}
