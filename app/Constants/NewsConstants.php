<?php

namespace App\Constants;

class NewsConstants
{
    public const CATEGORIES_NEWS = [
        1 => 'Y học thường thức',
        2 => 'Tin tức sự kiện',
        3 => 'Hỏi đáp y khoa',
        4 => 'Khác',
    ];

    public const MAX_FILE_SIZE = 2;
    public const KBS_IN_ONE_MB = 1024;
    public const NEWS_THUMBNAILS = 'news' . DIRECTORY_SEPARATOR . 'thumbnails';

    public const COLUMN_CATEGORY = 'category';
}
