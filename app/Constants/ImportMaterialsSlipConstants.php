<?php

namespace App\Constants;

class ImportMaterialsSlipConstants
{
    public const TABLE_NAME         = 'import_materials_slips_tbl';
    public const COLUMN_ID          = 'id';
    public const COLUMN_CODE        = 'code';
    public const COLUMN_USER_IMPORT = 'user_import';
    public const COLUMN_IMPORT_DAY  = 'import_day';
    public const COLUMN_STATUS      = 'status';

    public const STATUS_DRAFT = 0;
    public const STATUS_SAVE  = 1;
    public const STATUS_TEXT = [
        self::STATUS_SAVE  => "Đã nhập kho",
        self::STATUS_DRAFT => SAVE_DRAFT
    ];

    // Max import file size (MB)
    public const MAX_IMPORT_FILE_SIZE = 10;
    public const KBS_IN_ONE_MB = 1024;
}
