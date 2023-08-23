<?php

namespace App\Services\Room;

use Illuminate\Support\Collection;

interface RoomServiceInterface
{
    /**
     * Data for disease homepage
     *
     * @return Collection
     */
    public function index(): Collection;
}
