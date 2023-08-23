<div id="edit-medicine-of-medical-session" class="modal fade bd-example-modal-lg" tabindex="-1"
    aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.medicine_of_medical_session.modal_title_edit') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-medicine-of-medical-session-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group suggest-parent-dropdown">
                                <label for="materials_name-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.medicine_of_medical_session.field.materials_name') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="materials_name-edit"
                                    name="materials_name">
                                <div class="suggestion-dropdown" id="material-list-suggest-edit"
                                    style="display: none;">
                                </div>
                                <span id="materials_name-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="materials_amount-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.medicine_of_medical_session.field.materials_amount') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="number" class="form-control form-control-sm number-validate"
                                    id="materials_amount-edit" name="materials_amount">
                                <span id="materials_amount-edit-error" class="error validate-error"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="materials_usage-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.medicine_of_medical_session.field.materials_usage') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    id="materials_usage-edit" name="materials_usage">
                                <span id="materials_usage-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="advice-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.medicine_of_medical_session.field.advice') }}
                                </label>
                                <textarea class="form-control form-control-sm" rows="5" id="advice-edit" name="advice">
                                </textarea>
                                <span id="advice-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="material_id" id="material-id-hidden-edit" value="">
                    <input type="hidden" name="medical_session_id" id="medical_session_id-hidden-edit"
                        value="{{ request()->route()->parameter('id') }}">

                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-primary btn-sm edit-medicine-of-medical-session">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
