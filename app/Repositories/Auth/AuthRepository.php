<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Repositories\BaseRepository;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * BaseRepository constructor.
     */
    public function getModel()
    {
        return User::class;
    }
}
