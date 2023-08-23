<div id="add-health-insurance-card" class="modal fade bd-example-modal-lg"
     tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.health_insurance_card_head.modal_title_add') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-health-insurance-card-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.health_insurance_card_head.field.code') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm" id="code-add" name="code">
                                    <option value="">--- {{ __('label.health_insurance_card_head.choose_code') }} ---</option>
                                    @foreach(HEALTH_INSURANCE_CARD_CODE as $code)
                                        <option value="{{ $code }}">{{ $code }}</option>
                                    @endforeach
                                </select>
                                <span id="code-add-error" class="error validate-error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount_right_line-add"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.health_insurance_card_head.field.discount_right_line') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="number" class="form-control form-control-sm number-validate"
                                    id="discount_right_line-add" name="discount_right_line">
                                <span id="discount_right_line-add-error" class="error validate-error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount_opposite_line-add"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.health_insurance_card_head.field.discount_opposite_line') }}
                                </label>
                                <input type="number" class="form-control form-control-sm number-validate"
                                    id="discount_opposite_line-add" name="discount_opposite_line">
                                <span id="discount_opposite_line-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-primary btn-sm add">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-default margin-left-5 reset"
                         onclick="resetHealthInsuranceCardElement('#add-health-insurance-card')">
                        <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal"
                        onclick="resetHealthInsuranceCardElement('#add-health-insurance-card')">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

