<div id="add-examination_type"
     class="modal fade bd-example-modal-lg"
     tabindex="-1"
     aria-labelledby="myLargeModalLabel"
     style="display: none;"
     aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('title.examination_type_create_page') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-examination_type-form" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group form-group-sm">
                                <label for="name" class="col-form-label col-form-label-sm">
                                    {{ __('label.examination_type.name') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="name-add"
                                       name="name">
                                <span id="name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="code" class="col-form-label col-form-label-sm">
                                    {{ __('label.designated_service.field.insurance_unit_price') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="number"
                                       class="form-control form-control-sm input-form number-validate"
                                       id="insurance_unit_price-add"
                                       name="insurance_unit_price">
                                <span id="insurance_unit_price-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="type" class="col-form-label col-form-label-sm">
                                    {{ __('label.designated_service.field.service_unit_price') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="number"
                                       class="form-control form-control-sm input-form number-validate"
                                       id="service_unit_price-add"
                                       name="service_unit_price">
                                <span id="service_unit_price-add-error" class="error validate-error"></span>
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
                        onclick="resetForm('#add-examination_type')">
                        <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
