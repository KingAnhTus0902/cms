<?php

namespace App\Models;

use App\Constants\MedicineConstants;
use App\Constants\PrescriptionConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineOfMedicalSession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medicine_of_medical_sessions_tbl';

    protected $fillable = [
        'medical_session_id',
        'materials_name',
        'materials_code',
        'materials_amount',
        'materials_unit',
        'materials_unit_price',
        'materials_insurance_unit_price',
        'materials_usage',
        'materials_type_id',
        'materials_active_ingredient_name',
        'materials_insurance_code',
        'status',
        'materials_dosage_form',
        'materials_method',
        'materials_content',
        'materials_type_name',
        'advice',
        'user_id',
        'payment_status',
        'use_insurance'
    ];

    /**
     * Get the prescription that owns the Material
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    /**
     * Get material/medicine info
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo(Material::class, 'materials_code', 'code');
    }

    public function getStatusLabelAttribute()
    {
        $openBTag = '<b>';
        $closeTag = '</b></span>';
        return match ($this->status) {
        MedicineConstants::STATUS_WAITING_DISPENSED =>
                "<span class='text-warning-custom'>" . $openBTag
                . MedicineConstants::MEDICINE_STATUS[MedicineConstants::STATUS_WAITING_DISPENSED] .
                $closeTag,
            MedicineConstants::STATUS_DISPENSED =>
                "<span class='text-success'>" . $openBTag
                . MedicineConstants::MEDICINE_STATUS[MedicineConstants::STATUS_DISPENSED] .
                $closeTag,
            MedicineConstants::STATUS_CANCEL =>
                "<span class='text-danger'>" . $openBTag
                . MedicineConstants::MEDICINE_STATUS[MedicineConstants::STATUS_CANCEL] .
                $closeTag,
            default => null
        };
    }
}
