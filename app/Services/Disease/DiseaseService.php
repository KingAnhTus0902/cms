<?php

namespace App\Services\Disease;

use App\Helpers\QueryHelper;
use App\Repositories\Disease\DiseaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Throwable;

class DiseaseService implements DiseaseServiceInterface
{
    /** @var DiseaseRepositoryInterface */
    protected DiseaseRepositoryInterface $diseaseRepository;

    /**
     * Base construction Admin
     *
     * @param DiseaseRepositoryInterface $diseaseRepository
     */
    public function __construct(DiseaseRepositoryInterface $diseaseRepository)
    {
        $this->diseaseRepository = $diseaseRepository;
    }

    /**
     * Data for disease homepage
     *
     * @return Collection
     */
    public function index(): Collection
    {
        try {
            return $this->diseaseRepository->getList(['id', 'name'])->get();
        } catch (Throwable $e) {
            report($e);
        }

        return collect([]);
    }

    /**
     * List of disease
     *
     * @param array $params
     * @return array
     */
    public function list(array $params): array
    {
        $diseases = collect([]);
        try {
            $diseases = $this->diseaseRepository->getList(
                [
                    'id',
                    'name',
                    'code',
                    'type'
                ],
                [
                    'name' => QueryHelper::setQueryInput($params['name'], KEY_LIKE_WHERE),
                    'code' => QueryHelper::setQueryInput($params['code'], KEY_LIKE_WHERE)
                ],
                [
                    KEY_SORT => QueryHelper::setQueryOrder('id', 'asc'),
                    KEY_PAGINATE => QueryHelper::setQueryPaginate($params[INPUT_PAGE], DEFAULT_LIMIT_PAGE),
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return [
            'diseases' => $diseases,
            'itemStart' => $diseases->firstItem(),
            'itemEnd' => $diseases->lastItem(),
            'total' => $diseases->total(),
            'lastPage' => $diseases->lastPage(),
            'limit' => DEFAULT_LIMIT_PAGE,
            'page' => $params[INPUT_PAGE]
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
            return $this->diseaseRepository->create($param);
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
    public function update($param, $id): ?Model
    {
        try {
            $disease = $this->diseaseRepository->find($id);
            return $this->diseaseRepository->updates($disease, $param);
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
            return $this->diseaseRepository->getDetail(
                [
                    'id' => QueryHelper::setQueryInput($id)
                ],
                [
                    'id',
                    'name',
                    'code',
                    'type'
                ]
            );
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
            return $this->diseaseRepository->delete($id);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }
}
