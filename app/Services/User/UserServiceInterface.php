<?php

namespace App\Services\User;

use Illuminate\Database\Eloquent\Model;

interface UserServiceInterface
{
    /**
     * Dashboard of Admin
     *
     * @param array $params
     * @return array
     */
    public function list(array $params): array;

    /**
     * Display information of login user
     *
     * @return ?Model
     */
    public function view(): ?Model;

    /**
     * Register user
     *
     * @param $param
     * @return ?Model
     */
    public function store($param): ?Model;

    /**
     * Update user
     *
     * @param $param
     * @param $id
     * @param $role
     * @return ?Model
     */
    public function update($param, $id, $role): ?Model;

    /**
     * User detail
     *
     * @param $id
     * @return ?Model
     */
    public function edit($id): ?Model;

    /**
     * Delete user
     *
     * @param $id
     * @return int|null
     */
    public function delete($id): ?int;

    /**
     * Update profile user
     *
     * @param $param
     * @return ?Model
     */
    public function profile($param): ?Model;
}
