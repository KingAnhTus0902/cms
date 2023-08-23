<?php

namespace App\Constants;

class HospitalTransferConstant
{
    public const REASON_1 = 1;
    public const REASON_2 = 2;

    public const REASON_TEXT = [
        self::REASON_1 => "1. Đủ điều kiện chuyển tuyến (tình trạng vượt quá khả năng chuyên môn của cơ sở)",
        self::REASON_2 => "2. Theo yêu cầu của người bệnh hoặc người đại diện hợp pháp của người bệnh.",
    ];

    public const HOSPITAL_NAME = 'Phòng khám đa khoa các cơ quan đảng ở Trung ương';
    public const HOSPITAL_NAME_DISPLAY = "Phòng khám đa khoa\ncác cơ quan đảng ở Trung ương";
}
