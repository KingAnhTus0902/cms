<?php

namespace App\Repositories\MedicineMedicalSessionBatch;

use App\Models\MedicineMedicalSessionBatch;
use App\Repositories\BaseRepository;

class MedicineMedicalSessionBatchRepository extends BaseRepository implements MedicineMedicalSessionBatchRepositoryInterface
{
    public function getModel()
    {
        return MedicineMedicalSessionBatch::class;
    }
}
