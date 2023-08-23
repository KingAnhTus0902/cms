<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\City\CityRepositoryInterface;

class CityService extends BaseService
{
    protected $mainRepository;

    public function __construct(
        CityRepositoryInterface $cityRepositoryInterface
    ) {
        $this->mainRepository = $cityRepositoryInterface;
    }
}
