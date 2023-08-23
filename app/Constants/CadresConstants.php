<?php

namespace App\Constants;

class CadresConstants
{
    public const TABLE_NAME = 'cadres_tbl';

    public const GENDER_MALE    = 0;
    public const GENDER_FEMALE  = 1;

    public const COLUMN_ID          = 'id';
    public const COLUMN_CODE        = 'code';
    public const COLUMN_NAME        = 'name';
    public const COLUMN_EMAIL       = 'email';
    public const COLUMN_PASSWORD    = 'password';
    public const COLUMN_BIRTHDAY    = 'birthday';
    public const COLUMN_GENDER      = 'gender';
    public const COLUMN_FOLK_ID     = 'folk_id';
    public const COLUMN_CITY_ID     = 'city_id';
    public const COLUMN_DISTRICT_ID = 'district_id';
    public const COLUMN_PHONE       = 'phone';
    public const COLUMN_ADDRESS     = 'address';
    public const COLUMN_IDENTITY_CARD_NUMBER        = 'identity_card_number';
    public const COLUMN_MEDICAL_INSURANCE_NUMBER    = 'medical_insurance_number';

    public const LIVE_CODE_K1 = 'K1';
    public const LIVE_CODE_K2 = 'K2';
    public const LIVE_CODE_K3 = 'K3';
    public const MALE = 0;
    public const FEMALE = 1;
    public const GENDER_TEXT = [
        self::MALE => "Nam",
        self::FEMALE => "Nữ",
    ];

    public const IS_LONG_DATE_ZERO = 0;
    public const IS_LONG_DATE_ONE  = 1;
}
