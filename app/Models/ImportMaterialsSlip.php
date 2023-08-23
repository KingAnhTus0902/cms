<?php

namespace App\Models;

use App\Constants\CommonConstants;
use App\Constants\ImportMaterialsSlipConstants;
use App\Helpers\CommonHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportMaterialsSlip extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'import_materials_slips_tbl';
    protected $fillable = [
        'code',
        'user_id',
        'user_name',
        'import_day',
        'status'
    ];

    public function getImportDayAttribute($value): string
    {
        return $value
            ? CommonHelper::formatDate(
                (string)$value,
                YEAR_MONTH_DAY,
                DAY_MONTH_YEAR,
            )
            : '';
    }

    public function getStatusAttribute($value)
    {

        $openBTag = "<b>";
        $closeTag = "</b></span>";
        return match ($value) {
            ImportMaterialsSlipConstants::STATUS_DRAFT =>
                "<span class='text-warning-custom'>" . $openBTag
                .ImportMaterialsSlipConstants::STATUS_TEXT[ImportMaterialsSlipConstants::STATUS_DRAFT].
                $closeTag,
            ImportMaterialsSlipConstants::STATUS_SAVE =>
                "<span class='text-success'>" . $openBTag
                .ImportMaterialsSlipConstants::STATUS_TEXT[ImportMaterialsSlipConstants::STATUS_SAVE].
                $closeTag,
            default => null
        };
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')
            ->whereNull(CommonConstants::DELETED_AT);
    }
}
