<?php

namespace App\Repositories\DiseaseOfMedicalSession;

use App\Models\DiseaseOfMedicalSession;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class DiseaseOfMedicalSessionRepository extends BaseRepository implements DiseaseOfMedicalSessionRepositoryInterface
{
    /**
     * Get model.
     *
     * @return Model|string
     */
    public function getModel(): Model|string
    {
        return DiseaseOfMedicalSession::class;
    }
}
