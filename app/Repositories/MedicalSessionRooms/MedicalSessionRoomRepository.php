<?php

namespace App\Repositories\MedicalSessionRooms;


use App\Models\MedicalSessionRoom;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class MedicalSessionRoomRepository extends BaseRepository implements MedicalSessionRoomRepositoryInterface
{
   /**
    * Undocumented function
    *
    * @return Model|string
    */
    public function getModel(): Model|string
    {
        return MedicalSessionRoom::class;
    }
}
