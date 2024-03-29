<?php

namespace App\Repositories\Material;
use App\Constants\CommonConstants;
use App\Constants\MaterialConstants;
use App\Models\Material;
use App\Repositories\BaseRepository;

class MaterialRepository extends BaseRepository implements MaterialRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return Material::class;
    }

    /**
     * get list Material
     * @param $conditions
     * @return mixed
     */
    public function list($conditions)
    {
        $select = [
            'id',
            'code',
            'name',
            'material_type_id',
            'unit_id'
        ];
        $query = $this->model->select($select)->with('unit:id,name')->with('materialType:id,name');
        if (isset($conditions[CommonConstants::KEYWORD])) {
            $keyword = $conditions[CommonConstants::KEYWORD];
            $query->where(function ($query) use ($keyword) {
                $query->where('code', CommonConstants::OPERATOR_LIKE, '%' . $keyword . '%');
                $query->orWhere('name', CommonConstants::OPERATOR_LIKE, '%' . $keyword . '%');
            });
        }
        if (!empty($conditions['material_type'])) {
            $query->where('material_type_id', $conditions['material_type']);
        }
        if (
            !empty($conditions[CommonConstants::KEY_SORT_COLUMN]) &&
            !empty($conditions[CommonConstants::KEY_SORT_TYPE])
        ) {
            $sort = [
                $conditions[CommonConstants::KEY_SORT_COLUMN] => $conditions[CommonConstants::KEY_SORT_TYPE]
            ];
            $query = $this->sort($query, $sort);
        }
        return $this->paginate($query, $this->handlePaginate($conditions));
    }

    /**
     * searchMaterial
     *
     * @param mixed $keyword
     * @param bool $forPrescription
     *
     * @return [type]
     */
    public function searchMaterial($keyword, $forPrescription = false)
    {
        $select = CommonConstants::SELECT_ALL;
        $query = $this->model->select($select);
        if ($forPrescription) {
            $query->where('type', MaterialConstants::TYPE_MEDICINE);
        }
        if (isset($keyword)) {
            $query->where('name', CommonConstants::OPERATOR_LIKE, '%' . $keyword . '%');
        }
        return $query->get();
    }
}
