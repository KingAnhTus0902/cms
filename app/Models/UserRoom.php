<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRoom extends Model
{
    use SoftDeletes;

    /*** @var string */
    protected $table = 'user_room_tbl';

    /***
     * Manage timestamps by Eloquent
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'room_id',
    ];
}
