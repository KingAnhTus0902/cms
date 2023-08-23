<?php

namespace App\Repositories\UserRoom;

use App\Models\UserRoom;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRoomRepository extends BaseRepository implements UserRoomRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return UserRoom::class;
    }
}
