@php
    use App\Constants\CadresConstants;
@endphp
<div class="modal fade" id="edit-cadre" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.cadres.modal_title_edit') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <form id="edit-cadres-form">
                        @csrf
                        <input type="hidden" id="cadre_id_check-edit" name="cadre_id_check">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group suggest-parent-dropdown">
                                        <label for="name-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.name') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                               id="name-edit" name="name" autocomplete="off">
                                        <div class="suggestion-dropdown" id="cadre-list-suggest-edit"
                                             style="display: none;">
                                        </div>
                                        <p id="name-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="identity_card_number-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.identity_card_number') }}
                                        </label>
                                        <input type="text" class="form-control form-control-sm number-integer-validate"
                                               id="identity_card_number-edit"
                                               name="identity_card_number">
                                        <p id="identity_card_number-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.phone') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm number-integer-validate"
                                               id="phone-edit" name="phone">
                                        <p id="phone-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.email') }}
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                               id="email-edit" name="email">
                                        <p id="email-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="job-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.job') }}
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               id="job-edit"
                                               name="job">
                                        <p id="job-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="birthday-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.birthday') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group date datetimepicker-div" id="cal-birthday-edit"
                                                 data-target-input="nearest">
                                                <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                       id="birthday-edit" name="birthday" placeholder="Ngày/tháng/năm" data-target="#cal-birthday-edit">
                                                <div class="input-group-append"
                                                     data-target="#cal-birthday-edit" data-toggle="datetimepicker">
                                                    <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="birthday-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.gender') }}
                                        </label>
                                        <select name="gender" class="form-control form-control-sm" id="gender-edit">
                                            <option value="0">{{ __('label.cadres.gender_value.male') }}</option>
                                            <option value="1">{{ __('label.cadres.gender_value.female') }}</option>
                                        </select>
                                        <p id="gender-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="folk_id-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.folk_id') }}
                                        </label>
                                        <select name="folk_id" class="form-control form-control-sm"
                                                id="folk_id-edit" style="width: 100%">
                                            @foreach($folks as $folk)
                                                <option value="{{$folk->id}}">{{$folk->name}}</option>
                                            @endforeach
                                        </select>
                                        <p id="folk_id-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="medical_insurance_number-edit"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_number') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-sm string-validate"
                                               id="medical_insurance_number-edit"
                                               name="medical_insurance_number">
                                        <p id="medical_insurance_number-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="medical_insurance_symbol_code-edit"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_symbol_code') }}
                                        </label>
                                        <input type="text" disabled
                                               class="form-control form-control-sm"
                                               id="medical_insurance_symbol_code-edit"
                                               name="medical_insurance_symbol_code">
                                        <p id="medical_insurance_symbol_code-edit-error"
                                           class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="medical_insurance_live_code-edit"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_live_code') }}
                                        </label>
                                        <select name="medical_insurance_live_code"
                                                class="form-control form-control-sm"
                                                id="medical_insurance_live_code-edit" disabled>
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
                                        <p id="medical_insurance_live_code-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="medical_insurance_start_date-edit"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_start_date') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group date" id="cal-medical_insurance_start_date-edit"
                                                 data-target-input="nearest">
                                                <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                       id="medical_insurance_start_date-edit" disabled
                                                       name="medical_insurance_start_date" placeholder="Ngày/tháng/năm" data-target="#cal-medical_insurance_start_date-edit">
                                                <div class="input-group-append"
                                                     data-target="#cal-medical_insurance_start_date-edit" data-toggle="datetimepicker">
                                                    <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="medical_insurance_start_date-edit-error"
                                           class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="medical_insurance_end_date-edit"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_end_date') }}
                                        </label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group date datetimepicker-div" id="cal-medical_insurance_end_date-edit"
                                                 data-target-input="nearest">
                                                <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                       id="medical_insurance_end_date-edit" disabled
                                                       name="medical_insurance_end_date" placeholder="Ngày/tháng/năm" data-target="#cal-medical_insurance_end_date-edit">
                                                <div class="input-group-append"
                                                     data-target="#cal-medical_insurance_end_date-edit" data-toggle="datetimepicker">
                                                    <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p id="medical_insurance_end_date-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="hospital_code-edit"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.hospital_code') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                               id="hospital_code-edit"
                                               name="hospital_code" disabled>
                                        <p id="hospital_code-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="is_long_date-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.is_long_date') }}
                                        </label>
                                        <input type="checkbox" class="form-control form-control-sm w-20"
                                               id="is_long_date-edit" name="is_long_date" value="1" disabled>
                                        <p id="is_long_date-edit-error" class=""></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="medical_insurance_address-edit"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.medical_insurance_address') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                               id="medical_insurance_address-edit"
                                               name="medical_insurance_address" disabled>
                                        <p id="medical_insurance_address-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="cadre_insurance_five_consecutive_years-edit"
                                           class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.insurance_five_consecutive_years') }}
                                        <span class="text-red">(*)</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group date datetimepicker-div"
                                             id="cadre_insurance_five_consecutive_years-edit"
                                             data-target-input="nearest">
                                            <input type="text" class="datetimepicker-input form-control form-control-sm"
                                                   id="insurance_five_consecutive_years-edit" disabled
                                                   name="insurance_five_consecutive_years" placeholder="Ngày/tháng/năm"
                                                   data-target="#cadre_insurance_five_consecutive_years-edit">
                                            <div class="input-group-append"
                                                 data-target="#cadre_insurance_five_consecutive_years-edit"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text form-control-sm">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p id="insurance_five_consecutive_years-edit-error"
                                       class="error validate-error">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city_id-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.city_id') }}
                                        </label>
                                        <select name="city_id" class="form-control form-control-sm select2"
                                                id="city_id-edit" style="width: 100%">
                                            <option value="">
                                                --- {{ __('label.medical_session.choose_city') }} ---
                                            </option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                        <p id="city_id-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="district_id-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.district_id') }}
                                        </label>
                                        <select name="district_id" class="form-control form-control-sm select2"
                                                id="district_id-edit" style="width: 100%">
                                            <option value="">
                                                --- {{ __('label.medical_session.choose_district') }} ---
                                            </option>
                                        </select>
                                        <p id="district_id-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.cadres.field.address') }}
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               id="address-edit"
                                               name="address">
                                        <p id="address-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="id_medical_session_hidden-edit" name="id_medical_session_hidden">
                    </form>
                    <div class="modal-footer justify-content-between">
                        <div class="col-md-12 no-padding text-right">
                            <button class="btn btn-primary btn-sm edit-cadres">
                                <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
