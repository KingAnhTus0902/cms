@php
    use App\Helpers\NumberFormatHelper;
@endphp

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    @if (count($rows) > 0)
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table id="example2"
                                    class="th-center table table-striped table-hover dataTable dtr-inline"
                                    aria-describedby="example2_info">
                                    <thead>
                                        <tr>
                                            <th class="dt-center ordinal-number" data-column-name="id"
                                                id="ordinal-number-material">
                                                {{ __('label.material.field.no') }}
                                            </th>
                                            <th class="dt-center min-w-150px">
                                                {{ __('label.material.field.code') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.name') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.mapping_name') }}
                                            </th>
                                            <th class="dt-center min-w-100px">
                                                {{ __('label.material.field.type') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.active_ingredient_name') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.content') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.dosage_form') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.material_type_id') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.unit_id') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.ingredients') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.insurance_code') }}
                                            </th>
                                            <th class="dt-center min-w-100px">
                                                {{ __('label.material.field.insurance_unit_price') }}
                                            </th>
                                            <th class="dt-center min-w-100px">
                                                {{ __('label.material.field.service_unit_price') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.disease_type') }}
                                            </th>
                                            <th class="dt-center min-w-100px">
                                                {{ __('label.material.field.method') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.field.usage') }}
                                            </th>
                                            <th class="dt-center min-w-100px">
                                                {{ __('label.material.field.amount') }}
                                            </th>
                                            <th class="dt-center min-w-100px">
                                                {{ __('label.material.detail_field.unit_price') }}
                                            </th>
                                            <th class="dt-center min-w-100px">
                                                {{ __('label.material.detail_field.mfg_date') }}
                                            </th>
                                            <th class="dt-center min-w-100px">
                                                {{ __('label.material.detail_field.exp_date') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.detail_field.supplier') }}
                                            </th>
                                            <th class="dt-center min-w-200px">
                                                {{ __('label.material.detail_field.batch_name') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rows as $key => $row)
                                            <tr class="odd">
                                                <td class="dt-center">{{ $row['stt'] }}</td>
                                                <td class="word-break">{{ $row['ma_thuoc_vat_tu'] }}</td>
                                                <td class="word-break">
                                                    {{ $row['ten_thuoc_vat_tu'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['ten_anh_xa'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['loai'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['ten_hoat_chat'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['ham_luong'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['dang_bao_che'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['phan_loai'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['don_vi'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['thanh_phan'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['ma_bao_hiem'] }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ NumberFormatHelper::priceFormat($row['gia_bh_vnd']) }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ NumberFormatHelper::priceFormat($row['gia_dv_vnd']) }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['loai_benh'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['duong_dung'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['cach_dung'] }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ number_format($row['so_luong']) }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ NumberFormatHelper::priceFormat($row['don_gia_nhap']) }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ $row['ngay_san_xuat'] }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ $row['ngay_het_han'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['nha_cung_cap'] }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $row['ten_lo'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <p>{{ __('messages.EM-001') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
