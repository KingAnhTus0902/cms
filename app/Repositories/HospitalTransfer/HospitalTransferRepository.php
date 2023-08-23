<?php

namespace App\Repositories\HospitalTransfer;

use App\Constants\CommonConstants;
use App\Constants\MedicalSessionConstants;
use App\Helpers\RoleHelper;
use App\Models\HospitalTransfer;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class HospitalTransferRepository extends BaseRepository implements HospitalTransferRepositoryInterface
{

    public function getModel()
    {
        return HospitalTransfer::class;
    }
    public function list(array $data, $paginate, $select)
    {
        $query = $this->model
            ->with(['hospital','medicalSession'])
            ->select($select);
        if (!RoleHelper::getByRole([ADMIN,RECEPTIONIST])) {
            $query->where('user_id', CommonConstants::OPERATOR_EQUAL, Auth::user()->getAuthIdentifier());
        }
        if (isset($data[CommonConstants::KEYWORD])) {
            $keyword = $data[CommonConstants::KEYWORD];
            foreach ($keyword as $key => $value) {
                if (isset($value) && $value !== "") {
                    if ($key == 'medical_id') {
                        $query->whereHas('medicalSession', function ($q) use ($value) {
                            $q->where('code', CommonConstants::OPERATOR_LIKE, "%{$value}%");
                        });
                    } elseif ($key == 'name') {
                        $query->whereHas('medicalSession', function ($q) use ($value) {
                            $q->where('cadre_name', CommonConstants::OPERATOR_LIKE, "%{$value}%");
                        });
                    } elseif ($key == 'time') {
                        $query->whereBetween('transit_times', [$value[0], $value[1]]);
                    } else {
                        $query->whereHas('medicalSession', function ($q) use ($value) {
                            $q->where('cadre_identity_card_number', CommonConstants::OPERATOR_LIKE, "%{$value}%");
                        });
                    }
                }
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
}
