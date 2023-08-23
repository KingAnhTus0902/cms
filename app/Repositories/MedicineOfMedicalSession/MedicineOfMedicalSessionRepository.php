<?php

namespace App\Repositories\MedicineOfMedicalSession;
use App\Constants\CommonConstants;
use App\Constants\MaterialConstants;
use App\Constants\MaterialTypeConstants;
use App\Constants\MedicalSessionConstants;
use App\Constants\MedicineConstants;
use App\Constants\PrescriptionConstants;
use App\Models\MedicineOfMedicalSession;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class MedicineOfMedicalSessionRepository extends BaseRepository implements MedicineOfMedicalSessionRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return MedicineOfMedicalSession::class;
    }

    /**
     * get list MedicineOfMedicalSession
     * @param mixed $idPrescriptionOfMedical
     *
     * @return [type]
     */
    public function list($idPrescriptionOfMedical)
    {
        $query = $this->model->select(CommonConstants::SELECT_ALL);
        if (empty($idPrescriptionOfMedical)) {
            $query->whereNull('prescription_id');
        } else {
            $query->where('prescription_id', $idPrescriptionOfMedical)->with('prescription:id,status');
        }
        return $query->get();
    }

    /**
     * get list Danh sach thuốc đã phát
     *
     * @return [type]
     */
    public function getDistributedMaterials(array $data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $query = $this->model
        ->select(

            DB::raw('ROW_NUMBER() OVER (PARTITION BY (
                (CASE
                    WHEN materials_type_name is NULL THEN "Không phân loại"
                    ElSE materials_type_name
                END)
                ) ORDER BY materials_type_id) number'),
            MedicineConstants::TABLE_NAME . "." . "materials_insurance_code" . " as insurance_code",
            MedicineConstants::TABLE_NAME . "." . "materials_active_ingredient_name" . " as active_ingredient_name",
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_NAME,
            MedicineConstants::TABLE_NAME . "." . "materials_method" . " as method",
            MedicineConstants::TABLE_NAME . "." . "materials_dosage_form" . " as dosage_form",
            DB::raw('SUM(' . MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_AMOUNT . ') as amount'),
            MedicineConstants::TABLE_NAME . "." . "materials_content" . " as content",
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_UNIT,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_INSURANCE_UNIT_PRICE,
            PrescriptionConstants::TABLE_NAME . "." . PrescriptionConstants::COLUMN_CREATED_AT . " as created_at",
            DB::raw('
            (CASE
                WHEN materials_type_name is NULL THEN "Không phân loại"
                ElSE materials_type_name
            END) as materials_type_name')
        )
        ->leftJoin(PrescriptionConstants::TABLE_NAME, function ($join) {
            $join->on(
                MedicineConstants::TABLE_NAME . '.' . MedicineConstants::COLUMN_PRESCRIPTION_ID,
                OPERATOR_EQUAL,
                PrescriptionConstants::TABLE_NAME . '.' . PrescriptionConstants::COLUMN_ID
            );
        })
        ->leftJoin(MedicalSessionConstants::TABLE_NAME, function ($join) {
            $join->on(
                MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_ID,
                OPERATOR_EQUAL,
                PrescriptionConstants::TABLE_NAME . '.' . PrescriptionConstants::COLUMN_MEDICAL_SESSION_ID
            );
        })
        ->where(
            PrescriptionConstants::TABLE_NAME . '.' . PrescriptionConstants::COLUMN_STATUS,
            OPERATOR_EQUAL,
            PrescriptionConstants::STATUS_DISPENSED
        )
        ->where(
            MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_PAYMENT_STATUS,
            OPERATOR_EQUAL,
            MedicalSessionConstants::PAID_STATUS
        )
        ->where(
            MedicineConstants::TABLE_NAME . '.' . MedicineConstants::COLUMN_USE_INSURANCE,
            OPERATOR_EQUAL,
            MedicineConstants::PAYMENT_INSURANCE
        )
        ->where(
            MedicineConstants::TABLE_NAME .'.'. MedicineConstants::COLUMN_STATUS,
            OPERATOR_EQUAL,
            MedicineConstants::STATUS_DISPENSED
        )
        ->groupBy(
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_TYPE_ID,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_INSURANCE_CODE,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_ACTIVE_INGREDIENT_NAME,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_NAME,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_METHOD,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_DOSAGE_FORM,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_CONTENT,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_UNIT,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_INSURANCE_UNIT_PRICE,
            PrescriptionConstants::TABLE_NAME . "." . PrescriptionConstants::COLUMN_CREATED_AT,
            MedicineConstants::TABLE_NAME . "." . MedicineConstants::COLUMN_MATERIAL_TYPE_NAME,
        );
        $keyword = $data[CommonConstants::KEYWORD];
        if (!empty($keyword['time'])) {
            $query->whereBetween(
                PrescriptionConstants::TABLE_NAME . "." . PrescriptionConstants::COLUMN_CREATED_AT,
                [$keyword['time'][0], $keyword['time'][1]]
            );
            unset($keyword['time']);
        }

        $query->orderBy('materials_type_id')->orderBy('number');

        $listMaterialType = array_values(array_unique($query->pluck('materials_type_name')->toArray()));

        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }

        return [
            'query' => $query,
            'listMaterialType' => $listMaterialType,
        ];
    }
    public function getListMedicine($idPrescriptionOfMedical)
    {
        $query = $this->model->select(CommonConstants::SELECT_ALL);
        if (empty($idPrescriptionOfMedical)) {
            $query->whereNull('prescription_id');
        } else {
            $query->where('prescription_id', $idPrescriptionOfMedical)->with('prescription:id,status');
            $query->where('status', CommonConstants::OPERATOR_NOT_EQUAL ,MedicineConstants::STATUS_CANCEL);
        }
        return $query->get();
    }
}
