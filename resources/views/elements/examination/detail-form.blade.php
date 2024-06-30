@php
    use App\Helpers\CommonHelper;
    use App\Constants\MedicalSessionConstants;
    $isDisable = ($medical_session->medical_examination_day_end && $medical_session->medical_examination_day_end < date('Y-m-d') ) ? 'disabled' : "";
@endphp
<input type="hidden" id="medical-session-id" value="{{$medical_session->id}}">
<input type="hidden" id="user_id" value="{{ $current_room->user_id }}">
<div class="row">
    <div class="col-12">
        <div class="card examination">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row mb-3" id="cadres-information">
                        <div class="col-md-4">
                            <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.examination.field.cadres_name') }}:
                            </label>
                            <span class="col-form-label-fz">{{ $medical_session->cadre_name ?? '' }}</span>
                        </div>
                        <div class="col-md-4">
                            <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.gender') }}:
                            </label>
                            <span class="col-form-label-fz">{{ $medical_session->cadre_gender }}</span>
                        </div>
                        <div class="col-md-4">
                            <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.birthday') }}:
                            </label>
                            <span class="col-form-label-fz">
                                {{ $medical_session->cadre_birthday ?
                                CommonHelper::formatDate($medical_session->cadre_birthday,
                                 YEAR_MONTH_DAY,
                                  DAY_MONTH_YEAR)
                                 : '' }}
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.examination.current_room') }}:
                            </label>
                            <span class="col-form-label-fz">{{$current_room->name}}</span>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" id="medical_session_status"
                                   value="{{ $medical_session->getRawOriginal('status') }}">
                            <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.examination.field.status') }}:
                            </label>
                            @if (!isset($current_room->user_id))
                                @php
                                    $medical_session->status = MedicalSessionConstants::STATUS_WAITING
                                @endphp
                            @endif
                            <span class="col-form-label-fz">{!! $medical_session->status ?? '' !!}</span>
                        </div>
                        <div class="col-md-4">
                            <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.examination.field.date') }}:
                            </label>
                            <span class="col-form-label-fz">{{$medical_session->medical_examination_day}}</span>
                        </div>
                        <div class="col-md">
                            <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                            {{ __('label.cadres.field.job') }}:
                            </label>
                            <span class="col-form-label-fz">{{ $medical_session->cadre_job}}</span>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <!-- BHYT -->
                        <!-- <ADDRESS> -->
                        <div class="col-12">
                            <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.address') }}:
                            </label>
                            <span class="col-form-label-fz">{{ $medical_session->cadre_address}}</span>
                        </div>
                        <!-- /ADDRESS -->
                    </div>

                    <form id="save-examination-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-sm">
                                    <label for="reason_for_examination-edit"
                                        class="col-form-label col-form-label-fz">
                                        {{ __('label.medical_session.field.reason_for_examination') }}
                                    </label>
                                    <textarea class="form-control form-control-sm input-form"
                                            id="reason_for_examination-edit"
                                            name="reason_for_examination"
                                            rows="2">{{ $medical_session->reason_for_examination ?? ''}}</textarea>
                                    <span id="reason_for_examination-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-sm">
                                    <label for="pathological_process-edit"
                                           class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.pathological_process') }}
                                    </label>
                                    <textarea class="form-control form-control-sm input-form"
                                              id="pathological_process-edit"
                                              name="pathological_process" {{$isDisable}}
                                              rows="2">{{ $medical_session->pathological_process ?? ''}}</textarea>
                                    <span id="pathological_process-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-sm">
                                    <label for="personal_history-edit"
                                           class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.personal_history') }}
                                    </label>
                                    <textarea class="form-control form-control-sm input-form"
                                              id="personal_history-edit"
                                              name="personal_history" {{$isDisable}}
                                              rows="2">{{ $medical_session->personal_history ?? ''}}</textarea>
                                    <span id="personal_history-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-sm">
                                    <label for="family_history-edit"
                                           class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.family_history') }}
                                    </label>
                                    <textarea class="form-control form-control-sm input-form"
                                              id="family_history-edit"
                                              name="family_history" {{$isDisable}}
                                              rows="2">{{ $medical_session->family_history ?? ''}}</textarea>
                                    <span id="family_history-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="circuit-edit" class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.circuit') }}
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="number"
                                            class="form-control form-control-sm"
                                            name="circuit" {{$isDisable}}
                                            id="circuit-edit"
                                            aria-describedby="circuit-addon"
                                            value="{{ $vital_sign->circuit ?? ''}}"
                                            >
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control-sm"
                                                id="circuit-addon">
                                                {{ __('label.examination.unit.circuit') }}
                                            </span>
                                        </div>
                                        <p id="circuit-edit-error" class="error validate-error"></p>
                                    </div>
                                    <span id="circuit-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="temperature-edit" class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.temperature') }}
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="number"
                                            class="form-control form-control-sm"
                                            name="temperature" {{$isDisable}}
                                            id="temperature-edit"
                                            aria-describedby="temperature-addon"
                                            value="{{ $vital_sign->temperature ?? '' }}"
                                            >
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control-sm"
                                                id="temperature-addon">
                                                {!! __('label.examination.unit.temperature') !!}
                                            </span>
                                        </div>
                                        <p id="temperature-edit-error" class="error validate-error"></p>
                                    </div>
                                    <span id="temperature-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="blood_pressure-edit" class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.blood_pressure') }}
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               name="blood_pressure" {{$isDisable}}
                                               id="blood_pressure-edit"
                                               aria-describedby="blood_pressure-addon"
                                               value="{{ $vital_sign->blood_pressure ?? '' }}"
                                        >
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control-sm"
                                                  id="blood_pressure-addon">
                                                {{ __('label.examination.unit.blood_pressure') }}
                                            </span>
                                        </div>
                                        <p id="blood_pressure-edit-error" class="error validate-error"></p>
                                    </div>
                                    <span id="blood_pressure-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="height-edit" class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.height') }}
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               name="height" {{$isDisable}}
                                               id="height-edit"
                                               aria-describedby="height-addon"
                                               value="{{ $vital_sign->height ?? 0 }}"
                                               onchange="calculateBmi()"
                                        >
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control-sm"
                                                  id="height-addon">
                                                {{ __('label.examination.unit.height') }}
                                            </span>
                                        </div>
                                        <p id="height-edit-error" class="error validate-error"></p>
                                    </div>
                                    <span id="height-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="treatment_days-edit" class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.treatment_days') }}
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               name="treatment_days" {{$isDisable}}
                                               id="treatment_days-edit"
                                               aria-describedby="treatment_days-addon"
                                               value="{{ $vital_sign->treatment_days ?? '' }}"
                                        >
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control-sm"
                                                  id="treatment_days-addon">
                                                {{ __('label.examination.unit.treatment_days') }}
                                            </span>
                                        </div>
                                        <p id="treatment_days-edit-error" class="error validate-error"></p>
                                    </div>
                                    <span id="treatment_days-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="breathing-edit" class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.breathing') }}
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               name="breathing" {{$isDisable}}
                                               id="breathing-edit"
                                               aria-describedby="breathing-addon"
                                               value="{{ $vital_sign->breathing ?? '' }}"
                                        >
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control-sm"
                                                  id="breathing-addon">
                                                {{ __('label.examination.unit.breathing') }}
                                            </span>
                                        </div>
                                        <p id="breathing-edit-error" class="error validate-error"></p>
                                    </div>
                                    <span id="breathing-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="weight-edit" class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.weight') }}
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="number"
                                               class="form-control form-control-sm"
                                               name="weight" {{$isDisable}}
                                               id="weight-edit"
                                               aria-describedby="weight-addon"
                                               value="{{ $vital_sign->weight ?? 0 }}"
                                               onchange ="calculateBmi()"
                                        >
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control-sm"
                                                  id="weight-addon">
                                                {{ __('label.examination.unit.weight') }}
                                            </span>
                                        </div>
                                        <p id="weight-edit-error" class="error validate-error"></p>
                                    </div>
                                    <span id="weight-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-sm">
                                    <label for="bmi-edit" class="col-form-label col-form-label-fz">
                                        {{ __('label.examination.field.bmi') }}
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               name="bmi"
                                               id="bmi-edit"
                                               aria-describedby="bmi-addon"
                                               value="{{ $vital_sign->bmi ?? '' }}"
                                               readonly
                                        >
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control-sm"
                                                  id="bmi-addon">
                                                {{ __('label.examination.unit.bmi') }}
                                            </span>
                                        </div>
                                        <p id="bmi-edit-error" class="error validate-error"></p>
                                    </div>
                                    <span id="bmi-edit-error" class="error validate-error"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-right">
                        <button class="btn btn-primary btn-sm edit_save" {{$isDisable}}>
                            <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                        </button>
                    </div>
                    @if (!isset($current_room->user_id))
                        <div class="justify-content-between">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-primary update">
                                    <i class="fa fa-save"></i> {{ __('label.examination.button.begin_examination') }}
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card designated_service">
            @include('elements.medical_session.diagnose', [
                'medicalSession' => $medical_session,
                'isDisable' => $isDisable
            ])
            @include('elements.designated_service_medical_session.add')
            @include('elements.designated_service_medical_session.edit')
            @include('elements.designated_service_medical_session.list', [
                'designatedServiceMedicalSession' => $designatedServiceMedicalSession,
                'medicalSession' => $medical_session,
                'isDisable' => $isDisable
            ])
            @include('elements.examination.disease', [
                'medical_session_id' => $medical_session->id,
                'isDisable' => $isDisable
            ])
            @include('elements.medical_session.conclude', [
                'medicalSession' => $medical_session,
                'isDisable' => $isDisable
            ])
            @include('elements.examination.re_examination')
            <div id="content-medicine-of-medical-session">
            </div>
            @include('elements.examination.change-room')
            @include('elements.medicine_of_medical_session.add', [
                'medicalSessionId' => $medical_session->id
            ])
            @include('elements.medicine_of_medical_session.edit')
            @if(!$isDisable)
                <div class="button" style="text-align: right;padding-bottom: 50px;margin-top: 20px;margin-right: 10px;">
                    <a
                        style="margin-left: 10px;"
                        class="btn btn-info waiting_result-btn"
                        data-id="{{ $medical_session->id }}">
                        {{ __('label.hospital_transfer.button.title.waiting_result') }}
                    </a>
                    <a
                        style="margin-left: 10px;"
                        class="btn btn-success complete-btn"
                        data-id="{{ $medical_session->id }}">
                        {{ __('label.hospital_transfer.button.title.complete') }}
                    </a>
                    <a
                        style="margin-left: 10px;"
                        class="btn btn-danger cancel-btn"
                        data-id="{{ $medical_session->id }}">
                        {{ __('label.hospital_transfer.button.title.cancel') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
