<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Constants\MaterialConstants;
use App\Repositories\HealthInsuranceCardHead\HealthInsuranceCardHeadRepositoryInterface;
use Illuminate\Http\Response;

class HealthInsuranceCardHeadService extends BaseService
{
    protected $healthInsuranceCardHeadRepository;

    /**
     * Constructor
     * Before
     * @param HealthInsuranceCardHeadRepositoryInterface $healthInsuranceCardHeadRepositoryInterface
     */
    public function __construct(HealthInsuranceCardHeadRepositoryInterface $healthInsuranceCardHeadRepositoryInterface)
    {
        $this->healthInsuranceCardHeadRepository = $healthInsuranceCardHeadRepositoryInterface;
    }

    /**
     * list
     *
     * @param $data
     * @return mixed
     */
    public function list($data)
    {
        $healthInsuranceCards = $this->healthInsuranceCardHeadRepository->list($data);
        return [
            'healthInsuranceCards' => $healthInsuranceCards,
            'itemStart' => $healthInsuranceCards->firstItem(),
            'itemEnd' => $healthInsuranceCards->lastItem(),
            'total' => $healthInsuranceCards->total(),
            'lastPage' => $healthInsuranceCards->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? "",
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? ""
        ];
    }

    /**
     * saveHealthInsuranceCardHead
     *
     * @param mixed $conditions
     * @param null $healthInsuranceCardId
     *
     * @return array
     */
    public function saveHealthInsuranceCardHead($conditions, $healthInsuranceCardId)
    {
        if (empty($healthInsuranceCardId)) {
            return $this->healthInsuranceCardHeadRepository->create($conditions);
        } else {
            $healthInsuranceCard = $this->healthInsuranceCardHeadRepository->findOneOrFail($healthInsuranceCardId);
            if (!$healthInsuranceCard) {
                return Response::HTTP_NOT_FOUND;
            }
            return $this->healthInsuranceCardHeadRepository->update($healthInsuranceCardId, $conditions);
        }
    }

    /**
     * deleteHealthInsuranceCardHead
     * @param mixed $healthInsuranceCardId
     *
     * @return bool
     */
    public function deleteHealthInsuranceCardHead($healthInsuranceCardId)
    {
        $healthInsuranceCard = $this->healthInsuranceCardHeadRepository->findOneOrFail($healthInsuranceCardId);
        if (!$healthInsuranceCard) {
            return Response::HTTP_NOT_FOUND;
        }
        return $healthInsuranceCard->delete();
    }

    /**
     * detailHealthInsuranceCardHead
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detailHealthInsuranceCardHead($id)
    {
        $healthInsuranceCard = $this->healthInsuranceCardHeadRepository->find($id);
        return is_null($healthInsuranceCard) ? Response::HTTP_NOT_FOUND : $healthInsuranceCard;
    }
}
