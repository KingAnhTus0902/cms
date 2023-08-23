<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\MaterialTypeService;

class MaterialTypeController extends Controller
{
    /**
     * @var materialTypeService
     */
    protected $materialTypeService;

    /**
     * @param MaterialTypeService $materialTypeService
     */
    public function __construct(MaterialTypeService $materialTypeService)
    {
        $this->materialTypeService = $materialTypeService;
    }

    /**
     * List material types
     *
     * @param Request $request
     *
     * @return View
     */
    public function index(Request $request): View
    {
        return view('material_type.index');
    }
}
