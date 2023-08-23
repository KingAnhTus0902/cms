<?php

namespace App\Services\Disease;

use Illuminate\Database\Eloquent\Model;

interface DiseaseServiceInterface
{
    /**
     * Dashboard of Admin
     *
     * @param array $params
     * @return array
     */
    public function list(array $params): array;

    /**
     * Register disease
     *
     * @param $param
     * @return ?Model
     */
    public function store($param): ?Model;

    /**
     * Update disease
     *
     * @param $param
     * @param $id
     * @return ?Model
     */
    public function update($param, $id): ?Model;

    /**
     * Disease detail
     *
     * @param $id
     * @return ?Model
     */
    public function edit($id): ?Model;

    /**
     * Delete disease
     *
     * @param $id
     * @return int|null
     */
    public function delete($id): ?int;
}
