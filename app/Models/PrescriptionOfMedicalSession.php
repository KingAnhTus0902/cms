<?php

namespace App\Models;

use App\Constants\MedicineConstants;
use App\Constants\PrescriptionConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrescriptionOfMedicalSession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'prescription_of_medical_sessions_tbl';

    protected $fillable = [
        'medical_session_id',
        'status',
        'payment_status',
        'payment_price',
        'payment_at',
    ];

    public function medicines()
    {
        return $this->hasMany(MedicineOfMedicalSession::class, 'prescription_id', 'id');
    }

    public function getStatusLabelAttribute()
    {
        $openBTag = '<b>';
        $closeTag = '</b></span>';
        return match ($this->status) {
            PrescriptionConstants::STATUS_WAITING_DISPENSED =>
                "<span class='text-warning-custom'>" . $openBTag
                . PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_WAITING_DISPENSED] .
                $closeTag,
            PrescriptionConstants::STATUS_DISPENSED =>
                "<span class='text-success'>" . $openBTag
                . PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_DISPENSED] .
                $closeTag,
            PrescriptionConstants::STATUS_CANCEL =>
                "<span class='text-danger'>" . $openBTag
                . PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_CANCEL] .
                $closeTag,
            default => null
        };
    }

    public function medicinesDispensed()
    {
        return $this->hasMany(MedicineOfMedicalSession::class, 'prescription_id', 'id')
                    ->where('status', MedicineConstants::STATUS_DISPENSED);
    }
}
