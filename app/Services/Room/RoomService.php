<?php

namespace App\Services\Room;

use App\Helpers\QueryHelper;
use App\Helpers\RoleHelper;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\UserRoom\UserRoomRepository;
use Illuminate\Support\Collection;
use Throwable;

class RoomService implements RoomServiceInterface
{
    /** @var RoomRepositoryInterface */
    protected RoomRepositoryInterface $roomRepository;

    /** @var UserRoomRepository */
    protected UserRoomRepository $userRoomRepository;

    /**
     * Base construction Admin
     *
     * @param RoomRepositoryInterface $roomRepository
     * @param UserRoomRepository $userRoomRepository
     */
    public function __construct(RoomRepositoryInterface $roomRepository, UserRoomRepository $userRoomRepository)
    {
        $this->roomRepository = $roomRepository;
        $this->userRoomRepository = $userRoomRepository;
    }

    /**
     * Data for room homepage
     *
     * @return Collection
     */
    public function index(): Collection
    {
        try {
            $roomId = $this->userRoomRepository->getList(
                ['id', 'room_id'],
                [
                    'user_id' => QueryHelper::setQueryInput(auth()->user()->id)
                ]
            )->pluck('room_id')->toArray();

            return $this->roomRepository->getList(
                ['id', 'name'],
                (RoleHelper::getName() == ADMIN) ? [] : [
                    'id' => QueryHelper::setQueryInput($roomId, KEY_WHERE_IN)
                ]
            )->get();
        } catch (Throwable $e) {
            report($e);
        }

        return collect([]);
    }
}
