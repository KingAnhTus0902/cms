<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignatedService extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'designated_services_tbl';

    protected $fillable = [
        'code',
        'name',
        'description',
        'room_id',
        'specialist',
        'service_unit_price',
        'type_surgery',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
