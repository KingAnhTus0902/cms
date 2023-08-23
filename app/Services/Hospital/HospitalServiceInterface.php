<?php

namespace App\Services\Hospital;

use Illuminate\Support\Collection;

interface HospitalServiceInterface
{
    /**
     * Data for hospital
     *
     * @return Collection
     */
    public function index(): Collection;
}
