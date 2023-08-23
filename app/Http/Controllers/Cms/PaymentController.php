<?php

namespace App\Http\Controllers\Cms;

use App\Models\City;
use App\Models\Folk;
use Illuminate\Contracts\View\View;

class PaymentController extends BaseController
{
    /**
     * Display index disease
     *
     * @return View
     */
    public function index(): View
    {
        return view('payment.index');
    }

    public function detail($id): View
    {
        $cities = City::all();
        $folks = Folk::all();
        return view('payment.detail', ['id' => $id, 'cities' => $cities, 'folks' => $folks]);
    }
}
