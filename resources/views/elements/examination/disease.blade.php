<div id="disease_of_medical_session">
    <div class="row">
        <div class="col-12">
            <div class="card m-2">
                <div class="card-body">
                    <div class="row mb-7">
                        <div class="col-auto d-flex align-items-center">
                            <h4 class="m-0 h4-fw">{{ __('label.disease_of_medical_session.title') }}</h4>
                        </div>
                    </div>
                    <div id="add-cadres-form">
                        @csrf
                        <form class="row list-disease">
                            <input type="hidden" id="medical_session_id" value="{{$medical_session_id}}">
                            <div class="col-md-6">
                                <div class="form-group" id="validate_div_2">
                                    <label for="disease_name" class="col-form-label col-form-label-fz">
                                        {{ __('label.disease_of_medical_session.field.main_disease_name') }}
                                        <span class="text-red">(*)</span>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" {{$isDisable ?? ""}}
                                            id="main_disease_name" name="disease_name" autocomplete="off">
                                    <input type="hidden" class="form-control form-control-sm"
                                            id="main_disease_code" name="main_disease_code">
                                    <input type="hidden" class="form-control form-control-sm"
                                            id="main_id" name="main_id">
                                    <div id="main_disease_name-list-suggest" class="list-suggest"></div>
                                    <p id="main_disease_code-save-error" class="error validate-error"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="disease_name" class="col-form-label col-form-label-fz">
                                        {{ __('label.disease_of_medical_session.field.side_disease_name') }}
                                    </label>
                                    <input type="text" class="form-control form-control-sm" {{$isDisable ?? ""}}
                                            id="side_disease_name" name="disease_name" autocomplete="off">
                                    <input type="hidden" class="form-control form-control-sm"
                                            id="side_disease_code" name="side_disease_code">
                                    <input type="hidden" class="form-control form-control-sm"
                                            id="side_id" name="side_id">
                                    <div id="side_disease_name-list-suggest" class="list-suggest"></div>
                                    <p id="disease_name-error" class="error validate-error"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        const API_SUGGEST_DISEASE_NAME = "{{ route('admin.medical_session.disease.suggest.disease') }}";
        const API_CREATE_OR_UPDATE_DISEASE = "{{ route('admin.medical_session.disease.create_or_update') }}";
        const API_GET_DISEASES = "{{ route('admin.medical_session.disease.list') }}";
    </script>
    <script src="{{ asset('js/pages/disease-of-medical-session.js') }}"></script>
@endpush

