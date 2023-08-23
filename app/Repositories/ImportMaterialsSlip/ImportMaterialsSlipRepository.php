<?php

namespace App\Repositories\ImportMaterialsSlip;

use App\Constants\CommonConstants;
use App\Constants\ImportMaterialsSlipConstants;
use App\Models\ImportMaterialsSlip;
use App\Repositories\BaseRepository;

class ImportMaterialsSlipRepository extends BaseRepository implements ImportMaterialsSlipRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return ImportMaterialsSlip::class;
    }

    public function list(array $data, $paginate, $select = CommonConstants::SELECT_ALL)
    {
        $query = $this->select($select);

        if (isset($data[CommonConstants::KEYWORD])) {
            $keyword = $data[CommonConstants::KEYWORD];
            foreach ($keyword as $key => $value) {
                if (isset($value) && $value !== "") {
                    if ($key == 'user_name') {
                        $query->whereHas('user', function ($q) use ($value) {
                            $q->where('users.name', CommonConstants::OPERATOR_LIKE, "%{$value}%");
                        });
                    } else {
                        $query->where($key, CommonConstants::OPERATOR_LIKE, "%{$value}%");
                    }
                }
            }
        }

        if (!empty($data[CommonConstants::KEY_SORT_COLUMN]) && !empty($data[CommonConstants::KEY_SORT_TYPE])) {
            $sort = [
                $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE]
            ];
        } else {
            $sort = [
                ImportMaterialsSlipConstants::COLUMN_ID => ORDER_DESC
            ];
        }
        $query = $this->sort($query, $sort);

        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }
        return $query;
    }

    public function findLastImportMaterialInDay($day)
    {
        return $this->model->where(ImportMaterialsSlipConstants::COLUMN_IMPORT_DAY, $day)
            ->orderBy('code', 'desc')
            ->first();
    }

}
