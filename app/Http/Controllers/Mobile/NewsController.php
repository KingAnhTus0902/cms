<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Services\NewsService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Mobile\BaseController;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class NewsController extends BaseController
{
    /**
     * @var newsService
     */
    protected $newsService;

    /**
     * @param NewsService $newsService
     */
    public function __construct(
        NewsService $newsService
    ) {
        $this->newsService = $newsService;
    }

    public function list(Request $request)
    {
        $select = [
            'id',
            'title',
            'short_description',
            'category',
            'thumbnail',
            'content',
            'created_at',
            'updated_at',
        ];
        $param = [
            'keyword'=> $request->keyword,
            'limit' => $request->limit,
            'page' => $request->page,
            'sort_column' => 'id',
            'sort_type' =>'DESC'
        ];
        try {
            $response = $this->newsService->list($param, true, $select);
            $data = $response['news']->toArray();

            return $this->response(
                Response::HTTP_OK,
                '',
                $data['data']
            );

        } catch (\Exception | \Error $e) {
            report($e);

            return $this->response(
                Response::HTTP_BAD_REQUEST
            );
        }

    }

    public function detailApiNews($id)
    {
        $response['data'] = $this->newsService->find($id);

        return $this->response(
            $response['data'] ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
            '',
            $response['data']
        );
    }
}
