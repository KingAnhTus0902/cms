<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'vital_signs_tbl';

    /**
     * @var array
     */
    protected $fillable = [
        'medical_session_id',
        'circuit',
        'temperature',
        'blood_pressure',
        'breathing',
        'height',
        'weight',
        'treatment_days',
        'bmi'
    ];
}
