<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthInsuranceCardHead extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'health_insurance_card_head_mst';

    protected $fillable = [
        'code',
        'discount_right_line',
        'discount_opposite_line',
    ];
}
