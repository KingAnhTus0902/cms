<?php

namespace App\Services\Setting;

use Illuminate\Database\Eloquent\Model;

interface SettingServiceInterface
{
    /**
     * Update setting
     *
     * @param $param
     * @return ?Model
     */
    public function update($param): ?Model;
}
