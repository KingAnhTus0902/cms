<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\Unit\UnitRepositoryInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UnitService extends BaseService
{
    protected $mainRepository;

    /**
     * Constructor
     * Before
     * @param UnitRepositoryInterface $unitRepositoryInterface
     */
    public function __construct(UnitRepositoryInterface $unitRepositoryInterface)
    {
        $this->mainRepository = $unitRepositoryInterface;
    }

    /**
     * list Unit
     *
     * @param mixed $data
     * @param bool $paginate
     * @param  $select
     *
     * @return [type]
     */
    public function list($data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $units = $this->mainRepository->list($data, $paginate, $select);
        return [
            'units' => $units,
            'itemStart' => $units->firstItem(),
            'itemEnd' => $units->lastItem(),
            'total' => $units->total(),
            'lastPage' => $units->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? "",
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? ""
        ];
    }

    /**
     * saveUnit
     *
     * @param mixed $conditions
     * @param null $unitId
     *
     * @return array
     */
    public function saveUnit($conditions, $unitId = null)
    {
        try {
            $conditions['note'] = $conditions['note'] ?? null;
            if (empty($unitId)) {
                return $this->mainRepository->create($conditions);
            } else {
                $unit = $this->mainRepository->findOneOrFail($unitId);
                if (!$unit) {
                    return Response::HTTP_NOT_FOUND;
                }
                return $this->mainRepository->update($unitId, $conditions);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }


    /**
     * @param $unitId
     * @return bool|int
     */
    public function deleteUnit($unitId)
    {
        try {
            $unit = $this->mainRepository->findOneOrFail($unitId);
            if (!$unit) {
                return Response::HTTP_NOT_FOUND;
            }
            if ($unit->delete()) {
                return true;
            }
            return false;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }

    /**
     * detail unit
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detailUnit($id)
    {
        $unit = $this->mainRepository->find($id);
        return is_null($unit) ? Response::HTTP_NOT_FOUND : $unit;
    }
}
