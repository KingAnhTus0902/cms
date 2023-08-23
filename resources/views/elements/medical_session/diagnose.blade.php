<div id="diagnose-list">
    <div class="row">
        <div class="col-12">
            <div class="card m-2">
                <div class="card-body">
                    <div class="row mb-20">
                        <div class="col-auto d-flex align-items-center">
                            <h4 class="m-0 h4-fw">{{ __('label.medical_session.field.diagnose') }}
                                <span class="text-red text-md">(*)</span>
                            </h4>
                        </div>
                    </div>
                    <div class="dataTables_wrapper dt-bootstrap4" id="validate_div">
                        <textarea class="form-control diagnose"
                                  name="diagnose" id="main_diagnose" {{$isDisable ?? ""}}
                                  data-url="{{ route('admin.medical_session.diagnose', $medicalSession->id) }}"
                        >{{ $medicalSession->diagnose }}</textarea>
                        <p id="diagnose-save-error" class="error validate-error"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
