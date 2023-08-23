<?php

namespace App\Repositories\NewsCategory;

use App\Constants\CommonConstants;
use App\Models\NewsCategory;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\NewsCategory\NewsCategoryRepositoryInterface;

class NewsCategoryRepository extends BaseRepository implements NewsCategoryRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return NewsCategory::class;
    }
}
