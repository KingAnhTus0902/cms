<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    /**
     * Guard name.
     *
     * @var array
     */
    public const GUARD_WEB = 'web';
    public const GUARD_MOBILE = 'mobile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'default_name', 'guard_name', 'created_at', 'updated_at', 'order'
    ];

    /**
     * Auto increment order for creating action
     *
     * @var array<int, string>
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            $role->order = static::max('order') + 1;
        });
    }
}
