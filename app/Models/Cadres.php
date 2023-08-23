<?php

namespace App\Models;

use App\Repositories\City\CityRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Constants\CadresConstants;

class Cadres extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'cadres_tbl';

    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'identity_card_number',
        'medical_insurance_number',
        'medical_insurance_start_date',
        'medical_insurance_end_date',
        'medical_insurance_address',
        'is_long_date',
        'insurance_five_consecutive_years',
        'hospital_code',
        'status',
        'medical_insurance_symbol_code',
        'medical_insurance_live_code',
        'birthday',
        'password',
        'gender',
        'folk_id',
        'city_id',
        'district_id',
        'phone',
        'job',
        'email',
        'address',
        'otp',
        'expired_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return BelongsTo
     */
    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function getGenderLabelAttribute()
    {
        return $this->gender == CadresConstants::GENDER_MALE
            ? __('label.cadres.gender_value.male')
            : __('label.cadres.gender_value.female');
    }
}
