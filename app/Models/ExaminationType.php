<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationType extends Model
{
    use SoftDeletes;

    protected $hidden = ['pivot'];
    protected $table = 'examination_type_mst';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'service_unit_price'
    ];
}
