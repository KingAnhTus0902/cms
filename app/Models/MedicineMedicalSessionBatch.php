<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineMedicalSessionBatch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medicines_medical_session_batchs_tbl';
}
