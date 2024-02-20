<?php

namespace App\Helpers;

class TextFormatHelper
{
    /**
     * show data down line from text input
     * @param $value
     * @return string
     */
    public static function textFormat($value)
    {
        return nl2br($value);
    }
}
