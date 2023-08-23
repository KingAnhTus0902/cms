<?php

namespace App\Constants;

class RulesContants
{
    public const RULES_PHONE = 'bail|nullable|numeric|min_digits:10|max_digits:11|regex:' . REGEX_NUMBER;

}
