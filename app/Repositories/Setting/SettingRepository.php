<?php

namespace App\Repositories\Setting;

use App\Models\Setting;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return Setting::class;
    }
}
