<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return Role::class;
    }
}
