<?php

namespace App\Repositories\DesignatedServiceOfMedicalSession;

use App\Models\DesignatedServiceOfMedicalSession;
use App\Repositories\BaseRepository;

class DSMedSessionRepository extends BaseRepository implements DSMedSessionRepositoryInterface
{

    /**
     * Get model.
     *
     * @return string
     */
    public function getModel(): string
    {
        return DesignatedServiceOfMedicalSession::class;
    }
}
