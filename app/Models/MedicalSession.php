<?php

namespace App\Models;

use App\Constants\CommonConstants;
use App\Constants\MedicalSessionConstants;
use App\Constants\MaterialConstants;
use App\Helpers\CommonHelper;
use App\Repositories\City\CityRepository;
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\Room\RoomRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class MedicalSession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medical_sessions_tbl';
    protected $fillable = [
        'code',
        'status',
        'medical_examination_day',
        'medical_examination_day_end',
        'cadre_id',
        'department_id',
        'use_medical_insurance',
        'user_id',
        'reason_for_examination',
        'pathological_process',
        'personal_history',
        'family_history',
        'conclude',
        'payment_status',
        'diagnose',
        'payment_price',
        'health_insurance_fund',
        'patient_pay',
        'benefit_rate',
        'payment_at',
        're_examination_date',
        'treatment_line',
        'cadre_code',
        'cadre_name',
        'cadre_identity_card_number',
        'cadre_birthday',
        'cadre_gender',
        'cadre_folk_id',
        'cadre_phone',
        'cadre_email',
        'cadre_city_id',
        'cadre_district_id',
        'cadre_address',
        'cadre_job',
        'cadre_medical_insurance_number',
        'cadre_medical_insurance_start_date',
        'cadre_medical_insurance_end_date',
        'cadre_is_long_date',
        'cadre_insurance_five_consecutive_years',
        'cadre_medical_insurance_symbol_code',
        'cadre_medical_insurance_live_code',
        'cadre_hospital_code',
        'cadre_medical_insurance_address',
    ];

    /**
     * List status medical session.
     *
     * @var array
     */

    public const STATUS_WAITING_PAY = 0;
    public const STATUS_WAITING = 1;
    public const STATUS_DOING = 2;
    public const STATUS_WAITING_RESULT = 3;
    public const STATUS_DONE = 4;
    public const STATUS_CANCEL = 5;
    public static array $status = array(
        self::STATUS_WAITING_PAY => 'Chờ thanh toán',
        self::STATUS_WAITING => 'Chờ khám',
        self::STATUS_DOING => 'Đang khám',
        self::STATUS_WAITING_RESULT => 'Chờ kết quả',
        self::STATUS_DONE => 'Hoàn tất',
        self::STATUS_CANCEL => 'Hủy khám'
    );

    public function cadre()
    {
        return $this->belongsTo(Cadres::class, 'cadre_id', 'id');
    }

    public function rooms()
    {
        return $this->belongsToMany(
            Room::class,
            'medical_session_room_tbl',
            'medical_session_id',
            'room_id'
        );
    }

    /**
     * Belong to relations
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getStatusAttribute($value)
    {
        $openBTag = '<b>';
        $closeTag = '</b></span>';
        return match ($value) {
            MedicalSessionConstants::STATUS_WAITING_PAY =>
                "<span class='text-danger'>" . $openBTag
                . MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_WAITING_PAY] .
                $closeTag,
            MedicalSessionConstants::STATUS_WAITING =>
                "<span class='text-warning-custom'>" . $openBTag
                . MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_WAITING] .
                $closeTag,
            MedicalSessionConstants::STATUS_DOING =>
                "<span class='text-primary'>" . $openBTag
                . MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_DOING] .
                $closeTag,
            MedicalSessionConstants::STATUS_WAITING_RESULT =>
                "<span class='text-info'>" . $openBTag
                . MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_WAITING_RESULT] .
                $closeTag,
            MedicalSessionConstants::STATUS_DONE =>
                "<span class='text-success'>" . $openBTag
                . MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_DONE] .
                $closeTag,
            MedicalSessionConstants::STATUS_CANCEL =>
                "<span class='text-danger'>" . $openBTag
                . MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_CANCEL] .
                $closeTag,
            default => null
        };
    }

    public function getPaymentStatusAttribute($value)
    {
        $openBTag = "<b>";
        $closeTag = "</b></span>";
        return match ($value) {
            MedicalSessionConstants::UNPAID_STATUS =>
                "<span class='text-primary'>" . $openBTag
                .MedicalSessionConstants::PAYMENT_STATUS_TEXT[MedicalSessionConstants::UNPAID_STATUS].
                $closeTag,
            MedicalSessionConstants::PAID_STATUS =>
                "<span class='text-success'>" . $openBTag
                .MedicalSessionConstants::PAYMENT_STATUS_TEXT[MedicalSessionConstants::PAID_STATUS].
                $closeTag,
            MedicalSessionConstants::CANCEL_STATUS =>
                "<span class='text-danger'>" . $openBTag
                .MedicalSessionConstants::PAYMENT_STATUS_TEXT[MedicalSessionConstants::CANCEL_STATUS].
                $closeTag,
            default => null
        };
    }

    public function getRoomIdAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        $room = (new RoomRepository())->find($value);
        return $room->name ?? null;
    }

    public function getDepartmentIdAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        $room = (new DepartmentRepository())->find($value);
        return $room->name ?? null;
    }

    public function services()
    {
        return $this->hasMany(DesignatedServiceOfMedicalSession::class, 'medical_session_id', 'id');
    }

    public function diseases()
    {
        return $this->hasMany(DiseaseOfMedicalSession::class, 'medical_session_id', 'id')
            ->whereNull(CommonConstants::DELETED_AT);
    }


    public function getCadreCityIdAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        $city = (new CityRepository())->find($value);
        return $city->name ?? null;
    }

    public function getCadreGenderAttribute($value)
    {
        return match ($value) {
            MALE    => GENDER[MALE],
            FEMALE  => GENDER[FEMALE],
            default => null
        };
    }

    public function getMedicalExaminationDayAttribute($value): string
    {
        return $value
            ? CommonHelper::formatDate(
                (string)$value,
                YEAR_MONTH_DAY_HIS,
                DAY_MONTH_YEAR,
            )
            : '';
    }

    public function getReExaminationDateAttribute($value): string
    {
        return $value
            ? CommonHelper::formatDate(
                (string)$value,
                YEAR_MONTH_DAY,
                DAY_MONTH_YEAR,
            )
            : '';
    }


    /**
     * get prescription of medical session
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function scopeCompletedSession($query)
    {
        return $query->where('medical_sessions_tbl.status', OPERATOR_EQUAL, MedicalSessionConstants::STATUS_DONE);
    }
    public function getDSOfMedicalSession()
    {
        return $this->hasMany(DesignatedServiceOfMedicalSession::class, 'medical_session_id', 'id');
    }

    public function getDiseaseOfMedicalSession()
    {
        return $this->hasMany(DiseaseOfMedicalSession::class, 'medical_session_id', 'id');
    }

    public function medicalSessionRoom()
    {
        return $this->hasMany(MedicalSessionRoom::class, 'medical_session_id', 'id');
    }

   public function scopeTimeInYear($query, $type = true)
   {
        if ($type) {
            $query->whereMonth('medical_examination_day', Carbon::now()->month);
        } else {
            $query->whereMonth('medical_examination_day', Carbon::now()->subMonth()->month);
        }
        $query->whereYear('medical_examination_day', Carbon::now()->year);
        return $query;
   }

   /**
     * Get department of medical session
     *
     * @return BelongsTo
     */
   public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department', 'id');
    }

    public function getDepartmentApi($id)
    {
        return Department::withTrashed()->where('id', $id)->get();
    }

    public function getStatusAttributeApi($value)
    {
        switch ($value) {
                case MedicalSessionConstants::STATUS_WAITING:
                    $attributeStatus = MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_WAITING];
                    break;
                case MedicalSessionConstants::STATUS_DOING:
                    $attributeStatus = MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_DOING];
                    break;
                case MedicalSessionConstants::STATUS_WAITING_RESULT:
                    $attributeStatus = MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_WAITING_RESULT];
                    break;
                case MedicalSessionConstants::STATUS_DONE:
                    $attributeStatus = MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_DONE];
                    break;
                case MedicalSessionConstants::STATUS_CANCEL:
                    $attributeStatus = MedicalSessionConstants::STATUS_TEXT[MedicalSessionConstants::STATUS_CANCEL];
                    break;
                default:
                    $attributeStatus = null;
            };
        return $attributeStatus;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'cadre_city_id', 'id');
    }
}
