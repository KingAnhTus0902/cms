<?php

namespace App\Constants;

class DesignatedServiceConstants
{
    public const TABLE_NAME                = 'designated_service_of_medical_sessions_tbl';
    public const DESIGNATED_SERVICE_INSURANCE_UNIT_PRICE = "designated_insurance_unit_price";
    public const COLUMN_MEDICAL_SESSION_ID = "medical_session_id";
    public const USE_INSURANCE = 1;
    public const NOT_USE_INSURANCE = 0;

    public const TYPE_TEST = 1;
    public const TYPE_IMAGE_ANALYSATION = 2;
    public const TYPE_FUNCTION_EXPLORATION = 3;
    public const TYPE_PROCEDURE_SURGERY = 4;
    public const TYPE_SURGERY = [
        self::TYPE_TEST => 'Xét nghiệm',
        self::TYPE_IMAGE_ANALYSATION => 'Chẩn đoán hình ảnh',
        self::TYPE_FUNCTION_EXPLORATION => 'Thăm dò chức năng',
        self::TYPE_PROCEDURE_SURGERY => 'Thủ thuật, phẫu thuật'
    ];
    public const ENDOSCOPY_AND_ENDOSCOPIC_SERVICES = 1;
    public const BIOCHEMISTRY = 2;
    public const HEMATOLOGY = 3;
    public const DENTOMAXILLOFACIAL = 4;
    public const ULTRASOUND = 5;
    public const OTORHINOLARYNGOLOGY = 6;
    public const FUNCTIONAL_EXPLORATION = 7;
    public const MICROBIOLOGY = 8;
    public const ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION = 9;
    public const SPECIALIST = [
        self::ENDOSCOPY_AND_ENDOSCOPIC_SERVICES => 'Các thủ thuật và dịch vụ nội soi',
        self::BIOCHEMISTRY => 'Hóa sinh',
        self::HEMATOLOGY => 'Huyết học',
        self::DENTOMAXILLOFACIAL => 'Răng Hàm Mặt',
        self::ULTRASOUND => 'Siêu âm',
        self::OTORHINOLARYNGOLOGY => 'Tai Mũi Họng',
        self::FUNCTIONAL_EXPLORATION => 'Thăm dò chức năng',
        self::MICROBIOLOGY => 'Vi sinh',
        self::ETHNIC_MEDICINE_AND_FUNCTIONAL_REHABILITATION => 'Y học dân tộc và phục hồi chức năng',
    ];
}
