<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Services\FileService\FileServiceInterface;
use App\Services\NewsService;
use Illuminate\Http\Request;
use App\Repositories\NewsCategory\NewsCategoryRepositoryInterface;
use Throwable;

class NewsController extends Controller
{
    /**
     * @var newsService
     */
    protected $newsService;

    /**
     * @var categoryRepository
     */
    protected $categoryRepository;

    /** @var FileServiceInterface */
    protected FileServiceInterface $fileService;

    /**
     * @param NewsService $newsService
     * @param NewsCategoryRepositoryInterface $categoryRepository
     * @param FileServiceInterface $fileService $fileService
     */
    public function __construct(
        NewsService $newsService,
        NewsCategoryRepositoryInterface $categoryRepository,
        FileServiceInterface $fileService
    ) {
        $this->newsService = $newsService;
        $this->categoryRepository = $categoryRepository;
        $this->fileService = $fileService;
    }

    /**
     * List Department
     * @param Request $request
     */
    public function list(Request $request)
    {
        $response = $this->newsService->list($request->get('data'), true);
        return view('elements.news.search-result', $response)->render();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function listCategory(Request $request)
    {
        $categoryId = $request->data['category_id'] ?? '';
        try {
            $categories = $this->categoryRepository->all();
            $view = '<option value="">--- ' . __('label.news.search_category') . ' ---</option>';
            foreach ($categories as $category) {
                if ($categoryId !== '' && $category->id == $categoryId) {
                    $view .= '<option value="' . $category->id . '" selected>' . $category->name . '</option>';
                } else {
                    $view .= '<option value="' . $category->id . '">' . $category->name . '</option>';
                }
            }

            return $view;
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * create news
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(NewsRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $result['data'] = $this->newsService->createNews($request);
            return $this->createSuccessResponse($result);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * update news
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($id)
    {
        $response['data'] = $this->newsService->findOneOrFail($id);
        return $this->successResponse($response);
    }

    /**
     * update news
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(NewsRequest $request)
    {
        try {
            $response['data'] = $this->newsService->updateNews($request);
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }


    /**
     * delete news
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $response['data'] = $this->newsService->deleteNews($request);
            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
    public function upload(Request $request, $id = null) {
        $param = $request->only('file', 'code');
        try {
            $result = $this->newsService->uploadContent($param, $id);
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
