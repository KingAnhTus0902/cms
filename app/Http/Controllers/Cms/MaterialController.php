<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Repositories\MaterialType\MaterialTypeRepositoryInterface;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Services\MaterialService;

class MaterialController extends Controller
{
    protected $materialService;
    protected $unitRepository;
    protected $materialTypeRepository;

    /**
     * Constructor
     * Before
     *
     * @param MaterialService $materialService
     * @param UnitRepositoryInterface $unitRepositoryInterface
     * @param MaterialTypeRepositoryInterface $materialTypeRepositoryInterface
     */
    public function __construct(
        MaterialService $materialService,
        UnitRepositoryInterface $unitRepositoryInterface,
        MaterialTypeRepositoryInterface $materialTypeRepositoryInterface
    ) {
        $this->materialService = $materialService;
        $this->unitRepository = $unitRepositoryInterface;
        $this->materialTypeRepository = $materialTypeRepositoryInterface;
    }

    /**
     * Get List Material
     */
    public function index()
    {
        $units = $this->unitRepository->all();
        $materialTypes = $this->materialTypeRepository->all();
        return view('material.index', compact('units', 'materialTypes'));
    }
}
