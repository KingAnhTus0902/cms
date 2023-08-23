<?php

namespace App\Constants;

class PrescriptionConstants
{
    public const STATUS_WAITING_DISPENSED = 1;
    public const STATUS_DISPENSED = 2;
    public const STATUS_CANCEL = 3;

    public const COLUMN_ID = "id";

    public const TABLE_NAME = "prescription_of_medical_sessions_tbl";
    public const COLUMN_MEDICAL_SESSION_ID = "medical_session_id";

    public const DISPENSE_MEDICINE_STATUS = [
        self::STATUS_WAITING_DISPENSED => 'Chờ phát thuốc',
        self::STATUS_DISPENSED => 'Đã phát thuốc',
        self::STATUS_CANCEL => 'Hủy phát thuốc',
    ];

    public const COLUMN_STATUS = "status";
    public const COLUMN_CREATED_AT = "created_at";
}
