<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiseaseOfMedicalSession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'diseases_of_medical_sessions_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'medical_session_id',
        'disease_code',
        'disease_name',
        'is_main_disease'
    ];
}
