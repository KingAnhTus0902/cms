<?php

namespace App\Services;

interface RoomServiceInterface
{
    public function list($data, $paginate = false);

    /**
     * Render room by department
     *
     * @param $params
     * @return mixed
     */
    public function loadRoomByDepartment($params): mixed;
}
