<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Contracts\View\View;

class ExaminationTypeController extends BaseController
{
    /**
     * Display index disease
     *
     * @return View
     */
    public function index(): View
    {
        return view('examination_type.index');
    }
}
