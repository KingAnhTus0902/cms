<?php

namespace App\Models;

use App\Constants\CommonConstants;
use App\Constants\NewsConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'news_tbl';
    protected $fillable = ['title', 'short_description', 'category', 'thumbnail', 'content'];

    public function getThumbnailStorageAttribute(): string
    {
        return $this->getRawOriginal('thumbnail') ? (NewsConstants::NEWS_THUMBNAILS
            . DIRECTORY_SEPARATOR . $this->getRawOriginal('thumbnail')) : '';
    }

    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ?
                request()->getSchemeAndHttpHost()
                . DIRECTORY_SEPARATOR
                . 'storage'
                . DIRECTORY_SEPARATOR
                . NewsConstants::NEWS_THUMBNAILS
                . DIRECTORY_SEPARATOR . $value : '',
        );
    }

    /**
     * @return BelongsTo
     */
    public function categoryNews(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category');
    }
}
