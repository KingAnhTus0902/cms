<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends \Spatie\Permission\Models\Permission
{

    /**
     * List status users.
     *
     * @var array
     */
    public const TYPE_PERMISSION = 1;
    public const TYPE_ROLE = 2;
    public static array $type = array(
        self::TYPE_PERMISSION => 'Quyền',
        self::TYPE_ROLE => 'Chức vụ'
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'default_name', 'guard_name', 'group_id', 'created_at', 'updated_at'
    ];

    /**
     * Belong to relations
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'roles',
            'role_id',
            'permission_id'
        );
    }
}
