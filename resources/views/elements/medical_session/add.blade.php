@php
    use App\Constants\CadresConstants;
@endphp
<div class="modal fade" id="add-medical-session" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.medical_session.modal_title_add') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header" style="background-color: #ecf0f5">
                        <h3 class="card-title" style="font-size: 17px">
                            {{ __('label.medical_session.card_title_info') }}
                        </h3>
                    </div>
                    <form id="add-cadres-form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group suggest-parent-dropdown">
                                        <label for="name-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.name') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                            id="name-add" name="name" autocomplete="off">
                                        <div class="suggestion-dropdown" id="cadre-list-suggest-add"
                                            style="display: none;">
                                        </div>
                                        <p id="name-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="identity_card_number-add" class="col-form-label
                                            col-form-label-sm">
                                            {{ __('label.cadres.field.identity_card_number') }}
                                        </label>
                                        <input type="text" class="form-control form-control-sm number-integer-validate"
                                               id="identity_card_number-add"
                                               name="identity_card_number">
                                        <p id="identity_card_number-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.phone') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm number-integer-validate"
                                               id="phone-add" name="phone">
                                        <p id="phone-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.email') }}
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                               id="email-add" name="email">
                                        <p id="email-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="job-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.job') }}
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               id="job-add"
                                               name="job">
                                        <p id="job-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="birthday-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.birthday') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group date datetimepicker-div" id="cal-birthday-add"
                                                 data-target-input="nearest">
                                                <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                       id="birthday-add" name="birthday" placeholder="Ngày/tháng/năm" data-target="#cal-birthday-add">
                                                <div class="input-group-append"
                                                     data-target="#cal-birthday-add" data-toggle="datetimepicker">
                                                    <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="birthday-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.gender') }}
                                        </label>
                                        <select name="gender" class="form-control form-control-sm" id="gender-add">
                                            <option value="0">{{ __('label.cadres.gender_value.male') }}</option>
                                            <option value="1">{{ __('label.cadres.gender_value.female') }}</option>
                                        </select>
                                        <p id="gender-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="folk_id-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.folk_id') }}
                                        </label>
                                        <select name="folk_id" class="form-control form-control-sm select2"
                                                id="folk_id-add" style="width: 100%">
                                            @foreach($folks as $folk)
                                                <option value="{{$folk->id}}">{{$folk->name}}</option>
                                            @endforeach
                                        </select>
                                        <p id="folk_id-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="medical_insurance_number-add"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_number') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-sm string-validate"
                                               id="medical_insurance_number-add"
                                               name="medical_insurance_number">
                                        <p id="medical_insurance_number-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="medical_insurance_symbol_code-add"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_symbol_code') }}
                                        </label>
                                        <input type="text" disabled
                                               class="form-control form-control-sm"
                                               id="medical_insurance_symbol_code-add"
                                               name="medical_insurance_symbol_code">
                                        <p id="medical_insurance_symbol_code-add-error"
                                           class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="medical_insurance_live_code-add"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_live_code') }}
                                        </label>
                                        <select name="medical_insurance_live_code"
                                                class="form-control form-control-sm"
                                                id="medical_insurance_live_code-add" disabled>
                                            <option value="">--- Chọn Mã sinh sống ---</option>
                                            <option value="{{ CadresConstants::LIVE_CODE_K1 }}">
                                                {{ CadresConstants::LIVE_CODE_K1 }}
                                            </option>
                                            <option value="{{ CadresConstants::LIVE_CODE_K2 }}">
                                                {{ CadresConstants::LIVE_CODE_K2 }}
                                            </option>
                                            <option value="{{ CadresConstants::LIVE_CODE_K3 }}">
                                                {{ CadresConstants::LIVE_CODE_K3 }}
                                            </option>
                                        </select>
                                        <p id="medical_insurance_live_code-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="medical_insurance_start_date-add"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_start_date') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group date" id="cal-medical_insurance_start_date-add"
                                                 data-target-input="nearest">
                                                <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                       id="medical_insurance_start_date-add" disabled
                                                       name="medical_insurance_start_date" placeholder="Ngày/tháng/năm" data-target="#cal-medical_insurance_start_date-add">
                                                <div class="input-group-append"
                                                     data-target="#cal-medical_insurance_start_date-add" data-toggle="datetimepicker">
                                                    <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="medical_insurance_start_date-add-error" class="error validate-error"></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="medical_insurance_end_date-add"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_end_date') }}
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group date datetimepicker-div" id="cal-medical_insurance_end_date-add"
                                                 data-target-input="nearest">
                                                <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                       id="medical_insurance_end_date-add" disabled
                                                       name="medical_insurance_end_date" placeholder="Ngày/tháng/năm" data-target="#cal-medical_insurance_end_date-add">
                                                <div class="input-group-append"
                                                     data-target="#cal-medical_insurance_end_date-add" data-toggle="datetimepicker">
                                                    <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="medical_insurance_end_date-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hospital_code-add"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.hospital_code') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                               id="hospital_code-add"
                                               name="hospital_code" disabled>
                                        <p id="hospital_code-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="is_long_date-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.is_long_date') }}
                                        </label>
                                        <input type="checkbox" class="form-control form-control-sm w-20"
                                               id="is_long_date-add" name="is_long_date" value="1" disabled>
                                        <p id="is_long_date-add-error" class=""></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="medical_insurance_address-add"
                                            class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_address') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                            id="medical_insurance_address-add"
                                            name="medical_insurance_address" disabled>
                                        <p id="medical_insurance_address-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <label for="cadre_insurance_five_consecutive_years-add"
                                                class="col-form-label col-form-label-sm">
                                                {{ __('label.cadres.field.insurance_five_consecutive_years') }}
                                                <span class="text-red">(*)</span>
                                            </label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group date" id="cadre_insurance_five_consecutive_years-add"
                                                    data-target-input="nearest">
                                                    <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                        id="insurance_five_consecutive_years-add" disabled
                                                        name="insurance_five_consecutive_years" placeholder="Ngày/tháng/năm" data-target="#cadre_insurance_five_consecutive_years-add">
                                                    <div class="input-group-append"
                                                        data-target="#cadre_insurance_five_consecutive_years-add" data-toggle="datetimepicker">
                                                        <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <p id="insurance_five_consecutive_years-add-error" class="error validate-error"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city_id-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.city_id') }}
                                        </label>
                                        <select name="city_id" class="form-control form-control-sm select2"
                                                id="city_id-add" style="width: 100%">
                                            <option value="">
                                                --- {{ __('label.medical_session.choose_city') }} ---
                                            </option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                        <p id="city_id-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="district_id-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.district_id') }}
                                        </label>
                                        <select name="district_id" class="form-control form-control-sm select2"
                                                id="district_id-add" style="width: 100%">
                                            <option value="">
                                                --- {{ __('label.medical_session.choose_district') }} ---
                                            </option>
                                        </select>
                                        <p id="district_id-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.address') }}
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               id="address-add"
                                               name="address">
                                        <p id="address-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <input type="hidden" name="cadre_id_check" id="cadre_id_check-add" value="">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer justify-content-between">
                        <div class="col-md-12 no-padding text-right">
                            <button class="btn btn-primary btn-sm add-cadres">
                                <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                            </button>
                            <button class="btn btn-default margin-left-5 reset"
                                    onclick="resetFormAddCadres('#add-cadres-form')">
                                <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" style="background-color: #ecf0f5">
                        <h3 class="card-title" style="font-size: 17px">
                            {{ __('label.medical_session.card_title_medical_session') }}
                        </h3>
                    </div>
                    <form id="add-medical-session-form">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department_id-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.department.field.name') }} <span class="text-red">(*)</span>
                                        </label>
                                        <select class="form-control form-control-sm select2" style="width: 100%;"
                                                id="department_id-add" name="department_id"
                                                data-url="{{ route('admin.department.room') }}">
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="department_id-add-error" class="error validate-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="room_id-add" class="col-form-label col-form-label-sm">
                                            {{ __('label.room.field.name') }} <span class="text-red">(*)</span>
                                        </label>
                                        <select class="form-control form-control-sm select2" style="width: 100%;"
                                                id="room_id-add" name="room_id">
                                            <option value="">
                                                --- {{ __('label.medical_session.search.placeholder.room') }} ---
                                            </option>
                                            @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endforeach
                                        </select>
                                        <p id="room_id-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="reason_for_examination-add"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.medical_session.field.reason_for_examination') }}
                                        </label>
                                        <textarea class="form-control form-control-sm" id="reason_for_examination-add"
                                                  name="reason_for_examination">
                                        </textarea>
                                        <p id="reason_for_examination-add-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <input type="hidden" name="cadre_id" id="cadre-id-add" value="">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer justify-content-between">
                        <div class="col-md-12 no-padding text-right">
                            <button class="btn btn-primary btn-sm add-medical-card" style="width: 125px" disabled>
                                <i class="fa fa-save"></i>
                                {{ __('label.medical_session.field.create_medical_card') }}
                            </button>
                            <button class="btn btn-default margin-left-5 reset"
                                    onclick="resetFormAddMedicalSession('#add-medical-session-form')">
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
    </div>
</div>
