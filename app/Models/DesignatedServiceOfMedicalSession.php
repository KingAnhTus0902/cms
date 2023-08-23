<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignatedServiceOfMedicalSession extends Model
{
    use SoftDeletes;
    use HasFactory;

    /**
     * Specific table name
     *
     * @var string
     */
    protected $table = 'designated_service_of_medical_sessions_tbl';

    /**
     * List status designated service of medical session.
     *
     * @var array
     */
    public const WAITING = 1;
    public const PROCESSING = 2;
    public const FINISH = 3;
    public const CANCEL = 4;
    public static array $status = array(
        self::WAITING => 'Chờ thực hiện',
        self::PROCESSING => 'Đang thực hiện',
        self::FINISH => 'Đã hoàn thành',
        self::CANCEL => 'Đã hủy'
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_id',
        'creator_id',
        'executor_id',
        'medical_session_id',
        'designated_service_id',
        'designated_service_name',
        'designated_service_unit_price',
        'designated_service_type_surgery',
        'designated_service_insurance_code',
        'designated_service_specialist',
        'designated_insurance_unit_price',
        'status',
        'payment_status',
        'payment_at',
        'payment_price',
        'qty',
        'designated_service_amount',
        'medical_test_result',
        'medical_test_conclude',
        'description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be registered.
     *
     * @var array<string, string>
     */
    protected $appends = [
        'format_status'
    ];

    /**
     * Belong to relations
     *
     * @return BelongsTo
     */
    public function designatedService(): BelongsTo
    {
        return $this->belongsTo(DesignatedService::class, 'designated_service_id', 'id');
    }

    /**
     * Belong to relations
     *
     * @return BelongsTo
     */
    public function medicalSession(): BelongsTo
    {
        return $this->belongsTo(MedicalSession::class, 'medical_session_id', 'id');
    }

    /**
     * Belong to relations
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    /**
     * Belong to relations
     *
     * @return BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    /**
     * Get status attribute
     *
     * @return string
     */
    protected function getFormatStatusAttribute(): string
    {
        $openBTag = '<b>';
        $closeTag = '</b></span>';
        return match ((int)$this->status) {
            self::WAITING =>
                "<span class='text-warning-custom'>" . $openBTag
                . self::$status[self::WAITING] .
                $closeTag,
            self::PROCESSING =>
                "<span class='text-primary'>" . $openBTag
                . self::$status[self::PROCESSING] .
                $closeTag,
            self::FINISH =>
                "<span class='text-success'>" . $openBTag
                . self::$status[self::FINISH] .
                $closeTag,
            self::CANCEL =>
                "<span class='text-danger'>" . $openBTag
                . self::$status[self::CANCEL] .
                $closeTag,
            default => ''
        };
    }
}
