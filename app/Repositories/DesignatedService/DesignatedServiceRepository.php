<?php

namespace App\Repositories\DesignatedService;

use App\Constants\CommonConstants;
use App\Models\DesignatedService;
use App\Repositories\BaseRepository;

class DesignatedServiceRepository extends BaseRepository implements DesignatedServiceRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return DesignatedService::class;
    }

    /**
     * @param $areaIds
     * @return mixed
     */
    public function list(array $data, $paginate, $select)
    {
        $query = $this->model
            ->with('room')
            ->select($select);

        if (isset($data[CommonConstants::KEYWORD])) {
            $keyword = $data[CommonConstants::KEYWORD];
            foreach ($keyword as $key => $value) {
                if (isset($value) && $value !== '') {
                    if (is_numeric($value)) {
                        $query->where($key, CommonConstants::OPERATOR_EQUAL, $value);
                    } else {
                        $query->where($key, CommonConstants::OPERATOR_LIKE, "%{$value}%");
                    }
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
