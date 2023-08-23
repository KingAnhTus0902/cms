<?php

namespace App\Repositories\Hospital;

use App\Repositories\BaseRepositoryInterface;

interface HospitalRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param mixed $keyword
     *
     * @return mixed
     */
    public function getHospitalSuggest($keyword);

    /**
     * Get mst hospital .
     *
     * @return Model
     */
    public function getMstHospital();
}
