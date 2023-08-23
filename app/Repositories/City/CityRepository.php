<?php

namespace App\Repositories\City;

use App\Constants\CommonConstants;
use App\Models\City;
use App\Repositories\BaseRepository;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return City::class;
    }
}
