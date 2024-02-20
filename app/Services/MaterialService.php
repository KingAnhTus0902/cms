<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\Material\MaterialRepositoryInterface;
use Illuminate\Http\Response;

class MaterialService extends BaseService
{
    protected $materialRepositoryInterface;

    /**
     * Constructor
     * Before
     * @param MaterialRepositoryInterface $materialRepositoryInterface
     */
    public function __construct(
        MaterialRepositoryInterface $materialRepositoryInterface,
    ) {
        $this->materialRepositoryInterface = $materialRepositoryInterface;
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
        if (empty($materialId)) {
            $conditions['code'] = self::generateMaterialCode();
            return $this->materialRepositoryInterface->create($conditions);
        }

        $material = $this->materialRepositoryInterface->findOneOrFail($materialId);
        if (!$material) {
            return Response::HTTP_NOT_FOUND;
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
