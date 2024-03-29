<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'organizations_mst';

    public function hospitals()
    {
        return $this->hasMany(Hospital::class, 'organization_id', 'id');
    }
}
