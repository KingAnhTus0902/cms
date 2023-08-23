<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Contracts\View\View;

class DiseaseController extends BaseController
{
    /**
     * Display index disease
     *
     * @return View
     */
    public function index(): View
    {
        return view('disease.index');
    }
}
