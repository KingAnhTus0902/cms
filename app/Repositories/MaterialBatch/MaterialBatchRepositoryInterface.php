<?php

namespace App\Repositories\MaterialBatch;

use App\Repositories\BaseRepositoryInterface;

interface MaterialBatchRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get list Material Batch for detail material
     *
     * @param int $id
     * @return Collection
     */
    public function listForDetailMaterial($id);
}
