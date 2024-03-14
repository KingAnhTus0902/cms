@section('title', __('label.hospital_transfer.title_add'))
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
                        {{ __('label.hospital_transfer.title_add') }}
                    </h5>
                </div>
                <div class="card-body">
                    <form id="add-hospital-transfer-form">
                        {{ csrf_field() }}
                        <input type="hidden" id="id-edit" name="id">
                        <input type="hidden" name="medical_session_id" value="{{$medical->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        {{ __('label.hospital_transfer.field.hospital_id') }}
                                        <span class="text-red">(*)</span></label>
                                    <select class="form-control form-control-sm select2"
                                            style="width: 100%;" name="hospital_id" id="hospital_id-add" >
                                        <option value="{{old('hospital_id')}}">
                                            --- {{ __('label.hospital_transfer.field.hospital_id') }} ---
                                        </option>
                                            @foreach($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}">
                                                    {{ $hospital->code }} - {{ $hospital->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                    <span id="hospital_id-add-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="cadre_name-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.cadre_name') }}
                                    </label>
                                    <input type="text"
                                           value="{{$medical->cadre_name}}"
                                           class="form-control form-control-sm input-form"
                                           id="cadre_name-add" name="cadre_name" disabled>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="gender-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.gender') }}
                                    </label>
                                    <input type="text"
                                           value="{{$medical->cadre_gender}}"
                                           class="form-control form-control-sm input-form"
                                           id="gender-add" name="cadre_gender" disabled>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="age-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.age') }}
                                    </label>
                                    <input type="number"
                                           value="{{$medical->cadre_age ?? old('cadre_age')}}" readonly
                                           class="form-control form-control-sm input-form"
                                           id="cadre_age-add" name="cadre_age">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="treatment_start_date-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.treatment_start_date') }}
                                    <span class="text-red">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group date datetimepicker-div"
                                             id="cal-treatment_start_date-add"
                                             data-target-input="nearest">
                                            <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                   id="treatment_start_date-add" name="treatment_start_date"
                                                   placeholder="Ngày/tháng/năm"
                                                   data-target="#cal-treatment_start_date-add">
                                            <div class="input-group-append"
                                                 data-target="#cal-treatment_start_date-add" data-toggle="datetimepicker">
                                                <div class="input-group-text form-control-sm">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span id="treatment_start_date-add-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="treatment_end_date-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.treatment_end_date') }}
                                    <span class="text-red">(*)</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group date datetimepicker-div" id="cal-treatment_end_date-add"
                                             data-target-input="nearest">
                                            <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                   id="treatment_end_date-add" name="treatment_end_date"
                                                   placeholder="Ngày/tháng/năm"
                                                   data-target="#cal-treatment_end_date-add">
                                            <div class="input-group-append"
                                                 data-target="#cal-treatment_end_date-add" data-toggle="datetimepicker">
                                                <div class="input-group-text form-control-sm">
                                                    <i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <span id="treatment_end_date-add-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="code-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.folk') }}
                                    </label>
                                    @foreach($folks as $folk)
                                        @if($medical->cadre_folk_id == $folk->id)
                                            <input
                                                type="text"
                                                class="form-control form-control-sm input-form"
                                                id="folk-add"
                                                name="cadre_folk"
                                                value="{{$folk->name}}" disabled>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label
                                        for="job-add"
                                        class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.job') }}
                                    </label>
                                    <input
                                        type="text"
                                        value="{{$medical->cadre_job ?? ''}}"
                                        class="form-control form-control-sm input-form"
                                        id="job-add" name="cadre_job" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-sm">
                                    <label for="cadre_work_place-add"
                                           class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.work_place') }}
                                    </label>
                                    <input type="text"
                                           value="{{old('cadre_work_place')}}"
                                           class="form-control form-control-sm input-form"
                                           id="cadre_work_place-add" name="cadre_work_place">
                                    <span id="cadre_work_place-add-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.clinical_signs') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea class="form-control form-control-sm"
                                              id="clinical_signs-add"
                                              rows="3"
                                              name="clinical_signs">{{ old('clinical_signs') }}</textarea>
                                    <span id="clinical_signs-add-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="subclinical_results-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.subclinical_results') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="subclinical_results-add"
                                        rows="3"
                                        name="subclinical_results">{{ old('subclinical_results') }}</textarea>
                                    <span id="subclinical_results-add-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="diagnose-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.diagnose') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        rows="3"
                                        id="diagnose-add" name="diagnose">{{ old('diagnose') ?? $medical->diagnose }}</textarea>
                                    <span id="diagnose-add-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="treatment_methods-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.treatment_methods') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="treatment_methods-add"
                                        rows="3"
                                        name="treatment_methods">{{ old('treatment_methods') }}</textarea>
                                    <span id="treatment_methods-add-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="patient_status-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.patient_status') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="patient_status-add"
                                        rows="3"
                                        name="patient_status">{{ old('patient_status') }}</textarea>
                                    <span id="patient_status-add-error" class="error validate-error"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group form-group-sm">
                                            <label for="transit_times-add" class="col-form-label ">
                                                {{ __('label.hospital_transfer.field.transit_times') }}
                                                <span class="text-red">(*)</span>
                                            </label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group date datetimepicker-div" id="cal-transit_times-add"
                                                     data-target-input="nearest">
                                                    <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                           id="transit_times-add" name="transit_times"
                                                           placeholder="Ngày/tháng/năm"
                                                           data-target="#cal-transit_times-add">
                                                    <div class="input-group-append"
                                                         data-target="#cal-transit_times-add"
                                                         data-toggle="datetimepicker">
                                                        <div class="input-group-text form-control-sm">
                                                            <i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span id="transit_times-add-error" class="error validate-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="reasons-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.reasons') }}
                                    <span class="text-red">(*)</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                                id="reason_1"
                                               type="radio" name="reasons"
                                               value="{{HospitalTransferConstant::REASON_1}}"
                                                {{ old('reasons') == HospitalTransferConstant::REASON_1 ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="reason_1">
                                            {{HospitalTransferConstant::REASON_TEXT[HospitalTransferConstant::REASON_1]}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                                id="reason_2"
                                               type="radio" name="reasons"
                                               value="{{HospitalTransferConstant::REASON_2}}"
                                            {{ old('reasons') == HospitalTransferConstant::REASON_2 ? 'checked' : '' }}
                                        />
                                        <label class="form-check-label" for="reason_2">
                                            {{HospitalTransferConstant::REASON_TEXT[HospitalTransferConstant::REASON_2]}}
                                        </label>
                                    </div>
                                    <span id="reasons-add-error" class="error validate-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="treatment_directions-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.treatment_directions') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="treatment_directions-add"
                                        rows="3"
                                        name="treatment_directions">{{ old('treatment_directions') }}</textarea>
                                    <span id="treatment_directions-add-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="transportations-add" class="col-form-label ">
                                        {{ __('label.hospital_transfer.field.transportations') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="transportations-add"
                                        rows="3"
                                        name="transportations">{{ old('transportations') }}</textarea>
                                    <span id="transportations-add-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-sm">
                                    <label for="escort_information-add" class="col-form-label">
                                        {{ __('label.hospital_transfer.field.escort_information') }}
                                    <span class="text-red">(*)</span></label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        id="escort_information-add"
                                        rows="3"
                                        name="escort_information">{{ old('escort_information') }}</textarea>
                                    <span id="escort_information-add-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer">
                        <button id="savePrintButton" class="btn btn-success save-print">
                            <i class="fa fa-save"></i>Lưu và in</button>
                        <a style="margin-left: 10px;"
                           class="btn btn-primary"
                           href="{{ route('admin.medical_session.examination', ['id' => $medical->id]) }}">
                            <i class="fas fa-undo"></i> Quay lại</a>
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
        .validate-error{
            line-height: 19.2px;
            color: red;
            font-size: 12.8px;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $('.loading').hide()

        const API_CREATE = "{{route('admin.store.hospital_transfer')}}";
        const API_UPDATE = "{{route('admin.update.hospital_transfer', ":id")}}";
        $(document).on("click", ".save-print", function () {
            let api = API_CREATE;
            let data = $("#add-hospital-transfer-form").serialize();
            hideMessageValidate('#add-hospital-transfer-form');
            createOrUpdate(api, data, nextAddHospitalTransfer);
        });

        $(document).on("click", ".btn-edit", function () {
            let id = $('#id-edit').val();
            let data = {
                id: id,
                hospital_id: $('#hospital_id-add').val(),
                cadre_age: $('#cadre_age-add').val(),
                cadre_work_place: $('#cadre_work_place-add').val(),
                treatment_start_date: $('#treatment_start_date-add').val(),
                treatment_end_date: $('#treatment_end_date-add').val(),
                clinical_signs: $('#clinical_signs-add').val(),
                subclinical_results: $('#subclinical_results-add').val(),
                diagnose: $('#diagnose-add').val(),
                treatment_methods: $('#treatment_methods-add').val(),
                patient_status: $('#patient_status-add').val(),
                reasons: $('input[name="reasons"]:checked').val(),
                treatment_directions: $('#treatment_directions-add').val(),
                transit_times: $('#transit_times-add').val(),
                transportations: $('#transportations-add').val(),
                escort_information: $('#escort_information-add').val(),
            };
            var api = API_UPDATE;
            hideMessageValidate('#add-hospital-transfer-form');
            api = api.replace(":id", id);
            createOrUpdate(api, data, nextAddHospitalTransfer);
        });

        function nextAddHospitalTransfer(data) {
            if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
                showMessageValidate('add', data.errors);
            } else {
                Promise.resolve().then(function () {
                    const frameName = 'printIframe';
                    let doc = window.frames[frameName];
                    if (!doc) {
                        $('<iframe>').hide().attr('name', frameName).appendTo(document.body);
                        doc = window.frames[frameName];
                    }
                    doc.document.body.innerHTML = data.print;
                    doc.window.print();
                }).then(function () {
                    settings.options(data.print);
                });
                $('#id-edit').val(data.id);
                var button = document.getElementById("savePrintButton");
                if (button !== null){
                    button.classList.remove("save-print");
                    button.classList.add("btn-edit");
                    button.removeAttribute("id");
                }
            }
        }
    </script>
@endpush

