<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseSearchRequest;
use App\Services\UnitService;

class UnitController extends Controller
{
    protected $unitService;

    /**
     * Constructor
     * Before
     * @param UnitService $unitService
     */
    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    /**
     * Get List Unit
     */
    public function index()
    {
        return view('unit.index');
    }

    /**
     * List Unit Ajax Data
     * @param BaseSearchRequest $request
     * @return string
     */
    public function list(BaseSearchRequest $request)
    {
        $unitsData = $this->unitService->list($request->all());
        return view('elements.unit.search-result', $unitsData)->render();
    }
}
