<div id="add-medicine-of-medical-session" class="modal fade bd-example-modal-lg" tabindex="-1"
    aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.medicine_of_medical_session.modal_title_add') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-medicine-of-medical-session-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group suggest-parent-dropdown">
                                <label for="materials_name-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.medicine_of_medical_session.field.materials_name') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="materials_name-add"
                                 autocomplete="off"
                                    name="materials_name">
                                <div class="suggestion-dropdown" id="material-list-suggest-add"
                                    style="display: none;">
                            </div>
                                <span id="materials_name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="materials_amount-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.medicine_of_medical_session.field.materials_amount') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="number" class="form-control form-control-sm number-validate"
                                    id="materials_amount-add" name="materials_amount">
                                <span id="materials_amount-add-error" class="error validate-error"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="materials_usage-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.medicine_of_medical_session.field.materials_usage') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    id="materials_usage-add" name="materials_usage">
                                <span id="materials_usage-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="advice-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.medicine_of_medical_session.field.advice') }}
                                </label>
                                <textarea class="form-control form-control-sm" rows="5" id="advice-add" name="advice">
                                </textarea>
                                <span id="advice-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="type" id="type-medicine-of-medical-session" value="">
                    <input type="hidden" name="material_id" id="material-id-hidden-add" value="">
                    <input type="hidden" name="medical_session_id" id="medical_session_id-hidden-add"
                        value="{{ $medicalSessionId }}">
                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-primary btn-sm add">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-default margin-left-5 reset"
                        onclick="resetMedicineOfMedicalSessionElement('#add-medicine-of-medical-session')">
                        <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal"
                        onclick="resetMedicineOfMedicalSessionElement('#add-medicine-of-medical-session')">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('css')
<style>
    .btn-medicine-of-medical-session-heading{
        color: #212529;
        font-size: 24px;
        margin-left: 20px;
    }
    .btn-action-examination{
        transform: scale(0.8);
        border-radius: 0.2rem !important;
        margin-right: 5px !important;
    }
    .btn-action-delete-medicine
    {
        transform: scale(0.8);
        border-radius: 0.2rem;
    }
</style>
@endpush
