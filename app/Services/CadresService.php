<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Helpers\QueryHelper;
use App\Repositories\Cadres\CadresRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class CadresService extends BaseService
{
    /**
     * @var mainRepository
     */
    protected $mainRepository;

    /**
     * @param CadresRepositoryInterface $cadresRepositoryInterface
     */
    public function __construct(
        CadresRepositoryInterface $cadresRepositoryInterface
    ) {
        $this->mainRepository = $cadresRepositoryInterface;
    }

    /**
     * @param array $data
     * @param boolean $paginate
     * @param string $select
     * @return array
     */
    public function list(array $data, $paginate = false, $select = CommonConstants::SELECT_ALL) : array
    {
        $cadreses = $this->mainRepository->list($data, $paginate, $select);

        return [
            'cadreses'          => $cadreses,
            'itemStart'         => $cadreses->firstItem(),
            'itemEnd'           => $cadreses->lastItem(),
            'total'             => $cadreses->total(),
            'lastPage'          => $cadreses->lastPage(),
            'limit'             => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page'              => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column'       => $data[CommonConstants::KEY_SORT_COLUMN] ?? "",
            'sort_type'         => $data[CommonConstants::KEY_SORT_TYPE] ?? "",
            'sort_type_default' => CommonConstants::SORT_TYPE_DEFAULT
        ];
    }

    public function getCadresForMedicalSession($data)
    {
        return $this->findOneBy(
            [
                'identity_card_number' => $data['identity_card_number'],
            ],
        );
    }

    public function getCadresSuggest($keyword)
    {
        return $this->mainRepository->getList(
            [
                'id',
                'name',
                DB::raw('DATE_FORMAT(birthday, "%Y") as birthday')
            ]
            ,
            [
                'name' => QueryHelper::setQueryInput($keyword, KEY_LIKE_WHERE),
            ],
        )->get();
    }

    /**
     * Update cadre status
     *
     * @param $param
     * @param $id
     * @return ?Model
     */
    public function updates($param, $id): ?Model
    {
        try {
            $cadres = $this->mainRepository->find($id);
            return $this->mainRepository->updates($cadres, $param);
        } catch (Throwable $e) {
            report($e);
        }
        return null;
    }
}
