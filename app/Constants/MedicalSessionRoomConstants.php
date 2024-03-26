<?php

namespace App\Constants;

class MedicalSessionRoomConstants
{
    public const TABLE_NAME                = 'medical_session_room_tbl';
    public const COLUMN_ID                 = 'id';
    public const COLUMN_MEDICAL_SESSION_ID = 'medical_session_id';
    public const COLUMN_ROOM_ID            = 'room_id';
    public const COLUMN_ROOM_NAME          = 'room_name';
    public const COLUMN_USER_ID            = 'user_id';
    public const COLUMN_STATUS_ROOM        = 'status_room';
    public const COLUMN_TYPE               = 'type';
    public const COLUMN_ORDINAL            = 'ordinal';
    public const COLUMN_MEDICAL_DAY        = 'medical_day';
    public const COLUMN_EXAMINATION_ID     = 'examination_id';
    public const COLUMN_EXAMINATION_NAME   = 'examination_name';
    public const COLUMN_EXAMINATION_INSURANCE_PRICE = 'examination_insurance_price';
    public const COLUMN_EXAMINATION_SERVICE_PRICE = 'examination_service_price';

    public const STATUS_WAITING_PAY = 0;
    public const STATUS_WAITING = 1;
    public const STATUS_DOING   = 2;
    public const STATUS_DONE    = 4;
}
