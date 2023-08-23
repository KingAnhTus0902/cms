<?php

namespace App\Repositories\ExaminationType;

use App\Models\ExaminationType;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ExaminationTypeRepository extends BaseRepository implements ExaminationTypeRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return ExaminationType::class;
    }
}
