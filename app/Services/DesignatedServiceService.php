<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Constants\DesignatedServiceConstants;
use App\Repositories\DesignatedService\DesignatedServiceRepositoryInterface;
use App\Services\FileService\FileServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class DesignatedServiceService extends BaseService
{
    const PATH_FILE = '/designated_services';
    protected $mainRepository;

    protected FileServiceInterface $fileService;
    /**
     * Constructor
     * Before
     * @param DesignatedServiceRepositoryInterface $designatedServiceRepositoryInterface
     */
    public function __construct(
        DesignatedServiceRepositoryInterface $designatedServiceRepositoryInterface,
        FileServiceInterface $fileService
    )
    {
        $this->mainRepository = $designatedServiceRepositoryInterface;
        $this->fileService = $fileService;
    }


    /**
     * getListUnitCMS
     *
     * @param $conditions
     * @return mixed
     */
    public function list($data, $paginate = false, $select = CommonConstants::SELECT_ALL)
    {
        $designatedServices = $this->mainRepository->list($data, $paginate, $select);
        return [
            'designated_services' => $designatedServices,
            'itemStart' => $designatedServices->firstItem(),
            'itemEnd' => $designatedServices->lastItem(),
            'total' => $designatedServices->total(),
            'lastPage' => $designatedServices->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? '',
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? '',
            'sort_type_default' => CommonConstants::SORT_TYPE_DEFAULT
        ];
    }

    public function saveDesignatedService($conditions, $id = null)
    {
        if (empty($id)) {
            $conditions['code'] = 'DV';
            $result = $this->mainRepository->create($conditions);
            $res = $this->mainRepository->findOneOrFail($result->id);
            if (!$res) {
                return Response::HTTP_NOT_FOUND;
            }
            $data['code'] = $conditions['code'] . str_pad($res->id, 5, "0", STR_PAD_LEFT);
            return $this->mainRepository->update($res->id, $data);
        } else {
            $res = $this->mainRepository->findOneOrFail($id);
            if (!$res) {
                return Response::HTTP_NOT_FOUND;
            }
            return $this->mainRepository->update($id, $conditions);
        }
    }

    public function uploadDescription($params, $id) {
        $ds = $this->find($id);
        if (!empty($ds)) {

            if (isset($params['code'])) {
                return $this->mainRepository->updates($ds, [
                    'description' => $params['code']
                ]);
            } else {
                $oldPath = $this->fileService->fileFromTextEditor(
                    $ds->description
                );
                return $this->fileService->upload($params['file'], self::PATH_FILE, $oldPath);
            }
        } else return $this->fileService->upload($params['file'], self::PATH_FILE);
    }
}
