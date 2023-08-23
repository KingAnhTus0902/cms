<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\MedicalSessionRooms\MedicalSessionRoomRepository;

class MedicalSessionRoomService extends BaseService
{
    protected $medicalSessionRoomRepository;

    public function __construct(
        MedicalSessionRoomRepository $medicalSessionRoomRepository
    ) {
        $this->mainRepository = $medicalSessionRoomRepository;
    }
}
