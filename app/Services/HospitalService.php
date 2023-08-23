<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\Hospital\HospitalRepositoryInterface;

class HospitalService extends BaseService
{
    protected $mainRepository;

    /**
     * Constructor
     * Before
     * @param HospitalRepositoryInterface $hospitalsRepositoryInterface
     */
    public function __construct(HospitalRepositoryInterface $hospitalsRepositoryInterface)
    {
        $this->mainRepository = $hospitalsRepositoryInterface;
    }


    /**
     * getListUnitCMS
     *
     * @param $conditions
     * @return mixed
     */
    public function list($data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $hospitals = $this->mainRepository->list($data, $paginate, $select);
        return [
            'hospitals' => $hospitals,
            'itemStart' => $hospitals->firstItem(),
            'itemEnd' => $hospitals->lastItem(),
            'total' => $hospitals->total(),
            'lastPage' => $hospitals->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? '',
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? '',
            'sort_type_default' => CommonConstants::SORT_TYPE_DEFAULT
        ];
    }

    /**
     * getHospitalSuggest
     *
     * @param mixed $conditions
     *
     * @return [type]
     */
    public function getHospitalSuggest($conditions)
    {
        $keyword = $conditions['hospital_code'] ?? null;
        return $this->mainRepository->getHospitalSuggest($keyword);
    }
}
