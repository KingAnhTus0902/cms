<?php

namespace App\Constants;

class MedicineConstants
{
    public const PAYMENT_PENDING = 0;
    public const PAYMENT_DONE = 1;

    public const TABLE_NAME = 'medicine_of_medical_sessions_tbl';
    public const COLUMN_MATERIAL_TYPE_ID =  'materials_type_id';
    public const COLUMN_MATERIAL_TYPE_NAME =  'materials_type_name';
    public const COLUMN_PRESCRIPTION_ID = 'prescription_id';
    public const COLUMN_INSURANCE_CODE  =   'materials_insurance_code';
    public const COLUMN_MATERIAL_CODE =   'materials_code';
    public const COLUMN_MATERIAL_NAME =   'materials_name';
    public const COLUMN_MATERIAL_AMOUNT =   'materials_amount';
    public const COLUMN_MATERIAL_UNIT =   'materials_unit';
    public const COLUMN_MATERIAL_INSURANCE_UNIT_PRICE =   'materials_insurance_unit_price';
    public const COLUMN_USE_INSURANCE =   'use_insurance';
    public const COLUMN_PAYMENT_STATUS =   'payment_status';
    public const COLUMN_ACTIVE_INGREDIENT_NAME = 'materials_active_ingredient_name';
    public const COLUMN_METHOD = 'materials_method';
    public const COLUMN_DOSAGE_FORM = 'materials_dosage_form';
    public const COLUMN_CONTENT = 'materials_content';
    public const COLUMN_STATUS =   'status';
    public const NO_INSURANCE_PAYMENT = 0;
    public const PAYMENT_INSURANCE =1;

    public const STATUS_WAITING_DISPENSED = 1;
    public const STATUS_DISPENSED = 2;
    public const STATUS_CANCEL = 3;


    public const PAYMENT_STATUS = [
        self::STATUS_PAYMENT_PENDING => 'Chưa thanh toán',
        self::STAUS_PAYMENT_DONE => 'Đã thanh toán',
    ];
    public const USE_INSURANCE = [
        self::STATUS_NO_INSURANCE_PAYMENT => 'Không thanh toán',
        self::STATUS_PAYMENT_INSURANCE => 'Thanh toán BH',
    ];

    public const MEDICINE_STATUS = [
        self::STATUS_WAITING_DISPENSED => 'Chờ phát thuốc',
        self::STATUS_DISPENSED => 'Đã phát thuốc',
        self::STATUS_CANCEL => 'Hủy phát thuốc',
    ];

}
