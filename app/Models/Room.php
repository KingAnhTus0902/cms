<?php

namespace App\Models;

use App\Constants\CommonConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rooms_mst';
    protected $fillable = ['code', 'name', 'location', 'department_id', 'note', 'examination_type_id'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id')
            ->whereNull(CommonConstants::DELETED_AT);
    }
    public function designatesServices()
    {
        return $this->hasMany(DesignatedService::class, 'room_id', 'id')
            ->whereNull(CommonConstants::DELETED_AT);
    }

    public function medicalSessions()
    {
        return $this->belongsToMany(
            MedicalSession::class,
            'medical_session_room_tbl',
            'room_id',
            'medical_session_id'
        );
    }

    public function examinationType()
    {
        return $this->belongsTo(
            ExaminationType::class,
            'examination_type_id',
            'id'
        );
    }
}
