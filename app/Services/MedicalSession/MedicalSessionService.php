<?php

namespace App\Services\MedicalSession;

use App\Helpers\QueryHelper;
use App\Repositories\MedicalSession\MedicalSessionRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class MedicalSessionService implements MedicalSessionServiceInterface
{
    /** @var MedicalSessionRepositoryInterface */
    protected MedicalSessionRepositoryInterface $medicalSessionRepository;

    /**
     * Base construction Admin
     *
     * @param MedicalSessionRepositoryInterface $medicalSessionRepository
     */
    public function __construct(
        MedicalSessionRepositoryInterface $medicalSessionRepository,
    ) {
        $this->medicalSessionRepository = $medicalSessionRepository;
    }

    /**
     * Medical session detail
     *
     * @param $id
     * @return ?Model
     */
    public function view($id): ?Model
    {
        try {
            return $this->medicalSessionRepository->getDetail(
                [
                    'id' => QueryHelper::setQueryInput($id)
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Medical session update diagnose
     *
     * @param $params
     * @param $id
     * @return ?Model
     */
    public function update($params, $id): ?Model
    {
        try {
            $medicalSession = $this->medicalSessionRepository->getDetail(
                ['id' => QueryHelper::setQueryInput($id)],
                ['id']
            );

            return $this->medicalSessionRepository->updates($medicalSession, $params);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }
}
