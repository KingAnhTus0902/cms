<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'departments_mst';
    protected $fillable = ['code', 'name', 'location', 'user_head_id', 'note'];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'department_id', 'id');
    }

    public function userHead()
    {
        return $this->belongsTo(User::class, 'user_head_id', 'id');
    }
}
