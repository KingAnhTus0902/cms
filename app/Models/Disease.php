<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disease extends Model
{
    use SoftDeletes;

    protected $table = 'diseases_mst';

    public const TYPE_MAIN = 0;
    public const TYPE_SUB = 1;
    public static array $type = array(
        self::TYPE_MAIN => 'Bệnh chính',
        self::TYPE_SUB => 'Bệnh phụ'
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'type'
    ];
}
