<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GroupPermission extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'guard_name', 'created_at', 'updated_at'
    ];

    /**
     * HasMany relations
     *
     * @return HasMany
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class, 'group_id', 'id');
    }
}
