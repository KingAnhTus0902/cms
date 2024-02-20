<?php

namespace App\Services;

use App\Repositories\MedicalSessionRooms\MedicalSessionRoomRepository;

class MedicalSessionRoomService extends BaseService
{
    protected $mainRepository;

    public function __construct(
        MedicalSessionRoomRepository $medicalSessionRoomRepository
    ) {
        $this->mainRepository = $medicalSessionRoomRepository;
    }
}
