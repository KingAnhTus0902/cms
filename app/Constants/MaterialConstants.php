<?php

namespace App\Constants;

class MaterialConstants
{
    public const USE_INSURANCE = 1;
    public const NOT_USE_INSURANCE = 0;
    public const TYPE_MATERIAL = 1;
    public const TYPE_MEDICINE = 2;

    public const METHOD_DRINK = '1.01';
    public const METHOD_INJECT = '2.10';
    public const METHOD_EYE_DROPS = '6.01';
    public const METHOD_EXTERNAL_USE = '3.05';
    public const METHOD_VAGINAL_PLACEMENT = '4.01';
    public const METHOD_INFUSION = '2.15';
    public const METHOD_SMALL_NOSE = '5.10';
    public const METHOD_SPRAY = '5.04';
    public const METHOD_PASTE_ON_THE_SKIN = '3.03';
    public const METHOD_CHECK_EYES = '6.02';
    public const METHOD_PUT_ANAL = '4.02';
    public const METHOD = [
        self::METHOD_DRINK => 'Uống',
        self::METHOD_INJECT => 'Tiêm',
        self::METHOD_EYE_DROPS => 'Nhỏ mắt',
        self::METHOD_EXTERNAL_USE => 'Dùng ngoài',
        self::METHOD_VAGINAL_PLACEMENT => 'Đặt âm đạo',
        self::METHOD_INFUSION => 'Tiêm truyền',
        self::METHOD_SMALL_NOSE => 'Nhỏ mũi',
        self::METHOD_SPRAY => 'Xịt',
        self::METHOD_PASTE_ON_THE_SKIN => 'Dán trên da',
        self::METHOD_CHECK_EYES => 'Tra mắt',
        self::METHOD_PUT_ANAL => 'Đặt hậu môn',
    ];


    public const TABLE_NAME = 'materials_tbl';
    public const COLUMN_ID       = 'id';
    public const COLUMN_CODE       = 'code'; //Mã vật tư
    public const COLUMN_NAME       = 'name'; //Tên vật tư, Tên thuốc
    public const COLUMN_ACTIVE_INGREDIENT_NAME = 'active_ingredient_name'; //Tên hoạt chất
    public const COLUMN_DOSAGE_FORM       = 'dosage_form'; //Dạng bào chế
    public const COLUMN_CONTENT       = 'content'; //Hàm lượng
    public const COLUMN_UNIT_ID       = 'unit_id'; //Đơn vị tính
    public const COLUMN_SERVICE_UNIT_PRICE       = 'service_unit_price'; //Đơn giá
    public const COLUMN_CREATED_AT  = "created_at";
    public const TYPE = [
        self::TYPE_MATERIAL => 'Vật tư',
        self::TYPE_MEDICINE => 'Thuốc',
    ];
    public const COLUMN_METHOD  = "method"; // Đường dùng
    public const COLUMN_INSURANCE_CODE  = "insurance_code";
    public const COLUMN_MATERIAL_TYPE_ID  = "material_type_id";
}
