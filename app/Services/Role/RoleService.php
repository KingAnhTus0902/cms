<?php

namespace App\Services\Role;

use App\Helpers\QueryHelper;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Support\Collection;
use Throwable;

class RoleService implements RoleServiceInterface
{
    /** @var RoleRepositoryInterface */
    protected RoleRepositoryInterface $roleRepository;

    /**
     * Base construction Admin
     *
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * List of role
     *
     * @param bool $hasAdmin
     * @return Collection
     */
    public function index(bool $hasAdmin = false): Collection
    {
        $roles = collect([]);
        $condition = [];

        if (!$hasAdmin) {
            $condition = [ 'name' => QueryHelper::setQueryInput(ADMIN, OPERATOR_NOT_EQUAL)];
        }

        try {
            $roles = $this->roleRepository->getList(
                ['id', 'name', 'default_name'],
                $condition,
                [
                    KEY_SORT => QueryHelper::setQueryOrder('order', 'ASC'),
                ]
            )
            ->get();
        } catch (Throwable $e) {
            report($e);
        }

        return $roles;
    }
}
