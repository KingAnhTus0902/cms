<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesignatedServiceRequest;
use App\Services\DesignatedServiceService;
use App\Services\FileService\FileServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class DesignatedServiceController extends Controller
{
    protected $designatedServiceService;
    /** @var FileServiceInterface */
    protected FileServiceInterface $fileService;

    /**
     * DesignatedServiceController constructor.
     * @param DesignatedServiceService $designatedServiceService
     * @param FileServiceInterface $fileService
     */
    public function __construct(
        DesignatedServiceService $designatedServiceService,
        FileServiceInterface $fileService
    )
    {
        $this->designatedServiceService = $designatedServiceService;
        $this->fileService = $fileService;
    }

    /**
     * List DesignatedService
     * @param Request $request
     */
    public function list(Request $request)
    {
        $response = $this->designatedServiceService->list($request->get('data'), true);
        return view('elements.designated_service.search-result', $response)->render();
    }

    /**
     * create DesignatedService
     * @param DesignatedServiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(DesignatedServiceRequest $request)
    {
        try {
            $data = $request->only(
                'name',
                'description',
                'room_id',
                'decision_number',
                'specialist',
                'service_unit_price',
                'type_surgery',
                );
            $response['data'] = $this->designatedServiceService->saveDesignatedService($data, null);
            return $this->createSuccessResponse($response);
        } catch (Throwable $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * update DesignatedService
     * @param DesignatedServiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($id)
    {
        $response['data'] = $this->designatedServiceService->findOneOrFail($id);
        return $this->successResponse($response);
    }

    /**
     * update DesignatedService
     * @param DesignatedServiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(DesignatedServiceRequest $request)
    {
        try {
            $response['data'] = $this->designatedServiceService->saveDesignatedService(
                $request->only(
                    'name',
                    'description',
                    'room_id',
                    'specialist',
                    'service_unit_price',
                    'type_surgery',
                ),
                $request->id
            );
            if ($response['data'] === Response::HTTP_NOT_FOUND) {
                return $this->notFoundErrorResponse();
            }
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }


    /**
     * delete DesignatedService
     * @param DesignatedServiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $id = $request->input('id');
            $department = $this->designatedServiceService->findOneOrFail($id);
            $response['data'] = $department->delete();
            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    public function upload(Request $request, $id = null)
    {
        $param = $request->only('file', 'code');
        try {
            $result =  $this->designatedServiceService->uploadDescription($param, $id);

            return isset($result)
                ? response()->json([
                    'success' => __('messages.SM-002'),
                    'data' => $result
                ])
                : response()->json(['error' => __('messages.EM-000')], 500);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['error' => __('messages.EM-000')], 500);
        }
    }
}
