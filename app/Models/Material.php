<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'materials_tbl';

    protected $fillable = [
        'code',
        'name',
        'mapping_name',
        'type',
        'active_ingredient_name',
        'content',
        'dosage_form',
        'material_type_id',
        'ingredients',
        'unit_id',
        'service_unit_price',
        'use_insurance',
        'insurance_code',
        'insurance_unit_price',
        'disease_type',
        'method',
        'usage',
    ];

    /**
     * Get the materialType that owns the Material
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materialType()
    {
        return $this->belongsTo(MaterialType::class, 'material_type_id', 'id');
    }

    /**
     * Get the unit that owns the Material
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    /**
     * Get the material batches for the material.
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialBatches(): HasMany
    {
        return $this->hasMany(MaterialBatch::class, 'material_id', 'id');
    }
}
