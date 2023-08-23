<?php

namespace App\Repositories\Unit;

use App\Constants\CommonConstants;
use App\Models\Unit;
use App\Repositories\BaseRepository;

class UnitRepository extends BaseRepository implements UnitRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return Unit::class;
    }

    /**
     * list Unit
     *
     * @param mixed $data
     * @param bool $paginate
     * @param  $select
     *
     * @return [type]
     */
    public function list(array $data, $paginate, $select = CommonConstants::SELECT_ALL)
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
                $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE],
            ];
            $query = $this->sort($query, $sort);
        }
        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }
        return $query;
    }
}
