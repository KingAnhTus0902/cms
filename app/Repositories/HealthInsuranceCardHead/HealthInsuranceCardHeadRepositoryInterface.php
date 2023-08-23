<?php

namespace App\Repositories\HealthInsuranceCardHead;

use App\Repositories\BaseRepositoryInterface;

interface HealthInsuranceCardHeadRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * get list HealthInsuranceCardHead
     * @param $conditions
     * @return mixed
     */
    public function list($conditions);
}
