<?php

namespace App\Repositories\Hospital;

use App\Constants\CommonConstants;
use App\Models\Hospital;
use App\Repositories\BaseRepository;

class HospitalRepository extends BaseRepository implements HospitalRepositoryInterface
{
    protected $model;
    public function getModel()
    {
        return Hospital::class;
    }
    /**
     * @param $areaIds
     * @return mixed
     */
    public function list(array $data, $paginate, $select)
    {
        $query = $this->model
            ->with(['city', 'organization'])
            ->select($select);
        if (isset($data['keyword'])) {

            if (isset($data['keyword']['city_id'])) {

                $city = $data['keyword']['city_id'];
                $query->where('city_id', CommonConstants::OPERATOR_EQUAL, $city);
            }

            if (isset($data['keyword']['name'])) {
                $name = $data['keyword']['name'];
                $query->where('name', CommonConstants::OPERATOR_LIKE, '%' . $name . '%');
            }
        }

        if (!empty($data[CommonConstants::KEY_SORT_COLUMN]) && !empty($data[CommonConstants::KEY_SORT_TYPE])) {
            $sort = [
                $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE]
            ];
            $query = $this->sort($query, $sort);
        }

        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }
        return $query;
    }

    /**
     * @param mixed $keyword
     *
     * @return mixed
     */
    public function getHospitalSuggest($keyword)
    {
        $query = $this->model->select('id', 'name');
        if (!empty($keyword)) {
            return $query->where('code', CommonConstants::OPERATOR_EQUAL, $keyword)->first();
        }
        return null;
    }

    /**
     * Get mst hospital .
     *
     * @return Model
     */
    public function getMstHospital()
    {
        return $this->model->select('hospitals_mst.id', 'hospitals_mst.city_id')
            ->join("settings_mst", function ($join) {
                $join->on("settings_mst.hospital_id", "=", "hospitals_mst.id");
            })->firstOrFail();
    }
}
