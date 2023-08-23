<?php

namespace App\Services;

use App\Constants\CommonConstants;
use App\Helpers\CommonHelper;
use App\Constants\ImportMaterialsSlipConstants;
use App\Constants\MaterialConstants;
use App\Helpers\QueryHelper;
use App\Imports\MaterialSlipImport;
use App\Repositories\ImportMaterialsSlip\ImportMaterialsSlipRepositoryInterface;
use App\Repositories\Material\MaterialRepositoryInterface;
use App\Repositories\MaterialBatch\MaterialBatchRepositoryInterface;
use App\Repositories\MaterialType\MaterialTypeRepositoryInterface;
use App\Repositories\Unit\UnitRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ImportMaterialsSlipService extends BaseService
{
    protected $mainRepository;
    protected $materialBatchRepository;
    protected $materialRepository;
    protected $materialTypeRepository;
    protected $unitRepository;

    public const LIMIT_ROW_IMPORT = 1000;

    public function __construct(
        ImportMaterialsSlipRepositoryInterface $importMaterialsSlipRepository,
        MaterialBatchRepositoryInterface $materialBatchRepository,
        MaterialRepositoryInterface $materialRepository,
        MaterialTypeRepositoryInterface $materialTypeRepository,
        UnitRepositoryInterface $unitRepository
    ) {
        $this->mainRepository = $importMaterialsSlipRepository;
        $this->materialBatchRepository = $materialBatchRepository;
        $this->materialRepository = $materialRepository;
        $this->materialTypeRepository = $materialTypeRepository;
        $this->unitRepository = $unitRepository;
    }

    public function list($data, $paginate = false)
    {
        if (!empty($data[CommonConstants::KEYWORD]['import_day'])) {
            $data[CommonConstants::KEYWORD]['import_day'] = CommonHelper::formatDate(
                $data[CommonConstants::KEYWORD]['import_day'],
                DAY_MONTH_YEAR,
                YEAR_MONTH_DAY
            );
        }
        $importMaterialsSlips = $this->mainRepository->list($data, $paginate);
        return [
            'importMaterialsSlips' => $importMaterialsSlips,
            'itemStart' => $importMaterialsSlips->firstItem(),
            'itemEnd' => $importMaterialsSlips->lastItem(),
            'total' => $importMaterialsSlips->total(),
            'lastPage' => $importMaterialsSlips->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? "",
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? ""
        ];
    }

    public function store($data)
    {
        $dataImportMaterialSlip = [
            'code' => self::generateMaterialSlipCode(),
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'import_day' => CommonHelper::formatDate($data['import_day'],DAY_MONTH_YEAR, YEAR_MONTH_DAY),
            'status' => $data['status']
        ];
        $dataMaterialBatch = [];
        DB::beginTransaction();
        try {
            $importMaterialSlip = $this->mainRepository->create($dataImportMaterialSlip);
            $materialIds = collect($data['material'])->pluck('material_id')->toArray();
            $materials = $this->materialRepository->getList(
                ['id', 'code', 'name'],
                ['id' => QueryHelper::setQueryInput($materialIds, KEY_WHERE_IN)]
            )->get();
            $materialCodes = $materials->pluck('code', 'id');
            $materialNames = $materials->pluck('name', 'id');

            foreach ($data['material'] as $value) {
                $dataMaterialBatch[] = [
                    'import_materials_slip_id' => $importMaterialSlip->id,
                    'material_id'              => $value['material_id'],
                    'material_code'            => $materialCodes[$value['material_id']],
                    'material_name'            => $materialNames[$value['material_id']],
                    'amount'                   => $value['amount'],
                    'unit_price'               => $value['unit_price'],
                    'mfg_date'                 => CommonHelper::formatDate($value['mfg_date'],DAY_MONTH_YEAR, YEAR_MONTH_DAY),
                    'exp_date'                 => CommonHelper::formatDate($value['exp_date'],DAY_MONTH_YEAR, YEAR_MONTH_DAY),
                    'supplier'                 => $value['supplier'],
                    'batch_name'               => $value['batch_name'],
                    'status'                   => $data['status'],
                ];
            }
            $this->materialBatchRepository->saveMultipleData($dataMaterialBatch);
            DB::commit();
            return [
                'result' => true,
                'import_materials_slip_id' => $importMaterialSlip->id,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'result' => false,
                'error'  => $e
            ];
        }
    }

    public function details($id)
    {
        $importMaterialSlip = $this->mainRepository->find($id);
        $materialBatchs = $this->materialBatchRepository->listForImportMaterialSlip($id);
        return [
            'importMaterialSlip' => $importMaterialSlip,
            'materialBatchs'     => $materialBatchs
        ];
    }

    public function edit($data)
    {
        DB::beginTransaction();
        try {
            $importMaterialSlip = $this->mainRepository->find($data['id']);
            $importMaterialSlip->import_day = CommonHelper::formatDate($data['import_day'],DAY_MONTH_YEAR, YEAR_MONTH_DAY);
            $importMaterialSlip->status = $data['status'];
            $importMaterialSlip->save();
            $listIdMaterialBatch = $this->materialBatchRepository->listIdForImportMaterialSlip($data['id']);
            $materialBatchIdsRequest = [];
            $materialBatchUpDate = [];
            $materialBatchCreate = [];
            $materialIds = collect($data['material'])->pluck('material_id')->toArray();
            $materials = $this->materialRepository->getList(
                ['id', 'code', 'name'],
                ['id' => QueryHelper::setQueryInput($materialIds, KEY_WHERE_IN)]
            )->get();
            $materialCodes = $materials->pluck('code', 'id');
            $materialNames = $materials->pluck('name', 'id');

            foreach ($data['material'] as $value) {
                unset($value['name']);
                $value['material_code'] = $materialCodes[$value['material_id']];
                $value['material_name'] = $materialNames[$value['material_id']];
                $value['mfg_date'] = CommonHelper::formatDate($value['mfg_date'],DAY_MONTH_YEAR, YEAR_MONTH_DAY);
                $value['exp_date'] = CommonHelper::formatDate($value['exp_date'],DAY_MONTH_YEAR, YEAR_MONTH_DAY);
                $value['status'] = $data['status'];
                if (isset($value['material_batch_id'])) {
                    $materialBatchIdsRequest[] = $value['material_batch_id'];
                    $materialBatchUpDate[] = $value;
                } else {
                    $value['import_materials_slip_id'] = $importMaterialSlip->id;
                    $materialBatchCreate[] = $value;
                }
            }
            $listIdMaterialBatchForDelete = array_diff($listIdMaterialBatch, $materialBatchIdsRequest);
            if ($listIdMaterialBatchForDelete) {
                $this->materialBatchRepository->delete($listIdMaterialBatchForDelete);
            }

            foreach ($materialBatchUpDate as $item) {
                $id = $item['material_batch_id'];
                unset($item['material_batch_id']);
                $this->materialBatchRepository->update($id, $item);
            }
            $this->materialBatchRepository->saveMultipleData($materialBatchCreate);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    /**
     * Valid data import material slip.
     *
     * @param array $params
     * @return array
     */
    public function validImport(array $params = [])
    {
        $collection = Excel::toCollection(new MaterialSlipImport, $params['file']);
        $rows = $collection->first()->toArray();
        $materialTypes = $this->materialTypeRepository->getList(['id', 'code'])->pluck('code', 'id')->toArray();
        $units = $this->unitRepository->getList(['id', 'code'])->pluck('code', 'id')->toArray();

        $rows = array_map(function ($row) {
            $row['ngay_san_xuat'] = CommonHelper::transformDate($row['ngay_san_xuat']);
            $row['ngay_het_han'] = CommonHelper::transformDate($row['ngay_het_han']);
            $row['gia_bh_vnd'] = $row['gia_bh_vnd'] ?? CommonConstants::PRICE_DEFAULT;
            $row['gia_dv_vnd'] = $row['gia_dv_vnd'] ?? CommonConstants::PRICE_DEFAULT;
            return $row;
        }, $rows);

        $convertRows = array_map(function ($row) use ($materialTypes, $units) {
            $row['phan_loai'] = in_array($row['phan_loai'], $materialTypes)
                ? array_search($row['phan_loai'], $materialTypes)
                : $row['phan_loai'];
            $row['don_vi'] = in_array($row['don_vi'], $units)
                ? array_search($row['don_vi'], $units)
                : $row['don_vi'];
            $row['loai'] = in_array($row['loai'], MaterialConstants::TYPE)
                ? array_search($row['loai'], MaterialConstants::TYPE)
                : $row['loai'];
            $row['duong_dung'] = in_array($row['duong_dung'], MaterialConstants::METHOD)
                ? array_search($row['duong_dung'], MaterialConstants::METHOD)
                : $row['duong_dung'];
            return $row;
        }, $rows);

        if (count($convertRows) > self::LIMIT_ROW_IMPORT) {
            return [
                'isLimit' => true,
                'errors' => [],
                'data' => []
            ];
        }

        $validator = Validator::make(
            $convertRows,
            [
                '*.ma_thuoc_vat_tu' => 'nullable|string|exists:materials_tbl,code',
                '*.ten_thuoc_vat_tu' => 'required|max:255',
                '*.ten_anh_xa' => 'nullable|max:255',
                '*.loai' => ['required', 'integer', Rule::in(
                    MaterialConstants::TYPE_MATERIAL,
                    MaterialConstants::TYPE_MEDICINE
                )],
                '*.ten_hoat_chat' => 'nullable|max:255',
                '*.ham_luong' => 'nullable|max:255',
                '*.dang_bao_che' => 'nullable|max:255',
                '*.phan_loai' => 'nullable|integer',
                '*.don_vi' => 'required|integer',
                '*.thanh_phan' => 'nullable|max:255',
                '*.ma_bao_hiem' => 'nullable|max:25',
                '*.gia_bh_vnd' => CommonConstants::RULE_VALIDATE_PRICE,
                '*.gia_dv_vnd' => CommonConstants::RULE_VALIDATE_PRICE,
                '*.loai_benh' => 'nullable|max:255',
                '*.duong_dung' => ['required', 'string', Rule::in(array_keys(MaterialConstants::METHOD))],
                '*.cach_dung' => 'required|string',
                '*.so_luong' => 'required|numeric|digits_between:1,10|regex:/^[0-9]+$/',
                '*.don_gia_nhap' => 'required|numeric|digits_between:1,10|regex:/^[0-9]+$/',
                '*.ngay_san_xuat' => 'required|date_format:d/m/Y,j/m/Y,d/n/Y,j/n/Y',
                '*.ngay_het_han' => 'required|date_format:d/m/Y,j/m/Y,d/n/Y,j/n/Y|after:*.ngay_san_xuat',
                '*.nha_cung_cap' => 'nullable|max:255',
                '*.ten_lo' => 'required|max:255',
            ],
            [
                'integer' => __('messages.EM-003'),
                'in' => __('messages.EM-028'),
                'required'  => __('messages.EM-002'),
                'min'       => __('messages.EM-008'),
                'max'       => __('messages.EM-007'),
                'unique'    => __('messages.EM-006'),
                'exists'    => __('label.import_materials_slip.add.validate.exists'),
                'date'      => __('messages.EM-003'),
                'email'     => __('messages.EM-004'),
                'size'      => __('messages.EM-014', ['attribute2' => 15]),
                'after'     => __(
                    'messages.EM-013',
                    ['attribute2' => __('label.import_materials_slip.add.field.material_mfg_date')]
                ),
                'regex'          => __('messages.EM-003'),
                'digits_between' => __('messages.EM-007'),
                'numeric'        => __('messages.EM-005'),
                'before_or_equal' => __('messages.EM-027'),
                'string' => __('messages.EM-003'),
                'material.*.material_id.required_with'
                => __('label.import_materials_slip.add.validate.material_id_required'),
                'date_format' => __('messages.IMS-005'),
            ],
            [
                '*.ma_thuoc_vat_tu' => 'Mã thuốc, vật tư',
                '*.ten_thuoc_vat_tu' => 'Tên thuốc, vật tư',
                '*.ten_anh_xa' => 'Tên ánh xạ',
                '*.loai' => 'Loại',
                '*.ten_hoat_chat' => 'Tên hoạt chất',
                '*.ham_luong' => 'Hàm lượng',
                '*.dang_bao_che' => 'Dạng bào chế',
                '*.phan_loai' => 'Phân loại',
                '*.don_vi' => 'Đơn vị',
                '*.thanh_phan' => 'Thành phần',
                '*.ma_bao_hiem' => 'Mã bảo hiểm',
                '*.gia_bh_vnd' => 'Giá BH (VND)',
                '*.gia_dv_vnd' => 'Giá DV (VND)',
                '*.loai_benh' => 'Loại bệnh',
                '*.duong_dung' => 'Đường dùng',
                '*.cach_dung' => 'Cách dùng',
                '*.so_luong' => 'Số lượng',
                '*.don_gia_nhap' => 'Đơn giá nhập',
                '*.ngay_san_xuat' => 'Ngày sản xuất',
                '*.ngay_het_han' => 'Ngày hết hạn',
                '*.nha_cung_cap' => 'Nhà cung cấp',
                '*.ten_lo' => 'Tên lô'
            ]
        );

        if ($validator->fails()) {
            $validErrors = $validator->errors()->getMessages();
            $errors = [];
            foreach ($validErrors as $validKey => $validError) {
                $row = explode('.', $validKey)[0];
                $errors[$row + 1][] = $validError[0];
            }

            return [
                'isLimit' => false,
                'errors' => $errors,
                'data' => []
            ];
        }

        return [
            'isLimit' => false,
            'errors' => [],
            'data' => $rows
        ];
    }

    /**
     * Import material slip.
     *
     * @param array $params
     * @return bool
     */
    public function import(array $params = [])
    {
        DB::beginTransaction();
        try {
            $materialSlip = $this->mainRepository->create(
                [
                    'code' => self::generateMaterialSlipCode(),
                    'user_id' => Auth::id(),
                    'user_name' => Auth::user()->name,
                    'import_day' => Carbon::createFromFormat('d/m/Y', $params['import_day']),
                    'status' => $params['status']
                ]
            );
            $materials = $this->materialRepository->getList(['id', 'code', 'name'])->get();
            $materialTypes = $this->materialTypeRepository->getList(['id', 'code'])->pluck('code', 'id')->toArray();
            $units = $this->unitRepository->getList(['id', 'code'])->pluck('code', 'id')->toArray();

            $materialSlipImport = new MaterialSlipImport();
            $materialSlipImport->setMaterialSlip($materialSlip);
            $materialSlipImport->setMaterial($materials);
            $materialSlipImport->setMaterialType($materialTypes);
            $materialSlipImport->setUnit($units);
            $materialSlipImport->setSaveStatus($params['status']);

            Excel::import($materialSlipImport, $params['file']);
            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('[Import Material Slip]: ' . $th->getMessage());

            return false;
        }
    }

    /**
     * Generate material slip code.
     *
     * @return string
     */
    public static function generateMaterialSlipCode()
    {
        do {
            $materialSlipCode = 'PN' . rand(1000000000, 9999999999);
            $materialSlipCode = !app(ImportMaterialsSlipRepositoryInterface::class)->exist('code', $materialSlipCode)
                ? $materialSlipCode
                : null;
        } while (!$materialSlipCode);

        return $materialSlipCode;
    }

    /**
     * Delete import-material-slip and material batch
     * @param $id
     * @return \Exception|bool
     */
    public function delete($id): \Exception|bool
    {
        DB::beginTransaction();
        try {
            $importMaterialSlip = $this->findOneBy([
                'id' => $id,
                'status' => ImportMaterialsSlipConstants::STATUS_DRAFT
            ]);
            if (!$importMaterialSlip) {
                return false;
            }
            $this->materialBatchRepository->deleteByAttr('import_materials_slip_id', $id);
            $this->mainRepository->deleteByAttr('id', $id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
}
