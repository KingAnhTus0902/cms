<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomePageController extends Controller
{
    /**
     * Index method
     *
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.index');
    }
}
