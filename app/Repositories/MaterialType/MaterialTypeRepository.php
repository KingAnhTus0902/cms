<?php

namespace App\Repositories\MaterialType;

use App\Constants\CommonConstants;
use App\Models\MaterialType;
use App\Repositories\BaseRepository;

class MaterialTypeRepository extends BaseRepository implements MaterialTypeRepositoryInterface
{
    protected $model;

    /**
     * @return string
     */
    public function getModel(): string
    {
        return MaterialType::class;
    }

    /**
     * @param array $data
     * @param boolean $paginate
     * @param string $select
     *
     * @return void
     */
    public function list(array $data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $query = $this->model->select($select);

        if (isset($data[CommonConstants::KEYWORD])) {
            $keyword = $data[CommonConstants::KEYWORD];
            foreach ($keyword as $key => $value) {
                if (isset($value) && $value !== '') {
                    $query->where($key, CommonConstants::OPERATOR_LIKE, "%{$value}%");
                }
            }
        }
        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }
        return $query;
    }
}
