<?php

namespace App\Repositories\GroupPermission;

use App\Models\GroupPermission;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class GroupPermissionRepository extends BaseRepository implements GroupPermissionRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return GroupPermission::class;
    }
}
