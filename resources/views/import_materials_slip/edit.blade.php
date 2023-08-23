@php
    use App\Helpers\CommonHelper;
@endphp
@extends('layouts.admin')
@section('title', __('label.import_materials_slip.title_edit'))
@section('content-header')
    @include('elements.import_materials_slip.edit.content-header')
@endsection
@section('content')
    @include('elements.material.add')
    <input type="hidden" id="type-import-materials-slip" value="edit">
    <form id="import-materials-slip-form">
        @csrf
        <div class="col-sm-12">
            <div class="row justify-content-center mt-3 mb-2">
                <label class="col-sm-2 col-md-2 col-lg-1 control-label" for="import_day">
                    {{ __('label.import_materials_slip.field.import_day') }} <span class="text-red">(*)</span>
                </label>
                <div class="col-sm-3 col-md-2">
                    <div class="input-group input-group-sm">
                        <input type="hidden" class="form-control form-control-sm" id="id-import-material-slip"
                               name="id" value="{{ $importMaterialSlip->id }}">
                        <div class="input-group date datetimepicker-div" id="cal-import_day"
                             data-target-input="nearest">
                            <input type="text" class="datetimepicker-input form-control form-control-sm" value="{{ $importMaterialSlip->import_day }}"
                                   id="import_day" name="import_day" placeholder="Ngày/tháng/năm" data-target="#cal-import_day">
                            <div class="input-group-append"
                                 data-target="#cal-import_day" data-toggle="datetimepicker">
                                <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <span id="import_day-error" class="error validate-error"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table-material"
                                           class="table table-bordered dataTable dtr-inline table-striped"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th class="dt-center w-3 ordinal-number"
                                                data-column-name="id" id="ordinal-number">
                                                {{ __("label.common.field.ordinal_number")}}
                                            </th>
                                            <th class="dt-center">
                                                {{ __('label.import_materials_slip.add.field.material_name') }}
                                                <span class="text-red">(*)</span>
                                            </th>
                                            <th class="dt-center w-12">
                                       {{ __('label.import_materials_slip.add.field.material_insurance_code') }}
                                            </th>
                                            <th class="dt-center w-8">
                                                {{ __('label.import_materials_slip.add.field.material_amount') }}
                                                <span class="text-red">(*)</span>
                                            </th>
                                            <th class="dt-center w-10">
                                                {{ __('label.import_materials_slip.add.field.material_unit_price') }}
                                                <span class="text-red">(*)</span>
                                            </th>
                                            <th class="dt-center w-11">
                                                {{ __('label.import_materials_slip.add.field.material_mfg_date') }}
                                                <span class="text-red">(*)</span>
                                            </th>
                                            <th class="dt-center w-11">
                                                {{ __('label.import_materials_slip.add.field.material_exp_date') }}
                                                <span class="text-red">(*)</span>
                                            </th>
                                            <th class="dt-center w-12">
                                                {{ __('label.import_materials_slip.add.field.material_supplier') }}
                                            </th>
                                            <th class="dt-center w-10">
                                                {{ __('label.import_materials_slip.add.field.material_batch_name') }}
                                                <span class="text-red">(*)</span>
                                            </th>
                                            <th class="dt-center w-6">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($materialBatchs as $key => $materialBatch)
                                            <tr class="odd">
                                                <td class="dt-center order-material">{{$key + 1}}</td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm material-name-input"
                                                           name="material[{{$key}}][name]" id="material_name_{{$key}}"
                                                           autocomplete="off"
                                                           value="{{$materialBatch->material->name ?? ""}}">
                                                    <div class="suggest-parent-dropdown">
                                                        <div class="material-list-suggest suggestion-dropdown"></div>
                                                    </div>
                                                    <input type="hidden" class="form-control form-control-sm material-batch-id"
                                                           name="material[{{$key}}][material_batch_id]"
                                                           value="{{$materialBatch->id}}">
                                                    <input type="hidden" class="form-control form-control-sm material-id-input"
                                                           name="material[{{$key}}][material_id]"
                                                           id="material_id_{{$key}}"
                                                            value="{{$materialBatch->material_id}}">
                                                    <span id="material.{{$key}}.name-error"
                                                          class="error validate-error
                                                          validate-error-material_name"></span>
                                                    <span id="material.{{$key}}.material_id-error"
                                                          class="error validate-error"></span>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm
                                                    material-code-input" id="material-code-{{$key}}"
                                                     value="{{$materialBatch->material->code ?? ""}}" disabled>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm number-integer-validate"
                                                           name="material[{{$key}}][amount]"
                                                           id="material-amount-{{$key}}"
                                                           value="{{$materialBatch->amount}}">
                                                    <span id="material.{{$key}}.amount-error"
                                                          class="error validate-error"></span>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm number-integer-validate"
                                                           name="material[{{$key}}][unit_price]"
                                                           id="material-unit_price-{{$key}}"
                                                           value="{{$materialBatch->unit_price}}">
                                                    <span id="material.{{$key}}.unit_price-error"
                                                          class="error validate-error"></span>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group date datetimepicker-div" id="cal-mfg_date-{{$key}}"
                                                             data-target-input="nearest">
                                                            <input type="text" class="datetimepicker-input form-control form-control-sm" value="{{ CommonHelper::formatDate($materialBatch->mfg_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}"
                                                                   name="material[{{$key}}][mfg_date]" id="material-mfg_date-{{$key}}" placeholder="Ngày/tháng/năm" data-target="#cal-mfg_date-{{$key}}">
                                                            <div class="input-group-append"
                                                                 data-target="#cal-mfg_date-{{$key}}" data-toggle="datetimepicker">
                                                                <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                        <span id="material.{{$key}}.mfg_date-error" class="error validate-error"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group date datetimepicker-div" id="cal-exp_date-{{$key}}"
                                                             data-target-input="nearest">
                                                            <input type="text" class="datetimepicker-input form-control form-control-sm" value="{{ CommonHelper::formatDate($materialBatch->exp_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}"
                                                                   name="material[{{$key}}][exp_date]" id="material-exp_date-{{$key}}" placeholder="Ngày/tháng/năm" data-target="#cal-exp_date-{{$key}}">
                                                            <div class="input-group-append"
                                                                 data-target="#cal-exp_date-{{$key}}" data-toggle="datetimepicker">
                                                                <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                        <span id="material.{{$key}}.exp_date-error" class="error validate-error"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm"
                                                           name="material[{{$key}}][supplier]"
                                                           id="material-supplier-{{$key}}"
                                                           value="{{$materialBatch->supplier}}">
                                                    <span id="material.{{$key}}.supplier-error"
                                                          class="error validate-error"></span>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm"
                                                           name="material[{{$key}}][batch_name]"
                                                           id="material-batch_name-{{$key}}"
                                                           value="{{$materialBatch->batch_name}}">
                                                    <span id="material.{{$key}}.batch_name-error"
                                                          class="error validate-error"></span>
                                                </td>
                                                <td class="dt-center">
                                                    <a class="btn btn-default btn-sm add-material">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                    <a class="btn btn-default btn-sm remove-material">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-md-12 no-padding text-center">
                                <button type="button" class="btn btn-secondary btn-sm mr-1
                                 save-draft-import-material-slip" data-type="draft">
                                    <i class="fa fa-save"></i> {{ __('label.common.button.save_draft') }}
                                </button>
                                <button type="button" class="btn btn-primary btn-sm mr-1
                                 save-real-import-material-slip">
                                    <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                                </button>
                                <a class="btn btn-danger btn-sm" style="width: 83px;"
                                   href="{{ route('admin.import_materials_slip.index') }}">
                                    <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script>
        const API_LIST_IMPORT_MATERIALS_SLIP = "{{ route('admin.import_materials_slip.index') }}";
        const API_EDIT_IMPORT_MATERIALS_SLIP = "{{ route('admin.import_materials_slip.edit') }}";
        const API_CREATE_MATERIAL = "{{ route('admin.create.material') }}";
        const API_SUGGEST_MATERIAL = "{{ route('admin.suggest.medicine_of_medical_session') }}";
        const API_DETAIL_MATERIAL = "{{ route('admin.suggest.material.detail', ':id') }}";
    </script>
    <script src="{{ asset('js/pages/import_materials_slip/common_add_edit.js') }}"></script>
@endpush
