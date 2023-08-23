<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * Path link to the setting storage
     *
     * @var string
     */
    private const SETTING_PATH = 'settings';

    /** @var string */
    protected $table = 'settings_mst';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hospital_id',
        'default_name',
        'clinic_name',
        'clinic_name_acronym',
        'address',
        'logo',
        'phone',
        'email',
        'ministry_of_health',
        'base_salary'
    ];

    /**
     * Get attribute image_avatar
     *
     * @return string
     */
    public function getImageLogoAttribute(): string
    {
        return $this->getRawOriginal('logo') ? (self::SETTING_PATH
            . DIRECTORY_SEPARATOR . $this->getRawOriginal('logo')) : '';
    }

    /**
     * Raw attribute avatar
     *
     * @return Attribute
     */
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ?
                request()->getSchemeAndHttpHost()
                . DIRECTORY_SEPARATOR
                . 'storage'
                . DIRECTORY_SEPARATOR
                . self::SETTING_PATH
                . DIRECTORY_SEPARATOR . $value : '',
        );
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
}
