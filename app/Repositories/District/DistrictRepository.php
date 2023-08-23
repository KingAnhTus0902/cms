<?php

namespace App\Repositories\District;

use App\Constants\CommonConstants;
use App\Models\District;
use App\Repositories\BaseRepository;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return District::class;
    }
}
