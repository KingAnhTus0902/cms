<?php

namespace App\Repositories\HealthInsuranceCardHead;

use App\Constants\CommonConstants;
use App\Models\HealthInsuranceCardHead;
use App\Repositories\BaseRepository;

class HealthInsuranceCardHeadRepository extends BaseRepository implements HealthInsuranceCardHeadRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return HealthInsuranceCardHead::class;
    }

    /**
     * get list HealthInsuranceCardHead
     * @param $conditions
     * @return mixed
     */
    public function list($conditions)
    {
        $query = $this->model->select(CommonConstants::SELECT_ALL);
        if (!empty($conditions['code'])) {
            $query->where('code', $conditions['code']);
        }
        if (
            !empty($conditions[CommonConstants::KEY_SORT_COLUMN]) &&
            !empty($conditions[CommonConstants::KEY_SORT_TYPE])
        ) {
            $sort = [
                $conditions[CommonConstants::KEY_SORT_COLUMN] => $conditions[CommonConstants::KEY_SORT_TYPE]
            ];
            $query = $this->sort($query, $sort);
        }
        return $this->paginate($query, $this->handlePaginate($conditions));
    }
}
