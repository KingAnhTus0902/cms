<?php

namespace App\Services\Role;

use Illuminate\Support\Collection;

interface RoleServiceInterface
{
    /**
     * List of role
     *
     * @param bool $hasAdmin
     * @return Collection
     */
    public function index(bool $hasAdmin): Collection;
}
