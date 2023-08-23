<div id="import-material-slip" class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-file-import"></i>
                    {{ __('label.material.modal_title_import') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ route('admin.import_materials_slip.export') }}">
                    <i class="fas fa-download"></i>
                    <b>{{ __('label.material.download_file_template') }}</b>
                </a>
                <form method="POST" id="import-material-slip-form" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6 row justify-content-center mb-1">
                            <label class="col-sm-2 control-label" for="import_day-add">
                                {{ __('label.import_materials_slip.field.import_day') }}
                            </label>
                            <div class="col-5 col-sm-6">
                                <div class="input-group input-group-sm">
                                    <div class="input-group date datetimepicker-div" id="cal-import_day-add"
                                         data-target-input="nearest">
                                        <input type="text" class="datetimepicker-input form-control form-control-sm"
                                               id="import_day-add" name="import_day" placeholder="Ngày/tháng/năm" data-target="#cal-import_day-add">
                                        <div class="input-group-append"
                                             data-target="#cal-import_day-add" data-toggle="datetimepicker">
                                            <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <span id="import_day-import-error" class="error validate-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row justify-content-center mb-1">
                            <label class="col-sm-2 control-label" for="file">
                                {{ __('label.import_materials_slip.field.select_file') }}
                            </label>
                            <div class="col-5 col-sm-6">
                                <div class="input-group input-group-sm">
                                    <input type="file" id="file" name="file">
                                    <span id="file-import-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="status" id="status">
                    <input type="hidden" name="is_preview" id="is-preview">
                </form>
                <div id="valid-error"></div>
                <div id="import-data-content"></div>
            </div>

            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-default btn-sm margin-left-5 btn-import d-none" id="btn-draft-save">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save_draft') }}
                    </button>
                    <button class="btn btn-primary btn-sm btn-import d-none" id="btn-real-save">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-primary btn-sm" id="btn-check-import">
                        <i class="fa fa-save"></i> {{ __('label.common.button.check') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal"
                        onclick="resetMaterialElement('#add-material')">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
