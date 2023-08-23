<?php

namespace App\Repositories\Cadres;

use App\Constants\CommonConstants;
use App\Models\Cadres;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Cadres\CadresRepositoryInterface;
use App\Constants\CadresConstants;

class CadresRepository extends BaseRepository implements CadresRepositoryInterface
{
    /**
     * @var model
     */
    protected $model;

    /**
     * @return void
     */
    public function getModel()
    {
        return Cadres::class;
    }

    /**
     * @param array $data
     * @param [type] $paginate
     * @param [type] $select
     * @return void
     */
    public function list(array $data, $paginate, $select)
    {
        $query = $this->model->select($select);
        if (isset($data[CadresConstants::COLUMN_CODE])) {
            $code = $data[CadresConstants::COLUMN_CODE];
            $query->where(function ($query) use ($code) {
                $query->orWhere(CadresConstants::COLUMN_CODE, CommonConstants::OPERATOR_LIKE, '%' . $code . '%');
            });
        }

        if (isset($data[CadresConstants::COLUMN_PHONE])) {
            $phone = $data[CadresConstants::COLUMN_PHONE];
            $query->where(function ($query) use ($phone) {
                $query->orWhere(CadresConstants::COLUMN_PHONE, CommonConstants::OPERATOR_LIKE, '%' . $phone . '%');
            });
        }

        if (isset($data[CadresConstants::COLUMN_NAME])) {
            $name = $data[CadresConstants::COLUMN_NAME];
            $query->where(function ($query) use ($name) {
                $query->orWhere(CadresConstants::COLUMN_NAME, CommonConstants::OPERATOR_LIKE, '%' . $name . '%');
            });
        }

        if (isset($data[CadresConstants::COLUMN_IDENTITY_CARD_NUMBER])) {
            $identityCardNumber = $data[CadresConstants::COLUMN_IDENTITY_CARD_NUMBER];
            $query->where(function ($query) use ($identityCardNumber) {
                $query->orWhere(
                    'identity_card_number',
                    CommonConstants::OPERATOR_LIKE,
                    '%' . $identityCardNumber . '%'
                );
            });
        }

        if (isset($data[CadresConstants::COLUMN_MEDICAL_INSURANCE_NUMBER])) {
            $medicalInsuranceNumber = $data[CadresConstants::COLUMN_MEDICAL_INSURANCE_NUMBER];
            $query->where(function ($query) use ($medicalInsuranceNumber) {
                $query->orWhere(
                    'medical_insurance_number',
                    CommonConstants::OPERATOR_LIKE,
                    '%' . $medicalInsuranceNumber . '%'
                );
            });
        }

        if (!empty($data[CommonConstants::KEY_SORT_COLUMN]) && !empty($data[CommonConstants::KEY_SORT_TYPE])) {
            $sort = [
                $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE]
            ];
            $query = $this->sort($query, $sort);
        }

        if ($paginate) {
            $page[CommonConstants::INPUT_PAGE_SIZE] = CommonConstants::DEFAULT_LIMIT_PAGE;
            $page[CommonConstants::INPUT_PAGE] = CommonConstants::PAGE_DEFAULT;
            if (!empty($data[CommonConstants::KEY_LIMIT])) {
                $page[CommonConstants::INPUT_PAGE_SIZE] = $data[CommonConstants::KEY_LIMIT];
            }
            if (isset($data[CommonConstants::INPUT_PAGE])) {
                $pageNumber = (int)$data[CommonConstants::INPUT_PAGE];
                $page[CommonConstants::INPUT_PAGE] = $pageNumber;
            }
            $query = $this->paginate($query, $page);
        }
        return $query;
    }
}
