<?php

namespace App\Services\Permission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PermissionServiceInterface
{
    /**
     * Display list of permission
     *
     * @return Collection
     */
    public function index(): Collection;

    /**
     * List of permission/role
     *
     * @param array $params
     * @return array
     */
    public function list(array $params): array;

    /**
     * Register permission/role
     *
     * @param $params
     * @return ?Model
     */
    public function store($params): ?Model;

    /**
     * Permission/role detail
     *
     * @param $id
     * @param $type
     * @return ?Model
     */
    public function edit($id, $type): ?Model;

    /**
     * Update permission/role
     *
     * @param $params
     * @param $id
     * @return ?Model
     */
    public function update($params, $id): ?Model;

    /**
     * Delete permission/role
     *
     * @param $id
     * @param $type
     * @return int|null
     */
    public function delete($id, $type): ?int;

    /**
     * Display list set for permission
     *
     * @return array
     */
    public function getPermission(): array;

    /**
     * Set permission to role
     *
     * @param $params
     * @param $id
     * @return mixed
     */
    public function setPermission($params, $id): mixed;
}
