<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HospitalTransfer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hospital_transfers_tbl';

    protected $fillable = [
        'medical_session_id',
        'user_id',
        'cadre_age',
        'cadre_work_place',
        'hospital_id',
        'treatment_start_date',
        'treatment_end_date',
        'clinical_signs',
        'subclinical_results',
        'diagnose',
        'treatment_methods',
        'patient_status',
        'reasons',
        'treatment_directions',
        'transit_times',
        'transportations',
        'escort_information',
    ];

    public function medicalSession()
    {
        return $this->belongsTo(MedicalSession::class, 'medical_session_id', 'id');
    }
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
}
