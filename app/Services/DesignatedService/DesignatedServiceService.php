<?php

namespace App\Services\DesignatedService;

use App\Repositories\DesignatedService\DesignatedServiceRepositoryInterface;
use Illuminate\Support\Collection;
use Throwable;

class DesignatedServiceService implements DesignatedServiceServiceInterface
{
    /** @var DesignatedServiceRepositoryInterface */
    protected DesignatedServiceRepositoryInterface $designatedServiceRepository;

    /**
     * Constructor
     * Before
     * @param DesignatedServiceRepositoryInterface $designatedServiceRepository
     */
    public function __construct(DesignatedServiceRepositoryInterface $designatedServiceRepository)
    {
        $this->designatedServiceRepository = $designatedServiceRepository;
    }

    /**
     * Data for designated service
     *
     * @return Collection
     */
    public function index(): Collection
    {
        try {
            return $this->designatedServiceRepository->getList(
                ['id', 'name', 'room_id'],
            )->get();
        } catch (Throwable $e) {
            report($e);
        }

        return collect([]);
    }
}
