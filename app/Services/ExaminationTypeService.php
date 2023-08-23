<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Repositories\ExaminationType\ExaminationTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\QueryHelper;
use Throwable;

class ExaminationTypeService extends BaseService
{
    protected $mainRepository;

    /**
     * Constructor
     * Before
     * @param ExaminationTypeRepositoryInterface $examinationTypeRepository
     */
    public function __construct(ExaminationTypeRepositoryInterface $examinationTypeRepository)
    {
        $this->mainRepository = $examinationTypeRepository;
    }


    /**
     * getListUnitCMS
     *
     * @param $conditions
     * @return mixed
     */
    public function list($data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $examinationTypes = collect([]);
        try {
            $examinationTypes = $this->mainRepository->getList(
                [
                    'id',
                    'name',
                    'insurance_unit_price',
                    'service_unit_price'
                ],
                [
                    'name' => QueryHelper::setQueryInput($data['keyword'], KEY_LIKE_WHERE),
                ],
                [
                    KEY_SORT => QueryHelper::setQueryOrder('id', 'asc'),
                    KEY_PAGINATE => QueryHelper::setQueryPaginate($data[INPUT_PAGE], DEFAULT_LIMIT_PAGE),
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return [
            'examinationTypes' => $examinationTypes,
            'itemStart' => $examinationTypes->firstItem(),
            'itemEnd' => $examinationTypes->lastItem(),
            'total' => $examinationTypes->total(),
            'lastPage' => $examinationTypes->lastPage(),
            'limit' => DEFAULT_LIMIT_PAGE,
            'page' => $data[INPUT_PAGE]
        ];
    }

    /**
     * Register disease
     *
     * @param $param
     * @return ?Model
     */
    public function store($param): ?Model
    {
        try {
            return $this->mainRepository->create($param);
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Disease detail
     *
     * @param $id
     * @return ?Model
     */
    public function edit($id): ?Model
    {
        try {
            return $this->mainRepository->getDetail(
                [
                    'id' => QueryHelper::setQueryInput($id)
                ],
                [
                    'id',
                    'name',
                    'insurance_unit_price',
                    'service_unit_price'
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Update disease
     *
     * @param $param
     * @param $id
     * @return ?Model
     */
    public function update($param): ?Model
    {
        try {
            $id = $param['id'];
            $examinationType = $this->mainRepository->find($id);
            return $this->mainRepository->updates($examinationType, $param);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }

    /**
     * Delete disease
     *
     * @param $id
     * @return int|null
     */
    public function delete($id): ?int
    {
        try {
            return $this->mainRepository->delete($id);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }
}
