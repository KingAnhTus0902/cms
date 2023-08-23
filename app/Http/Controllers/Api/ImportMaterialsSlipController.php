<?php

namespace App\Http\Controllers\Api;

use App\Constants\ImportMaterialsSlipConstants;
use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportMaterialsSlipBeforeRequest;
use App\Http\Requests\ImportMaterialsSlipRequest;
use App\Repositories\MaterialType\MaterialTypeRepositoryInterface;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Services\ImportMaterialsSlipService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
     * @param Request $request
     */
    public function list(Request $request)
    {
        $response = $this->importMaterialsSlipService->list($request->get('data'), true);
        return view('elements.import_materials_slip.search-result', $response)->render();
    }

    public function store(ImportMaterialsSlipRequest $request)
    {
        $data = $request->all();
        $data['status'] = ($data['type'] == 'save') ?
            ImportMaterialsSlipConstants::STATUS_SAVE :
            ImportMaterialsSlipConstants::STATUS_DRAFT;
        $response = $this->importMaterialsSlipService->store($data);
        if ($response['result'] === true) {
            return $this->createSuccessResponse(
                [
                    'import_materials_slip_id' => $response['import_materials_slip_id'],
                    'status'                   => $data['status'],
                    'message_save_draft'       => (__('label.import_materials_slip.response.message.save_draft')),
                    'message_save_real'        => (__('label.import_materials_slip.response.message.save_real')),
                ]
            );
        }
        return $this->badRequestErrorResponse($response['error']);
    }

    public function edit(ImportMaterialsSlipRequest $request)
    {
        $data = $request->all();
        $data['status'] = ($data['type'] == 'save') ?
            ImportMaterialsSlipConstants::STATUS_SAVE :
            ImportMaterialsSlipConstants::STATUS_DRAFT;
        $response = $this->importMaterialsSlipService->edit($data);
        if ($response === true) {
            return $this->updateSuccessResponse(
                [
                    'status'             => $data['status'],
                    'message_save_draft' => (__('label.import_materials_slip.response.message.save_draft')),
                    'message_save_real' => (__('label.import_materials_slip.response.message.save_real')),
                ]
            );
        }
        return $this->badRequestErrorResponse($response);
    }

    /**
     * Valid data import material slip.
     *
     * @param ImportMaterialsSlipBeforeRequest $request
     * @return Illuminate\Http\JsonResponse
     */
    public function validImport(ImportMaterialsSlipBeforeRequest $request)
    {
        $result = $this->importMaterialsSlipService->validImport($request->only('import_day', 'file', 'status'));

        if ($result['isLimit']) {
            return $this->badRequestErrorResponse(null,  __('messages.IMS-001'));
        }

        if (!empty($result['errors'])) {
            return $this->successResponse(['errors' => $result['errors']]);
        }

        return view('elements.import_materials_slip.preview-import', ['rows' => $result['data']])->render();
    }

    /**
     * Import material slip.
     *
     * @param ImportMaterialsSlipBeforeRequest $request
     * @return Illuminate\Http\JsonResponse
     */
    public function import(ImportMaterialsSlipBeforeRequest $request)
    {
        $result = $this->importMaterialsSlipService->import($request->only('import_day', 'file', 'status'));

        if (!$result) {
            return $this->internalServerErrorResponse();
        }

        return $this->successResponse([
            'message' => 'Import thành công'
        ]);
    }

    /**
     * Details import material slip
     * @param $id
     * @return string
     */
    public function detail($id): string
    {
        $response = $this->importMaterialsSlipService->details($id);
        return view('elements.import_materials_slip.details', $response)->render();
    }

    /**
     * Delete import-material-slip
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {
        $response = $this->importMaterialsSlipService->delete($request->input('id'));
        if ($response === true) {
            return $this->deleteSuccessResponse([]);
        }
        return $this->badRequestErrorResponse($response);
    }
}
