<?php

namespace App\Services;

use App\Repositories\Organization\OrganizationRepositoryInterface;

class OrganizationService extends BaseService
{

    protected $mainRepository;

    public function __construct(
        OrganizationRepositoryInterface $organizationRepositoryInterface
    ) {
        $this->mainRepository = $organizationRepositoryInterface;
    }
}
