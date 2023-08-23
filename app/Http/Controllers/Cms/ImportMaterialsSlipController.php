<?php

namespace App\Http\Controllers\Cms;

use App\Exports\MaterialSlipExport;
use App\Http\Controllers\Controller;
use App\Repositories\MaterialType\MaterialTypeRepositoryInterface;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Services\ImportMaterialsSlipService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ImportMaterialsSlipController extends Controller
{
    protected $importMaterialsSlipService;
    protected $unitRepository;
    protected $materialTypeRepository;

    public function __construct(
        ImportMaterialsSlipService $importMaterialsSlipService,
        UnitRepositoryInterface $unitRepositoryInterface,
        MaterialTypeRepositoryInterface $materialTypeRepositoryInterface
    ) {
        $this->importMaterialsSlipService = $importMaterialsSlipService;
        $this->unitRepository = $unitRepositoryInterface;
        $this->materialTypeRepository = $materialTypeRepositoryInterface;
    }

    /**
     * List import material slip
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('import_materials_slip.index');
    }

    /**
     * View create import material slip
     * @return Application|Factory|View
     */
    public function create()
    {
        $units = $this->unitRepository->all();
        $materialTypes = $this->materialTypeRepository->all();
        return view('import_materials_slip.add', compact('units', 'materialTypes'));
    }

    public function viewEdit($id)
    {
        $units = $this->unitRepository->all();
        $materialTypes = $this->materialTypeRepository->all();
        $data = $this->importMaterialsSlipService->details($id);
        $importMaterialSlip = $data['importMaterialSlip'];
        $materialBatchs = $data['materialBatchs'];
        return view(
            'import_materials_slip.edit',
            compact('units', 'materialTypes', 'importMaterialSlip', 'materialBatchs')
        );
    }

    /**  
     * Export.
     *
     * @return Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new MaterialSlipExport, 'phieu-nhap-kho.xlsx');
    }
}
