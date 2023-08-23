<?php

namespace App\Repositories\Department;

use App\Constants\CommonConstants;
use App\Models\Department;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return Department::class;
    }

    public function list(array $data, $paginate, $select)
    {
        $query = $this->model->select($select);
        if (isset($data[CommonConstants::KEYWORD])) {
            $keyword = $data[CommonConstants::KEYWORD];
            foreach ($keyword as $key => $value) {
                if (isset($value) && $value !== "") {
                    $query->where($key, CommonConstants::OPERATOR_LIKE, "%{$value}%");
                }
            }
        }

        if (!empty($data[CommonConstants::KEY_SORT_COLUMN]) && !empty($data[CommonConstants::KEY_SORT_TYPE])) {
            $sort = [
                $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE]
            ];
            $query = $this->sort($query, $sort);
        }

        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }
        return $query;
    }
}
