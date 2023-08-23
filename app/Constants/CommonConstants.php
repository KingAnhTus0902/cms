<?php

namespace App\Constants;

class CommonConstants
{

    const KEYWORD = 'keyword';
    const KEY_LIMIT = 'limit';
    const INPUT_PAGE = 'page';
    const INPUT_PAGE_SIZE = 'page_size';
    const DEFAULT_LIMIT_PAGE = 10;

    // Query constant
    const SELECT_ALL = ['*'];
    const ORDER_ASC = 'asc';
    const ORDER_DESC = 'desc';
    const PAGE_DEFAULT = 1;

    // Operator
    const OPERATOR_LIKE = 'like';
    const OPERATOR_EQUAL = '=';
    const OPERATOR_NOT_EQUAL = '!=';
    const OPERATOR_GREATER_THAN = '>';
    const OPERATOR_LESS_THAN = '<';
    const OPERATOR_GREATER_THAN_EQUAL = '>=';
    const OPERATOR_LESS_THAN_EQUAL = '<=';

    // common field
    const ID = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    // sort
    const KEY_SORT_COLUMN = 'sort_column';
    const KEY_SORT_TYPE = 'sort_type';
    const SORT_TYPE_DEFAULT = 'sorting_asc';

    // Validate
    const RULE_VALIDATE_PRICE = ['bail', 'nullable', 'numeric', 'digits_between:1,10', 'regex:/^[0-9]+$/'];

    //Price
    const PRICE_DEFAULT = 0;
}
