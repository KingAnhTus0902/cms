<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalSessionRoom extends Model
{
    use HasFactory;
    protected $table = 'medical_session_room_tbl';
    protected $fillable = [
        'room_id',
        'status_room',
        'user_id',
        'medical_session_id',
        'medical_day',
        'ordinal',
        'type',
        'examination_id',
        'examination_name',
        'examination_insurance_price',
        'examination_service_price'
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getRoomsApi($id)
    {
        return Room::withTrashed()->find($id);
    }
}
