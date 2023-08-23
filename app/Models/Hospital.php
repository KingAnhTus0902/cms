<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hospitals_mst';

    protected $fillable = [
        'name',
        'code',
        'city_id',
        'address',
        'phone',
        'fax',
        'email',
        'note',
        'organization_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
}
