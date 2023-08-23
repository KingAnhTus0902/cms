<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\Department\DepartmentRepositoryInterface;

class DepartmentService extends BaseService
{
    protected $mainRepository;

    public function __construct(
        DepartmentRepositoryInterface $departmentRepositoryInterface
    ) {
        $this->mainRepository = $departmentRepositoryInterface;
    }

    public function list($data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $departments = $this->mainRepository->list($data, $paginate, $select);
        return [
            'departments' => $departments,
            'itemStart' => $departments->firstItem(),
            'itemEnd' => $departments->lastItem(),
            'total' => $departments->total(),
            'lastPage' => $departments->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? "",
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? ""
        ];
    }
}
