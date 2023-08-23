<?php

namespace App\Imports;

use App\Constants\CommonConstants;
use App\Constants\MaterialConstants;
use App\Helpers\CommonHelper;
use App\Repositories\Material\MaterialRepositoryInterface;
use App\Repositories\MaterialBatch\MaterialBatchRepositoryInterface;
use App\Services\MaterialService;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class MaterialSlipImport implements OnEachRow, WithHeadingRow
{
    protected $materialSlip;
    protected $materialCodes;
    protected $materialNames;
    protected $materialTypes;
    protected $units;
    protected $saveStatus;

    public function setMaterialSlip($materialSlip)
    {
        $this->materialSlip = $materialSlip;
    }

    public function setMaterial($materials)
    {
        $this->materialCodes = $materials->pluck('code', 'id');
        $this->materialNames = $materials->pluck('name', 'id');
    }

    public function setMaterialType($materialTypes)
    {
        $this->materialTypes = $materialTypes;
    }

    public function setUnit($units)
    {
        $this->units = $units;
    }

    public function setSaveStatus($saveStatus)
    {
        $this->saveStatus = $saveStatus;
    }

    public function onRow(Row $row)
    {
        $row = $row->toArray();
        $row['phan_loai'] = array_search($row['phan_loai'], $this->materialTypes);
        $row['don_vi'] = array_search($row['don_vi'], $this->units);
        $row['loai'] = array_search($row['loai'], MaterialConstants::TYPE);
        $row['duong_dung'] = array_search($row['duong_dung'], MaterialConstants::METHOD);
        $row['ngay_san_xuat'] = CommonHelper::transformDate($row['ngay_san_xuat']);
        $row['ngay_het_han'] = CommonHelper::transformDate($row['ngay_het_han']);
        $row['gia_bh_vnd'] = $row['gia_bh_vnd'] ?? CommonConstants::PRICE_DEFAULT;
        $row['gia_dv_vnd'] = $row['gia_dv_vnd'] ?? CommonConstants::PRICE_DEFAULT;

        if (isset($row['ma_thuoc_vat_tu'])) {
            $materialId = $this->materialCodes->search($row['ma_thuoc_vat_tu']);
            app(MaterialBatchRepositoryInterface::class)->create(
                [
                    'import_materials_slip_id' => $this->materialSlip['id'],
                    'material_id' => $materialId,
                    'material_code' => $this->materialCodes[$materialId],
                    'material_name' => $this->materialNames[$materialId],
                    'amount' => $row['so_luong'],
                    'unit_price' => $row['don_gia_nhap'],
                    'mfg_date' => Carbon::createFromFormat('d/m/Y', $row['ngay_san_xuat']),
                    'exp_date' => Carbon::createFromFormat('d/m/Y', $row['ngay_het_han']),
                    'supplier' => $row['nha_cung_cap'],
                    'batch_name' => $row['ten_lo'],
                    'status' => $this->saveStatus,
                ]
            );
        } else {
            $materialCode = MaterialService::generateMaterialCode();
            $material = app(MaterialRepositoryInterface::class)->create(
                [
                    'code' => $materialCode,
                    'name' => $row['ten_thuoc_vat_tu'],
                    'mapping_name' => $row['ten_anh_xa'],
                    'type' => $row['loai'],
                    'active_ingredient_name' => $row['ten_hoat_chat'],
                    'content' => $row['ham_luong'],
                    'dosage_form' => $row['dang_bao_che'],
                    'material_type_id' => $row['phan_loai'],
                    'ingredients' => $row['thanh_phan'],
                    'unit_id' => $row['don_vi'],
                    'service_unit_price' => $row['gia_dv_vnd'],
                    'insurance_code' => $row['ma_bao_hiem'],
                    'use_insurance' => $row['ma_bao_hiem'] != '' ? MaterialConstants::USE_INSURANCE : MaterialConstants::NOT_USE_INSURANCE,
                    'insurance_unit_price' => $row['ma_bao_hiem'] ? $row['gia_bh_vnd'] : CommonConstants::PRICE_DEFAULT,
                    'disease_type' => $row['loai_benh'],
                    'method' => $row['duong_dung'],
                    'usage' => $row['cach_dung'],
                ]
            );
            app(MaterialBatchRepositoryInterface::class)->create(
                [
                    'import_materials_slip_id' => $this->materialSlip['id'],
                    'material_id' => $material->id,
                    'material_code' => $material->code,
                    'material_name' => $material->name,
                    'amount' => $row['so_luong'],
                    'unit_price' => $row['don_gia_nhap'],
                    'mfg_date' => Carbon::createFromFormat('d/m/Y', $row['ngay_san_xuat']),
                    'exp_date' => Carbon::createFromFormat('d/m/Y', $row['ngay_het_han']),
                    'supplier' => $row['nha_cung_cap'],
                    'batch_name' => $row['ten_lo'],
                    'status' => $this->saveStatus,
                ]
            );
        }
    }
}
