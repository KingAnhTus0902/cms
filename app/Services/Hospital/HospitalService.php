<?php

namespace App\Services\Hospital;

use App\Repositories\Hospital\HospitalRepositoryInterface;
use Illuminate\Support\Collection;
use Throwable;

class HospitalService implements HospitalServiceInterface
{
    /** @var HospitalRepositoryInterface */
    protected HospitalRepositoryInterface $hospitalRepository;

    /**
     * Constructor
     *
     * @param HospitalRepositoryInterface $hospitalRepository
     */
    public function __construct(HospitalRepositoryInterface $hospitalRepository)
    {
        $this->hospitalRepository = $hospitalRepository;
    }

    /**
     * Data for hospital
     *
     * @return Collection
     */
    public function index(): Collection
    {
        try {
            return $this->hospitalRepository->getList(['id', 'name'])->get();
        } catch (Throwable $e) {
            report($e);
        }

        return collect([]);
    }
}
