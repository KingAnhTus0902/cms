<?php

namespace App\Repositories\VitalSign;

use App\Models\VitalSign;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class VitalSignRepository extends BaseRepository implements VitalSignRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return VitalSign::class;
    }
}
