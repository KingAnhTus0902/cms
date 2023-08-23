<?php

namespace App\Repositories\MedicalSession;

use App\Repositories\BaseRepositoryInterface;

interface MedicalSessionRepositoryInterface extends BaseRepositoryInterface
{
    public function getlistByIdForeignKey($column, $id);

    public function findTrashed($id);
}
