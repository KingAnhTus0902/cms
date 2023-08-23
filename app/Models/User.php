<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Filterable;
use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles, HasPermissions, Filterable;

    /**
     * Path link to the user storage
     *
     * @var string
     */
    private const USER_PATH = 'users';

    /**
     * List status users.
     *
     * @var array
     */
    public const STATUS_ACTIVE = 1;
    public const STATUS_DEACTIVATE = 0;
    public static array $status = array(
        self::STATUS_DEACTIVATE => 'Vô hiệu hóa',
        self::STATUS_ACTIVE => 'Hoạt động'
    );

    /**
     * List role users.
     *
     * @var array
     */
    public static array $role = array(
        ADMIN => 1,
        EXAMINATION_DOCTOR => 2,
        REFERRING_DOCTOR => 3,
        RECEPTIONIST => 4,
        PHARMACIST => 5
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'description',
        'phone',
        'address',
        'position',
        'department_id',
        'room_id',
        'certificate'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be registered.
     *
     * @var array<string, string>
     */
    protected $appends = [
        'user_code', 'role_id'
    ];

    /**
     * Belong to relations
     *
     * @return BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    /**
     * Belong to relations
     *
     * @return BelongsToMany
     */
    public function room(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'user_room_tbl')
            ->wherePivot('deleted_at', null);
    }

    /**
     * Get attribute user_code
     * @throws Exception
     */
    protected function getUserCodeAttribute(): string
    {
        return sprintf("%s%04d\n", $this->matchRole(), MAGIC_NUMBER * $this->id);
    }

    /**
     * Get attribute user_code
     * @throws Exception
     */
    protected function getRoleIdAttribute(): ?string
    {
        $roleId = $this->roles->first();
        return $roleId->id ?? null;
    }

    /**
     * Match the role for user
     *
     * @return string
     * @throws Exception
     */
    public function matchRole(): string
    {
        if (!isset($this->getRoleNames()[0])) {
            return UNKNOWN_ROLE;
        }

        return match ($this->getRoleNames()[0]) {
            ADMIN        => 'AD',
            EXAMINATION_DOCTOR => 'BSKB',
            REFERRING_DOCTOR => 'BSCD',
            RECEPTIONIST => 'LT',
            PHARMACIST   => 'DS',
            default      =>  UNKNOWN_ROLE,
        };
    }

    /**
     * Belong to relations
     *
     * @return HasOne
     */
    public function headDepartment(): HasOne
    {
        return $this->hasOne(Department::class, 'user_head_id', 'id');
    }

    /**
     * Get attribute image_avatar
     *
     * @return string
     */
    public function getImageAvatarAttribute(): string
    {
        return $this->getRawOriginal('avatar') ? (self::USER_PATH
            . DIRECTORY_SEPARATOR . $this->getRawOriginal('avatar')) : '';
    }

    /**
     * Raw attribute avatar
     *
     * @return Attribute
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ?
                request()->getSchemeAndHttpHost()
                . DIRECTORY_SEPARATOR
                . 'storage'
                . DIRECTORY_SEPARATOR
                . self::USER_PATH
                . DIRECTORY_SEPARATOR . $value : '',
        );
    }
}
