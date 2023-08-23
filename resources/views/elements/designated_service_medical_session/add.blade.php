<div id="add-designated-service-medical-session"
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
                    {{ __('title.designated_service_medical_session_create_page') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-designated-service-medical-session-form" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <div class="form-group form-group-sm">
                                <label for="designated_service_id" class="col-form-label col-form-label-sm">
                                    {{ __('label.designated_service_medical_session.designated_service_id') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm select2"
                                        id="designated_service_id"
                                        name="designated_service_id"
                                >
                                    <option value="">--- Chọn dịch vụ ---</option>
                                    @if (!$designatedService->isEmpty($designatedService))
                                        @foreach ($designatedService as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span id="designated_service_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="designated_service_amount" class="col-form-label col-form-label-sm">
                                    {{ __('label.designated_service_medical_session.designated_service_amount') }}
                                </label>
                                <input type="number" class="form-control form-control-sm number-integer-validate"
                                       id="designated_service_amount-add"
                                       name="designated_service_amount"
                                       value="1"
                                >
                                <span id="designated_service_amount-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm">
                                <label for="description" class="col-form-label col-form-label-sm">
                                    {{ __('label.designated_service_medical_session.description') }}
                                </label>
                                <textarea class="form-control input-form"
                                          id="description-add"
                                          name="description"
                                          rows="2"
                                ></textarea>
                                <span id="description-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-primary btn-sm add-dsms">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-default margin-left-5 reset"
                            onclick="resetDesignatedServiceMedicalSessionForm('#add-designated-service-medical-session')"
                    >
                        <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel"
                        data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
