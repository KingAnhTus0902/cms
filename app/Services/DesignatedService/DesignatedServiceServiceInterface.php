<?php

namespace App\Services\DesignatedService;

use Illuminate\Support\Collection;

interface DesignatedServiceServiceInterface
{
    /**
     * Data for designated service
     *
     * @return Collection
     */
    public function index(): Collection;
}
