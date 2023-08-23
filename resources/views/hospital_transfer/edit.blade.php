@php
    use App\Helpers\CommonHelper;
@endphp
@section('title', __('label.hospital_transfer.title_edit'))
@extends('layouts.admin')
@php
    use App\Constants\HospitalTransferConstant;
@endphp
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="color: #468ebc;">
                    <h5 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('label.hospital_transfer.title_edit') }}
                    </h5>
                </div>
                <div class="card-body">
                    <form id="edit-hospital-transfer-form">
                        @csrf()
                        <input type="hidden"
                               name="medical_session_id" value="{{$hospitalTransfer->medical_session_id}}">
                        <input type="hidden" id="id-edit" name="id" value="{{$hospitalTransfer->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        {{ __('label.hospital_transfer.field.hospital_id') }}
                                        <span class="text-red">(*)</span></label>
                                    <select class="form-control form-control-sm select2"
                                            style="width: 100%;" name="hospital_id" id="hospital_id-edit">
                                        <option value="">
                                            --- {{ __('label.hospital_transfer.field.hospital_id') }} ---
                                        </option>
                                        @foreach($hospitals as $hospital)
                                            <option
                                                @if ($hospitalTransfer->hospital_id == $hospital->id)
                                                    {{"selected"}}
                                                @endif
                                                value="{{ $hospital->id }}"
                                                {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>
                                                {{$hospital->code}} - {{$hospital->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span id="hospital_id-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="cadre_name-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.cadre_name') }}
                                    </label>
                                    <input type="text"
                                           value="{{$medical->cadre_name}}"
                                           class="form-control form-control-sm input-form"
                                           id="cadre_name-edit" name="cadre_name" disabled>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="gender-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.gender') }}
                                    </label>
                                    <input type="text"
                                           value="{{$medical->cadre_gender}}"
                                           class="form-control form-control-sm input-form"
                                           id="gender-edit" name="cadre_gender" disabled>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="age-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.age') }}</label>
                                    <input type="number"
                                           value="{{$hospitalTransfer->cadre_age}}" readonly
                                           class="form-control form-control-sm input-form"
                                           id="cadre_age-edit" name="cadre_age">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="treatment_start_date-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.treatment_start_date') }}
                                    <span class="text-red">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group date datetimepicker-div"
                                             id="cal-treatment_start_date-edit"
                                             data-target-input="nearest">
                                            <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                   value="{{old('treatment_start_date', CommonHelper::formatDate($hospitalTransfer->treatment_start_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR))}}"
                                                   id="treatment_start_date-edit" name="treatment_start_date"
                                                   placeholder="Ngày/tháng/năm"
                                                   data-target="#cal-treatment_start_date-edit">
                                            <div class="input-group-append"
                                                 data-target="#cal-treatment_start_date-edit"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text form-control-sm">
                                                    <i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <span id="treatment_start_date-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="treatment_end_date-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.treatment_end_date') }}
                                    <span class="text-red">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group date datetimepicker-div"
                                             id="cal-treatment_end_date-edit"
                                             data-target-input="nearest">
                                            <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                   value="{{old('treatment_end_date', CommonHelper::formatDate($hospitalTransfer->treatment_end_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR))}}"
                                                   id="treatment_end_date-edit" name="treatment_end_date"
                                                   placeholder="Ngày/tháng/năm"
                                                   data-target="#cal-treatment_end_date-edit">
                                            <div class="input-group-append"
                                                 data-target="#cal-treatment_end_date-edit"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text form-control-sm">
                                                    <i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <span id="treatment_end_date-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="code-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.folk') }}
                                    </label>
                                    @foreach($folks as $folk)
                                        @if($medical->cadre_folk_id == $folk->id)
                                            <input
                                                type="text"
                                                class="form-control form-control-sm input-form"
                                                id="folk-edit"
                                                name="cadre_folk"
                                                value="{{$folk->name}}" disabled>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label
                                        for="medical_insurance_start_date-edit"
                                        class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.job') }}
                                    </label>
                                    <input
                                        type="text"
                                        value="{{$medical->cadre_job ?? ''}}"
                                        class="form-control form-control-sm input-form"
                                        id="job-edit" name="cadre_job" disabled>
                                    <span id="job-edit-error"
                                          class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="cadre_work_place-edit"
                                           class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.work_place') }}
                                    </label>
                                    <input type="text"
                                           value="{{old('cadre_work_place') ?? $hospitalTransfer->cadre_work_place }}"
                                           class="form-control form-control-sm input-form"
                                           id="cadre_work_place-edit" name="cadre_work_place">
                                    <span id="cadre_work_place-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="medical_insurance_number-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.medical_insurance_number') }}
                                    </label>
                                    <input type="text"
                                           value="{{$medical->cadre_medical_insurance_number}}" disabled
                                           class="form-control form-control-sm input-form"
                                           id="medical_insurance_number-edit" name="medical_insurance_number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="medical_insurance_start_date-edit"
                                           class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.medical_insurance_start_date') }}
                                    </label>
                                    <input type="text"
                                           value="{{ CommonHelper::formatDate($medical->cadre_medical_insurance_start_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}" disabled
                                           class="form-control form-control-sm input-form"
                                           id="medical_insurance_start_date-edit" name="medical_insurance_start_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="medical_insurance_end_date-edit"
                                           class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.medical_insurance_end_date') }}
                                    </label>
                                    <input type="text"
                                           value="{{ CommonHelper::formatDate($medical->cadre_medical_insurance_end_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}" disabled
                                           class="form-control form-control-sm input-form"
                                           id="medical_insurance_end_date-edit" name="medical_insurance_end_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.clinical_signs') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea class="form-control form-control-sm"
                                              id="clinical_signs-edit"
                                              name="clinical_signs">{{old('clinical_signs', $hospitalTransfer->clinical_signs)}}</textarea>
                                    <span id="clinical_signs-edit-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="subclinical_results-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.subclinical_results') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="subclinical_results-edit"
                                        name="subclinical_results">{{old('subclinical_results', $hospitalTransfer->subclinical_results)}}</textarea>
                                    <span id="subclinical_results-edit-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="diagnose-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.diagnose') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="diagnose-edit"
                                        name="diagnose">{{old('diagnose', $hospitalTransfer->diagnose)}}</textarea>
                                    <span id="diagnose-edit-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="treatment_methods-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.treatment_methods') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="treatment_methods-edit"
                                        name="treatment_methods">{{old('treatment_methods', $hospitalTransfer->treatment_methods)}}</textarea>
                                    <span id="treatment_methods-edit-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="patient_status-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.patient_status') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="patient_status-edit"
                                        name="patient_status">{{old('patient_status', $hospitalTransfer->patient_status)}}</textarea>
                                    <span id="patient_status-edit-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <div class="form-group form-group-sm">
                                            <label for="transit_times-edit" class="col-form-label ">
                                                {{ __('label.hospital_transfer.field.transit_times') }}
                                            <span class="text-red">(*)</span></label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group date datetimepicker-div"
                                                     id="cal-transit_times-edit"
                                                     data-target-input="nearest">
                                                    <input type="text"
                                                           class="datetimepicker-input form-control form-control-sm"
                                                           value="{{old('transit_times', CommonHelper::formatDate($hospitalTransfer->transit_times, YEAR_MONTH_DAY, DAY_MONTH_YEAR))}}"
                                                           id="transit_times-edit" name="transit_times"
                                                           placeholder="Ngày/tháng/năm"
                                                           data-target="#cal-transit_times-edit">
                                                    <div class="input-group-append"
                                                         data-target="#cal-transit_times-edit"
                                                         data-toggle="datetimepicker">
                                                        <div class="input-group-text form-control-sm">
                                                            <i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span id="transit_times-edit-error" class="error validate-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="reasons-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.reasons') }}
                                    <span class="text-red">(*)</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio" name="reasons" id="reasons-edit-1"
                                               value="{{HospitalTransferConstant::REASON_1}}"
                                            {{(old('reasons', $hospitalTransfer->reasons) == HospitalTransferConstant::REASON_1 ? 'checked' : '') }}
                                        />
                                        <label class="form-check-label" for="reasons-edit-1">
                                            {{HospitalTransferConstant::REASON_TEXT[HospitalTransferConstant::REASON_1]}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio" name="reasons" id="reasons-edit-2"
                                               value="{{HospitalTransferConstant::REASON_2}}"
                                            {{(old('reasons', $hospitalTransfer->reasons) == HospitalTransferConstant::REASON_2 ? 'checked' : '') }}
                                        />
                                        <label class="form-check-label" for="reasons-edit-2">
                                            {{HospitalTransferConstant::REASON_TEXT[HospitalTransferConstant::REASON_2]}}
                                        </label>
                                    </div>
                                    <span id="reasons-edit-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="treatment_directions-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.treatment_directions') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="treatment_directions-edit"
                                        name="treatment_directions">{{old('treatment_directions', $hospitalTransfer->treatment_directions )}}</textarea>
                                    <span id="treatment_directions-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="transportations-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.transportations') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="transportations-edit"
                                        name="transportations">{{old('transportations' ,$hospitalTransfer->transportations)}}</textarea>
                                    <span id="transportations-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-sm">
                                    <label for="escort_information-edit" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.escort_information') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="escort_information-edit"
                                        name="escort_information">{{old('escort_information', $hospitalTransfer->escort_information)}}</textarea>
                                    <span id="escort_information-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer">
                        <button class="btn btn-success btn-sm btn-edit">
                            <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                        </button>
                        <a style="margin-left: 10px;"
                           class="btn btn-primary btn-sm margin-top-5 text-left"
                           href="{{route('admin.index.hospital_transfer')}}"><i class="fas fa-undo"></i> Quay lại</a>
                    </div>
                </div><!-- End Card body -->
            </div>
            <!-- Card-end -->
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 18px;
            padding: 5px;
        }
        .select2-container--default .select2-selection--single {
            height: calc(2.25rem + 2px);
            border-radius: 0.2rem;
            border: 1px solid #ced4da;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $('.loading').hide()
        const API_UPDATE = "{{route('admin.update.hospital_transfer', ":id")}}";
        $(document).on("click", ".btn-edit", function () {
            let id = $('#id-edit').val();
            let data = {
                id: id,
                hospital_id: $('#hospital_id-edit').val(),
                cadre_age: $('#cadre_age-edit').val(),
                cadre_work_place: $('#cadre_work_place-edit').val(),
                treatment_start_date: $('#treatment_start_date-edit').val(),
                treatment_end_date: $('#treatment_end_date-edit').val(),
                clinical_signs: $('#clinical_signs-edit').val(),
                subclinical_results: $('#subclinical_results-edit').val(),
                diagnose: $('#diagnose-edit').val(),
                treatment_methods: $('#treatment_methods-edit').val(),
                patient_status: $('#patient_status-edit').val(),
                reasons: $('input[name="reasons"]:checked').val(),
                treatment_directions: $('#treatment_directions-edit').val(),
                transit_times: $('#transit_times-edit').val(),
                transportations: $('#transportations-edit').val(),
                escort_information: $('#escort_information-edit').val(),
            };
            var api = API_UPDATE;
            hideMessageValidate('#edit-hospital-transfer-form');
            api = api.replace(":id", id);
            createOrUpdate(api, data, nextEditHospitalTransfer);
        });

        function nextEditHospitalTransfer(data) {
            if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
                showMessageValidate('edit', data.errors);
            } else {
                hideMessageValidate('#edit-hospital-transfer-form');
                swal(data.message, "", "success");
            }
        }
    </script>
@endpush

