<?php

namespace App\Repositories\News;

use App\Constants\CommonConstants;
use App\Constants\NewsConstants;
use App\Models\News;
use App\Repositories\BaseRepository;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return News::class;
    }

    /**
     * list news with paginate
     * @param array $data
     * @param $paginate
     * @param $select
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function list(array $data, $paginate, $select)
    {
        $query = $this->model->select($select);
        if (isset($data[CommonConstants::KEYWORD])) {
            $keyword = $data[CommonConstants::KEYWORD];
            $query->where(function ($query) use ($keyword) {
                $query->orWhere('title', CommonConstants::OPERATOR_LIKE, '%' . $keyword . '%');
                $query->orWhere('short_description', CommonConstants::OPERATOR_LIKE, '%' . $keyword . '%');
            });
        }

        if (isset($data[NewsConstants::COLUMN_CATEGORY])) {
            $category = $data[NewsConstants::COLUMN_CATEGORY];
            $query->where(function ($query) use ($category) {
                $query->orWhere('category', $category);
            });
        }

        if (!empty($data[CommonConstants::KEY_SORT_COLUMN]) && !empty($data[CommonConstants::KEY_SORT_TYPE])) {
            $sort = [
                $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE]
            ];
            $query = $this->sort($query, $sort);
        }

        if ($paginate) {
            $page[CommonConstants::INPUT_PAGE_SIZE] = CommonConstants::DEFAULT_LIMIT_PAGE;
            $page[CommonConstants::INPUT_PAGE] = CommonConstants::PAGE_DEFAULT;
            if (!empty($data[CommonConstants::KEY_LIMIT])) {
                $page[CommonConstants::INPUT_PAGE_SIZE] = $data[CommonConstants::KEY_LIMIT];
            }
            if (isset($data[CommonConstants::INPUT_PAGE])) {
                $pageNumber = (int)$data[CommonConstants::INPUT_PAGE];
                $page[CommonConstants::INPUT_PAGE] = $pageNumber;
            }
            $query = $this->paginate($query, $page);
        }
        return $query;
    }
}
