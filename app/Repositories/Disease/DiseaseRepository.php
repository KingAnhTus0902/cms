<?php

namespace App\Repositories\Disease;

use App\Models\Disease;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class DiseaseRepository extends BaseRepository implements DiseaseRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return Disease::class;
    }
}
