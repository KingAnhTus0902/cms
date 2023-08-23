<?php

namespace App\Models;

use App\Constants\CommonConstants;
use App\Constants\ImportMaterialsSlipConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialBatch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'material_batchs_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'import_materials_slip_id',
        'material_id',
        'material_code',
        'material_name',
        'amount',
        'unit_price',
        'mfg_date',
        'exp_date',
        'supplier',
        'status',
        'batch_name',
        'note'
    ];

    /**
     * Get the material that owns the material batch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id', 'id')->withDefault();
    }

    /**
     * Scope a query to only include batchs unexpired.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnexpired($query)
    {
        return $query->whereDate('exp_date', CommonConstants::OPERATOR_GREATER_THAN, now());
    }

    /**
     * Scope a query to only include batchs with status real save.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRealSave($query)
    {
        return $query->where('status', CommonConstants::OPERATOR_EQUAL, ImportMaterialsSlipConstants::STATUS_SAVE);
    }
}
