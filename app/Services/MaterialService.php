<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Constants\MaterialConstants;
use App\Helpers\QueryHelper;
use App\Repositories\Material\MaterialRepositoryInterface;
use App\Repositories\MaterialBatch\MaterialBatchRepositoryInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MaterialService extends BaseService
{
    protected $materialRepositoryInterface;
    protected $materialBatchRepository;

    /**
     * Constructor
     * Before
     * @param MaterialRepositoryInterface $materialRepositoryInterface
     * @param MaterialBatchRepositoryInterface $materialBatchRepository
     */
    public function __construct(
        MaterialRepositoryInterface $materialRepositoryInterface,
        MaterialBatchRepositoryInterface $materialBatchRepository
    ) {
        $this->materialRepositoryInterface = $materialRepositoryInterface;
        $this->materialBatchRepository = $materialBatchRepository;
    }

    /**
     * list
     *
     * @param $data
     * @return mixed
     */
    public function list($data)
    {
        $materials = $this->materialRepositoryInterface->list($data);
        return [
            'materials' => $materials,
            'itemStart' => $materials->firstItem(),
            'itemEnd' => $materials->lastItem(),
            'total' => $materials->total(),
            'lastPage' => $materials->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? "",
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? ""
        ];
    }

    /**
     * saveMaterial
     *
     * @param mixed $conditions
     * @param null $materialId
     *
     * @return array
     */
    public function saveMaterial($conditions, $materialId = null)
    {
        $useInsurance = MaterialConstants::USE_INSURANCE;
        $notUseInsurance = MaterialConstants::NOT_USE_INSURANCE;
        $conditions['use_insurance'] = !empty($conditions['use_insurance']) ? $useInsurance : $notUseInsurance;
        if (empty($conditions['service_unit_price'])) {
            $conditions['service_unit_price'] = CommonConstants::PRICE_DEFAULT;
        }
        if (empty($conditions['insurance_unit_price'])) {
            $conditions['insurance_unit_price'] = CommonConstants::PRICE_DEFAULT;
        }
        if (empty($materialId)) {
            $conditions['code'] = self::generateMaterialCode();
            return $this->materialRepositoryInterface->create($conditions);
        }

        $material = $this->materialRepositoryInterface->findOneOrFail($materialId);
        if (!$material) {
            return Response::HTTP_NOT_FOUND;
        }
        if ($conditions['use_insurance'] == $notUseInsurance) {
            $conditions['insurance_code'] = null;
            $conditions['insurance_unit_price'] = CommonConstants::PRICE_DEFAULT;
        }
        return $this->materialRepositoryInterface->update($materialId, $conditions);
    }


    /**
     * Delete Material
     *
     * @param int $materialId
     * @return array
     */
    public function deleteMaterial($materialId)
    {
        $material = $this->materialRepositoryInterface->find($materialId);
        if (!$material) {
            return [
                'isNotFound' => true,
                'isDenyDelete' => false,
                'isDeleted' => false
            ];
        }

        $materialBatches = $this->materialBatchRepository->getList(
            ['id', 'amount'],
            [
                'material_id' => QueryHelper::setQueryInput($materialId)
            ]
        )->get();
        if ($materialBatches->isNotEmpty()) {
            return [
                'isNotFound' => false,
                'isDenyDelete' => true,
                'isDeleted' => false
            ];
        }

        return [
            'isNotFound' => false,
            'isDenyDelete' => false,
            'isDeleted' => $material->delete()
        ];
    }

    /**
     * detail Material
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detailMaterial($id)
    {
        $material = $this->materialRepositoryInterface->find($id);
        return is_null($material) ? Response::HTTP_NOT_FOUND : $material;
    }

    /**
     * @param mixed $keyword
     *
     * @return [type]
     */
    public function getMaterialSuggest($keyword, $forPrescription = false)
    {
        $result = $this->materialRepositoryInterface->searchMaterial(
            $keyword,
            $forPrescription
        );
        return $result;
    }

    /**
     * Detail amount material
     *
     * @param int $id
     * @return Collection
     */
    public function detailAmountMaterial($id)
    {
        return $this->materialBatchRepository->listForDetailMaterial($id);
    }

    /**
     * List data export.
     *
     * @return Collection
     */
    public function listDataExport()
    {
        DB::statement(DB::raw('set @no=0'));

        $selectMethodSql = 'CASE';
        foreach (MaterialConstants::METHOD as $value => $name) {
            $selectMethodSql .= ' WHEN method = "' . $value . '" THEN "' . $name . '"';
        }
        $selectMethodSql .= ' ELSE "" END';

        return $this->materialRepositoryInterface->getList(
            [
                DB::raw('@no  := @no  + 1 AS no'),
                'materials_tbl.code',
                'materials_tbl.name',
                'mapping_name',
                DB::raw(
                    '(
                        CASE
                            WHEN type = "' . MaterialConstants::TYPE_MATERIAL . '"
                                THEN "' . MaterialConstants::TYPE[MaterialConstants::TYPE_MATERIAL] . '"
                            WHEN type = "' . MaterialConstants::TYPE_MEDICINE . '"
                                THEN "' . MaterialConstants::TYPE[MaterialConstants::TYPE_MEDICINE] . '"
                            ELSE ""
                        END
                    ) AS type'
                ),
                'active_ingredient_name',
                'content',
                'dosage_form',
                'materials_types.code AS material_type_id',
                'units_mst.code AS unit_id',
                'ingredients',
                'insurance_code',
                'insurance_unit_price',
                'service_unit_price',
                'disease_type',
                DB::raw('(' . $selectMethodSql . ') AS method'),
                'usage',
            ]
        )
            ->leftJoin('materials_types', 'material_type_id', '=', 'materials_types.id')
            ->leftJoin('units_mst', 'unit_id', '=', 'units_mst.id')
            ->get();
    }

    /**
     * Generate material code.
     *
     * @return string
     */
    public static function generateMaterialCode()
    {
        do {
            $materialCode = 'VT' . rand(1000000000, 9999999999);
            $materialCode = !app(MaterialRepositoryInterface::class)->exist('code', $materialCode)
                ? $materialCode
                : null;
        } while (!$materialCode);

        return $materialCode;
    }
}
