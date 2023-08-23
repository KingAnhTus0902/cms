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

    public static function medicalInsuranceNumber($value = [])
    {
        $data = [null, null, null, null];
        if (!empty($value) && strlen($value) == FIFTEEN_CHAR){
            $data = [
                '0' => strtoupper(substr($value, 0, 2)),
                '1' => $value['2'],
                '2' => substr($value, 3, 2),
                '3' => substr($value, 5),
            ];
        }
        return $data;
    }
}
