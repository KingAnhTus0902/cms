<?php

namespace App\Repositories\Material;

use App\Repositories\BaseRepositoryInterface;

interface MaterialRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * get list Material
     * @param $conditions
     * @return mixed
     */
    public function list($conditions);

    /**
     * searchMaterial
     *
     * @param mixed $keyword
     * @param mixed $type
     * @param mixed $forPrescription
     * @return mixed
     */
    public function searchMaterial($keyword, $forPrescription = false);
}
