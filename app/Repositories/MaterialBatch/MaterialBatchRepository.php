<?php

namespace App\Repositories\MaterialBatch;

use App\Constants\MaterialBatchConstants;
use App\Models\MaterialBatch;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Database\Eloquent\Builder;

class MaterialBatchRepository extends BaseRepository implements MaterialBatchRepositoryInterface
{
    public function getModel()
    {
        return MaterialBatch::class;
    }

    public function getBatchsForMedicalSession($data, $select = SELECT_ALL, $unexpired = true)
    {
        $query = $this->model->select($select)->realSave();
        if (!empty($data['material_id'])) {
            $query->where('material_id', OPERATOR_EQUAL, $data['material_id']);
        }

        if ($unexpired) {
            $query->unexpired();
        }

        $query->orderBy('exp_date', ORDER_ASC);
        return $query->get();
    }

    /**
     * revert amount of medicine in material batchs
     */
    public function revertMedicines($medicines)
    {
        if (!empty($medicines)) {
            foreach ($medicines as $med) {
                foreach ($med->batchs as $medicineMedicalSessionBatch) {
                    $materialBatch = $this->find($medicineMedicalSessionBatch->material_batch_id);
                    $materialBatch->amount = $materialBatch->getOriginal('amount') + $medicineMedicalSessionBatch->amount;
                    $materialBatch->save();
                    $medicineMedicalSessionBatch->delete();
                }
            }
        }
    }

    /**
     * Get list Material Batch for detail material
     *
     * @param int $id
     * @return Collection
     */
    public function listForDetailMaterial($id)
    {
        $select = [
            'id',
            'material_id',
            'amount',
            'unit_price',
            'mfg_date',
            'exp_date',
            'supplier',
            'batch_name'
        ];
        $query = $this->model->select($select)->where('material_id', $id)
            ->realSave()
            ->with(['material' => function (Builder $query) {
                $query->select(['id', 'name', 'insurance_code']);
            }])
            ->orderBy('exp_date', 'ASC');

        return $query->get();
    }

    /**
     * Get list Material Batch for detail material
     *
     * @param int $importMaterialsSlipId
     * @return array
     */
    public function listForImportMaterialSlip($importMaterialsSlipId)
    {
        $select = [
            'id',
            'import_materials_slip_id',
            'material_id',
            'material_code',
            'material_name',
            'amount',
            'unit_price',
            'mfg_date',
            'exp_date',
            'supplier',
            'batch_name'
        ];
        $query = $this->model->select($select)->where('import_materials_slip_id', $importMaterialsSlipId);
        return $query->get();
    }

    /**
     * Get list Material Batch for detail material
     *
     * @param int $importMaterialsSlipId
     * @return array
     */
    public function listIdForImportMaterialSlip($importMaterialsSlipId): array
    {
        $query = $this->model->where('import_materials_slip_id', $importMaterialsSlipId)
            ->pluck('id');
        return $query->toArray();
    }
}
