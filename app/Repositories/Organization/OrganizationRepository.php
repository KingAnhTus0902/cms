<?php

namespace App\Repositories\Organization;

use App\Models\Organization;
use App\Repositories\BaseRepository;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{

    public function getModel()
    {
        return Organization::class;
    }
}
