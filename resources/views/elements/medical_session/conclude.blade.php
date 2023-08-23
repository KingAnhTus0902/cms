<div id="diagnose-list">
    <div class="row">
        <div class="col-12">
            <div class="card m-2">
                <div class="card-body">
                    <div class="row mb-20">
                        <div class="col-auto d-flex align-items-center">
                            <h4 class="m-0 h4-fw">{{ __('label.medical_session.field.conclude') }}
                                <span class="text-red text-md">(*)</span>
                            </h4>
                        </div>
                    </div>
                    <div class="dataTables_wrapper dt-bootstrap4" id="validate_div_1">
                        <textarea class="form-control conclude"
                                  name="conclude" id="main_conclude" {{$isDisable ?? ""}}
                                  data-url="{{ route('admin.medical_session.conclude', $medicalSession->id) }}"
                        >{{ $medicalSession->conclude }}</textarea>
                        <p id="conclude-save-error" class="error validate-error"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
