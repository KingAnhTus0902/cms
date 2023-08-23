@php
    use App\Constants\ImportMaterialsSlipConstants;
@endphp
<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{__('label.import_materials_slip.title')}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 block-button-add">
            <button type="button" class="btn btn-primary open-import-material-slip-modal"
                    data-toggle="modal" data-target="#import-material-slip"
                    title="{{ __('label.import_materials_slip.button.title.open_upload_file') }}">
                <i class="fas fa-upload mr-2"></i>{{ __('label.import_materials_slip.button.import_file') }}
            </button>
            <a type="button" class="btn btn-success open-add-medical-session-modal"
               href="{{route('admin.import_materials_slip.create')}}"
                    title="{{ __('label.import_materials_slip.button.title.open_modal_add') }}">
                <i class="fas fa-plus mr-2"></i>{{ __('label.common.button.open_add_modal') }}
            </a>
        </div>
    </div>
</div>
<div class="card-body" style="display: none;">
    <form id="search-master-form">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-time">
                        {{ __('label.import_materials_slip.search.title.import_day') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <div class="input-group date" id="cal-import_day"
                                    data-target-input="nearest">
                                <input type="text" class="form-control form-control-sm"
                                        id="input-search-import_day" placeholder="Ngày/tháng/năm">
                                <div class="input-group-append"
                                        data-target="#cal-import_day" data-toggle="datetimepicker">
                                    <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <input type="hidden" id="input-search-import_day-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-status">
                        {{ __('label.import_materials_slip.search.title.status') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2" style="width: 100%;" id="input-search-status">
                                <option value="">
                                    --- {{ __('label.import_materials_slip.search.placeholder.status') }} ---
                                </option>
                                <option value="{{ ImportMaterialsSlipConstants::STATUS_DRAFT }}">
                                    {{ __('label.import_materials_slip.status.draft') }}
                                </option>
                                <option value="{{ ImportMaterialsSlipConstants::STATUS_SAVE }}">
                                    {{ __('label.import_materials_slip.status.save') }}
                                </option>
                            </select>
                            <input type="hidden" id="input-search-status-hidden" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-md-2">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-user_name">
                        {{ __('label.import_materials_slip.search.title.user_import') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="input-search-user_name"
                                placeholder="{{ __('label.import_materials_slip.search.placeholder.user_import') }}">
                            <input type="hidden" id="input-search-user_name-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center"></div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1 block-button-card-outline">
            <div class="btn-group pull-left">
                <button class="btn btn-info submit" id="search-import_materials_slip">
                    <i class="fa fa-search"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.search') }}
                </button>
            </div>
            <div class="btn-group pull-left undo-card-outline">
                <button class="btn btn-default" onclick="resetFormImportMaterialsSlip('#search-master-form')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
