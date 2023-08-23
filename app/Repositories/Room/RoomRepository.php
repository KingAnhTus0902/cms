<?php

namespace App\Repositories\Room;

use App\Constants\CommonConstants;
use App\Models\Room;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return Room::class;
    }

    public function list(array $data, $paginate)
    {
        $query = $this->model
            ->select('rooms_mst.*', 'departments_mst.name as departments_name')
            ->leftJoin('departments_mst', function ($join) {
                $join->on('departments_mst.id', CommonConstants::OPERATOR_LIKE, 'rooms_mst.department_id')
                    ->whereNull('departments_mst.' . CommonConstants::DELETED_AT);
            });
        if (isset($data[CommonConstants::KEYWORD]) && $data[CommonConstants::KEYWORD] !== "") {
            $keyword = $data[CommonConstants::KEYWORD];
            foreach ($keyword as $key => $value) {
                if (isset($value) && $value !== "") {
                    if ($key == 'department_id') {
                        $query->where("rooms_mst.{$key}", CommonConstants::OPERATOR_EQUAL, $value);
                    }else {
                        $query->where("rooms_mst.{$key}", CommonConstants::OPERATOR_LIKE, "%{$value}%");
                    }
                }
            }
        }
        $sort = ['rooms_mst.id' => CommonConstants::ORDER_ASC];
        if (!empty($data[CommonConstants::KEY_SORT_COLUMN]) && !empty($data[CommonConstants::KEY_SORT_TYPE])) {
            if ($data[CommonConstants::KEY_SORT_COLUMN] == 'departments') {
                $sort = [
                    $data[CommonConstants::KEY_SORT_COLUMN] . '_name' => $data[CommonConstants::KEY_SORT_TYPE]
                ];
            } else {
                $sort = [
                    'rooms_mst.' . $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE]
                ];
            }
        }
        $query = $this->sort($query, $sort);

        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }
        return $query;
    }
}
