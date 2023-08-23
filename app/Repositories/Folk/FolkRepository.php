<?php

namespace App\Repositories\Folk;

use App\Constants\CommonConstants;
use App\Models\Folk;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Folk\FolkRepositoryInterface;

class FolkRepository extends BaseRepository implements FolkRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return Folk::class;
    }
}
