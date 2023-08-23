<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return User::class;
    }

    /**
     * Get array room_id of EXAMINATION_DOCTOR.
     *
     * @return mixed
     */
    public function getExaminationDoctor(): mixed
    {
        return $this->model->role(EXAMINATION_DOCTOR)->pluck('id');
    }

    public function getDetailApi($id)
    {
        return User::withTrashed()->where('id', $id)->first();
    }
}
