<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\MaterialType\MaterialTypeRepositoryInterface;

class MaterialTypeService extends BaseService
{
    /**
     * @var mainRepository
     */
    protected $mainRepository;

    /**
     * @param MaterialTypeRepositoryInterface $materialTypeRepositoryInterface
     */
    public function __construct(
        MaterialTypeRepositoryInterface $materialTypeRepositoryInterface
    ) {
        $this->mainRepository = $materialTypeRepositoryInterface;
    }

    /**
     * @param array $data
     * @param boolean $paginate
     * @param string $select
     *
     * @return array
     */
    public function list(array $data, $paginate = false, $select = CommonConstants::SELECT_ALL): array
    {
        $materialsTypes = $this->mainRepository->list($data, $paginate, $select);

        return [
            'material_types'    => $materialsTypes,
            'itemStart'         => $materialsTypes->firstItem(),
            'itemEnd'           => $materialsTypes->lastItem(),
            'total'             => $materialsTypes->total(),
            'lastPage'          => $materialsTypes->lastPage(),
            'limit'             => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page'              => $data[CommonConstants::INPUT_PAGE] ?? 1
        ];
    }
}
