<?php

namespace App\Services\DesignatedServiceOfMedicalSession;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface DSMedSessionServiceInterface
{
    /**
     * List of designated service of medical session
     *
     * @param $params
     * @param $id
     * @return array
     */
    public function list($params, $id): array;

    /**
     * Register designated service of medical session
     *
     * @param $param
     * @param $id
     * @return ?Model
     */
    public function store($param, $id): ?Model;

    /**
     * Detail designated service of medical session
     *
     * @param $id
     * @return ?Model
     */
    public function edit($id): ?Model;

    /**
     * Update designated service of medical session
     *
     * @param $param
     * @param $id
     * @return ?Model
     */
    public function update($param, $id): ?Model;

    /**
     * Delete designated service of medical session
     *
     * @param $id
     * @return int|null
     */
    public function delete($id): ?int;

    /**
     * Get designated service medical session for medical test
     *
     * @param $id
     * @return ?Model
     */
    public function view($id): ?Model;

    /**
     * Upload file and return URL of file
     *
     * @param $params
     * @param $id
     * @return mixed
     */
    public function upload($params, $id): mixed;
}
