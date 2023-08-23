<?php

namespace App\Exports;

use App\Services\MaterialService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MaterialSlipExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function headings(): array
    {
        return [
            'STT',
            'Mã thuốc, vật tư',
            'Tên thuốc, vật tư (*)',
            'Tên ánh xạ',
            'Loại (*)',
            'Tên hoạt chất',
            'Hàm lượng',
            'Dạng bào chế',
            'Phân loại',
            'Đơn vị (*)',
            'Thành phần',
            'Mã bảo hiểm',
            'Giá BH (VND)',
            'Giá DV (VND)',
            'Loại bệnh',
            'Đường dùng (*)',
            'Cách dùng (*)',
            'Số lượng (*)',
            'Đơn giá nhập (*)',
            'Ngày sản xuất (*)',
            'Ngày hết hạn (*)',
            'Nhà cung cấp',
            'Tên lô (*)'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $materialService = app(MaterialService::class);

        return $materialService->listDataExport();
    }
}
