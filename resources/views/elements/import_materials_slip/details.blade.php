@php
    use App\Helpers\CommonHelper;
@endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <strong>
                                {{ __('label.import_materials_slip.field.import_day') }}
                            </strong>: {{ $importMaterialSlip->import_day }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table-material"
                                   class="table table-striped dataTable dtr-inline table-striped"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr>
                                    <th class="dt-center w-3 ordinal-number"
                                        data-column-name="id" id="ordinal-number">
                                        {{ __("label.common.field.ordinal_number")}}
                                    </th>
                                    <th class="dt-center">
                                        {{ __('label.import_materials_slip.add.field.material_name') }}
                                    </th>
                                    <th class="dt-center w-10">
                                        {{ __('label.import_materials_slip.add.field.material_insurance_code') }}
                                    </th>
                                    <th class="dt-center w-8">
                                        {{ __('label.import_materials_slip.add.field.material_amount') }}
                                    </th>
                                    <th class="dt-center w-12">
                                        {{ __('label.import_materials_slip.add.field.material_unit_price') }}
                                    </th>
                                    <th class="dt-center w-12">
                                        {{ __('label.import_materials_slip.add.field.material_mfg_date') }}
                                    </th>
                                    <th class="dt-center w-10">
                                        {{ __('label.import_materials_slip.add.field.material_exp_date') }}
                                    </th>
                                    <th class="dt-center w-12">
                                        {{ __('label.import_materials_slip.add.field.material_supplier') }}
                                    </th>
                                    <th class="dt-center w-10">
                                        {{ __('label.import_materials_slip.add.field.material_batch_name') }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($materialBatchs as $key => $materialBatch)
                                    <tr class="odd">
                                        <td class="dt-center">{{$key + 1}}</td>
                                        <td class="word-break">
                                            {{ $materialBatch->material_name }}
                                        </td>
                                        <td>
                                            {{ $materialBatch->material_code }}
                                        </td>
                                        <td>
                                            {{ \App\Helpers\NumberFormatHelper::priceFormat($materialBatch->amount) }}
                                        </td>
                                        <td>
                                            {{ \App\Helpers\NumberFormatHelper::priceFormat($materialBatch->unit_price) }}
                                        </td>
                                        <td>
                                            {{ CommonHelper::formatDate($materialBatch->mfg_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
                                        </td>
                                        <td>
                                            {{ CommonHelper::formatDate($materialBatch->exp_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
                                        </td>
                                        <td>
                                            {{ $materialBatch->supplier }}
                                        </td>
                                        <td>
                                            {{ $materialBatch->batch_name }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
