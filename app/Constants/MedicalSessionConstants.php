<?php

namespace App\Constants;

class MedicalSessionConstants
{
    public const TABLE_NAME = 'medical_sessions_tbl';

    public const COLUMN_ID       = 'id';
    public const COLUMN_CODE     = 'code';
    public const COLUMN_CADRE_ID = 'cadre_id';
    public const COLUMN_MEDICAL_EXAMINATION_DAY = 'medical_examination_day';
    public const COLUMN_PAYMENT_STATUS = 'payment_status';
    public const COLUMN_STATUS = 'status';
    public const COLUMN_DEPARTMENT_ID = 'department_id';
    public const COLUMN_DEPARTMENT_NAME = 'department_name';
    public const COLUMN_REASON_FOR_EXAMINATION = 'reason_for_examination';

    public const COLUMN_DIAGNOSE = 'diagnose';
    public const COLUMN_CONCLUDE = 'conclude';
    public const COLUMN_CADRE_NAME = 'cadre_name';
    public const COLUMN_CADRE_ADDRESS = 'cadre_address';
    public const COLUMN_CADRE_GENDER = 'cadre_gender';
    public const COLUMN_CADRE_FOLK_ID = 'cadre_folk_id';
    public const COLUMN_CADRE_BIRTHDAY = 'cadre_birthday';

    public const COLUMN_CADRE_MEDICAL_INSURANCE_NUMBER = 'cadre_medical_insurance_number';

    public const COLUMN_CADRE_PHONE = 'cadre_phone';

    public const STATUS_WAITING = 1;
    public const STATUS_DOING   = 2;
    public const STATUS_WAITING_RESULT    = 3;
    public const STATUS_DONE    = 4;
    public const STATUS_CANCEL  = 5;

    public const STATUS_TEXT = [
        self::STATUS_WAITING => "Đang chờ khám",
        self::STATUS_DOING => "Đang khám",
        self::STATUS_WAITING_RESULT => "Chờ kết quả",
        self::STATUS_DONE => "Hoàn tất",
        self::STATUS_CANCEL => "Hủy Khám"
    ];

    public const UNPAID_STATUS = 0;
    public const PAID_STATUS = 1;
    public const CANCEL_STATUS = 2;
    public const ALL_PAYMENT_STATUS = 3;
    public const PAYMENT_STATUS_TEXT = [
        self::UNPAID_STATUS => "Chưa thanh toán",
        self::PAID_STATUS => "Đã thanh toán",
        self::CANCEL_STATUS => "Hủy thanh toán",
    ];

    public const RIGHT_TREATMENT_LINE = 1;
    public const OPPOSITE_TREATMENT_LINE = 2;
    public const ON_TREATMENT_LINE = 3;
    public const TREATMENT_LINE = [
        self::RIGHT_TREATMENT_LINE => 'Đúng tuyến',
        self::OPPOSITE_TREATMENT_LINE => 'Trái tuyến',
        self::ON_TREATMENT_LINE => 'Thông tuyến',
    ];

    public const USE_INSURANCE = 1;
    public const NOT_INSURANCE = 0;
    public const EMERGENCY = 1;
    public const NORMAL = 0;

    public const MAIN_DISEASE = 0;
    public const SUB_DISEASE = 1;

    public const NO_USE_MEDICAL_INSURANCE  = '0';
    public const USE_MEDICAL_INSURANCE  = '1';
    public const COLUMN_TREATMENT_LINE = 'treatment_line';
    public const COLUMN_HOSPITAL_ID = 'hospital_id';
    public const COLUMN_USER_ID = 'user_id';

    public const ORIGINAL_PROVINCE_HOSPITAL_LINE = 1;
    public const INNER_PROVINCE_TO_HOSPITAL_LINE = 2;
    public const OUT_OF_PROVINCE_TO_HOSPITAL_LINE = 3;

    public const HOSPITAL_LINE_TEXT = [
        self::ORIGINAL_PROVINCE_HOSPITAL_LINE => 'A',
        self::INNER_PROVINCE_TO_HOSPITAL_LINE => 'B',
        self::OUT_OF_PROVINCE_TO_HOSPITAL_LINE => 'C',
    ];
}
