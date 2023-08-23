<?php

// Magic number
const MAGIC_NUMBER = 81;

// Type system
const WEB = 1;
const MOBILE = 2;

// Optional
const INPUT_PAGE = 'page';
const INPUT_PAGE_SIZE = 'page_size';
const DEFAULT_LIMIT_PAGE = 10;
const UNLIMITED_PAGE = 9999;
const PAGE_DEFAULT = 1;

// Query constant
const SELECT_ALL = ['*'];
const ORDER_ASC = 'asc';
const ORDER_DESC = 'desc';

// Operator
const OPERATOR_LIKE = 'like';
const OPERATOR_EQUAL = '=';
const OPERATOR_NOT_EQUAL = '!=';

// Field
const ID = 'id';
const CREATED_AT = 'created_at';
const UPDATED_AT = 'updated_at';

// Regex
const REGEX_CREDENTIAL_VALIDATION = '/^[a-zA-Z0-9\s!\'"#$%&(){}*+,-.:;<=>?@^_`~[^|\\][^\\/\\][^\\\\\]]+$/';
const REGEX_PHONE = '/(84|0[3|5|7|8|9])+([0-9]{8})/';
const REGEX_DATE_BETWEEN = '/^\d{2}\/\d{2}\/\d{4}\s-\s\d{2}\/\d{2}\/\d{4}$/';

// Status
const DEACTIVE = 0;
const ACTIVE = 1;

// Role
const ADMIN = 'Giam-doc';
const EXAMINATION_DOCTOR = 'Bac-sy-kham';
const REFERRING_DOCTOR = 'Bac-sy-chi-dinh';
const RECEPTIONIST = 'Don-tiep';
const PHARMACIST = 'Duoc-sy';
const UNKNOWN_ROLE = 'N';
const CONVERT_ADMIN_VN = 'Giám đốc';
const CONVERT_EXAMINATION_DOCTOR_VN = 'Bác sỹ khám';
const CONVERT_REFERRING_DOCTOR_VN = 'Bác sỹ chỉ định';
const CONVERT_RECEPTIONIST_VN = 'Đón tiếp';
const CONVERT_PHARMACIST_VN = 'Dược sỹ';

// Key condition
const KEYWORD = 'keyword';
const KEY_LIMIT = 'limit';
const KEY_JOIN = 'join';
const KEY_LEFT_JOIN = 'left';
const KEY_INNER_JOIN = 'inner';
const KEY_TABLE = 'table_name';
const KEY_FOREIGN_KEY = 'foreign_key';
const KEY_PRIMARY_KEY = 'primary_key';
const KEY_SORT = 'sort';
const KEY_PAGINATE = 'paginates';
const KEY_RELATE = 'relate';
const KEY_FILTER = 'filter';
const KEY_RELATIONSHIP_NAME = 'relationship_name';
const KEY_RELATIONSHIP_SELECT = 'relationship_select';
const KEY_OPERATOR = 'operator';
const KEY_OR_WHERE_IN = 'or_where_in';
const KEY_VALUE = 'value';
const KEY_COLUMN = 'column';
const KEY_TYPE_JOIN = 'type';
const KEY_OR_WHERE_NOT_IN = 'or_where_not_in';
const KEY_OR_WHERE_BETWEEN = 'or_where_between';
const KEY_OR_WHERE_NOT_BETWEEN = 'or_where_not_between';
const KEY_OR_WHERE_NULL = 'or_where_null';
const KEY_OR_WHERE_NOT_NULL = 'or_where_not_null';
const KEY_OR_WHERE = 'or_where';
const KEY_WHERE_IN = 'where_in';
const KEY_WHERE_NOT_IN = 'where_not_in';
const KEY_WHERE_BETWEEN = 'where_between';
const KEY_WHERE_NOT_BETWEEN = 'where_not_between';
const KEY_WHERE_NULL = 'where_null';
const KEY_WHERE_NOT_NULL = 'where_not_null';
const KEY_WHERE_DATE = 'where_date';
const KEY_WHERE_HAS = 'where_has';
const KEY_WHERE_IN_VALUE_AND_NULL = 'where_in_column_or_null';
const KEY_WHERE_IN_VALUE_AND_NOT_NULL = 'where_in_column_and_not_null';
const KEY_LIKE_OR_WHERE = 'where_like_or_where';
const KEY_WHERE_HAS_LIKE = 'where_has_like';
const KEY_LIKE_WHERE = 'where_like';
const KEY_WHERE_HAS_BETWEEN = 'where_has_like_between';

// Api
const CREATE = 'create';
const UPDATE = 'update';
const DESTROY = 'delete';

//Gender
const MALE = 0;
const FEMALE = 1;
const GENDER = [
    MALE   => 'Nam',
    FEMALE => 'Nữ'
];

// Format time
const DAY_MONTH_YEAR = 'd/m/Y';
const YEAR_MONTH_DAY = 'Y-m-d';
const YEAR_MONTH_DAY_HIS = 'Y-m-d H:i:s';
const FIVE_YEAR = 5;
const YEAR = 'Y';

const ZERO_PRICE = 0;
const BENEFIT_RATE = 100;
const BASE_SALARY = 500000;
const FULL_PERCENT = 100;
const FIFTEEN_PERCENT = 15;
const FIFTEEN_CHAR = 15;

// Regex
const REGEX_NUMBER = '/^[0-9]+$/';
const REGEX_NUMBER_INSURANCE_CADR = '/^[a-zA-Z0-9\+]+$/';
const REGEX_PATH_FILE_MEDICAL_TEST = '/storage\/medical_test\\\([^"]+\.(?:jpg|jpeg|png|gif))/i';
const REGEX_DELETE_FILE_MEDICAL_TEST = '/medical_test\\\([^"]+\.(?:jpg|jpeg|png|gif))/i';
const REGEX_DELETE_FILE_USER = '/users\\\([^"]+\.(?:jpg|jpeg|png|gif))/i';
const REGEX_DELETE_FILE_SETTING = '/settings\\\([^"]+\.(?:jpg|jpeg|png|gif))/i';

//Type save
const SAVE_REAL = 'Lưu';
const SAVE_DRAFT = 'Lưu nháp';

const FIRST_TWO_RECORDS = 2;
// HeaLth insurance card code
const HEALTH_INSURANCE_CARD_CODE = [
    1,2,3,4,5
];

const FIRST_KEY = 0;
const SECOND_KEY = 1;

const DOTS = "...";
const DAY_MONTH_YEAR_DOTS = ".../.../......";
// Limit request for ajax
const LIMIT_REQUEST_API = 120;
