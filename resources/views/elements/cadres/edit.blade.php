@php
    use App\Constants\CadresConstants;
@endphp

<div id="edit-cadres" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                <form id="edit-cadres-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">
                                    {{ __('label.cadres.field.name') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="name-edit" name="name">
                                <p id="name-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birthday-edit">
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
                                <label for="birthday">{{ __('label.cadres.field.gender') }}</label>
                                <select name="gender" class="form-control form-control-sm input-form" id="gender-edit">
                                    <option value="0">{{ __('label.cadres.gender_value.male') }}</option>
                                    <option value="1">{{ __('label.cadres.gender_value.female') }}</option>
                                </select>
                                <p id="gender-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="folk_id">{{ __('label.cadres.field.folk_id') }}</label>
                                <select name="folk_id" class="form-control form-control-sm input-form" id="folk_id-edit">
                                </select>
                                <p id="folk_id-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="identity_card_number">
                                    {{ __('label.cadres.field.identity_card_number') }}
                                </label>
                                <input type="text"
                                    class="form-control form-control-sm input-form"
                                    id="identity_card_number-edit"
                                    name="identity_card_number"
                                >
                                <p id="identity_card_number-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="medical_insurance_number">
                                    {{ __('label.cadres.field.medical_insurance_number') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                    class="form-control form-control-sm input-form"
                                    id="medical_insurance_number-edit"
                                    name="medical_insurance_number" maxlength="15"
                                >
                                <p id="medical_insurance_number-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="medical_insurance_number">
                                    {{ __('label.cadres.field.medical_insurance_symbol_code') }}
                                </label>
                                <input type="text"
                                    class="form-control form-control-sm input-form"
                                    id="medical_insurance_symbol_code-edit"
                                    name="medical_insurance_symbol_code"
                                >
                                <p id="medical_insurance_symbol_code-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="medical_insurance_number">
                                    {{ __('label.cadres.field.medical_insurance_live_code') }}
                                </label>
                                <select name="medical_insurance_live_code"
                                    class="form-control form-control-sm input-form"
                                    id="medical_insurance_live_code-edit">
                                    <option value="">------Chọn Mã sinh sống------</option>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="medical_insurance_start_date-edit">
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
                                <p id="medical_insurance_start_date-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="medical_insurance_end_date-edit">
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
                                <label for="hospital_code">
                                    {{ __('label.cadres.field.hospital_code') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                    class="form-control form-control-sm input-form"
                                    id="hospital_code-edit"
                                    name="hospital_code"
                                    disabled
                                >
                                <p id="hospital_code-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="is_long_date">
                                    {{ __('label.cadres.field.is_long_date') }}
                                </label>
                                <input type="checkbox"
                                    style="width:40%"
                                    class="form-control form-control-sm input-form"
                                    id="is_long_date-edit"
                                    name="is_long_date"
                                    value="1"
                                    disabled
                                >
                                <p id="is_long_date-edit-error" class="error validate-error"></p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="medical_insurance_address">
                                    {{ __('label.cadres.field.medical_insurance_address') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="medical_insurance_address-edit"
                                       name="medical_insurance_address"
                                       disabled
                                >
                                <p id="medical_insurance_address-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="insurance_five_consecutive_years-edit"
                                   class="col-form-label col-form-label-sm">
                                {{ __('label.cadres.field.insurance_five_consecutive_years') }}
                                <span class="text-red">(*)</span>
                            </label>
                            <div class="input-group input-group-sm">
                                <div class="input-group date" id="cad-insurance_five_consecutive_years-edit"
                                     data-target-input="nearest">
                                    <input type="text" class="datetimepicker-input form-control form-control-sm"
                                           id="insurance_five_consecutive_years-edit" disabled
                                           name="insurance_five_consecutive_years" placeholder="Ngày/tháng/năm" data-target="#cad-insurance_five_consecutive_years-edit">
                                    <div class="input-group-append"
                                         data-target="#cad-insurance_five_consecutive_years-edit" data-toggle="datetimepicker">
                                        <div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <p id="insurance_five_consecutive_years-edit-error" class="error validate-error"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">
                                    {{ __('label.cadres.field.phone') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="phone-edit" name="phone">
                                <p id="phone-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">
                                    {{ __('label.cadres.field.email') }}
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="email-edit" name="email">
                                <p id="email-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="city_id">{{ __('label.cadres.field.city_id') }}</label>
                                <select name="city_id" class="form-control form-control-sm input-form" id="city_id-edit">
                                </select>
                                <p id="city_id-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="district_id">{{ __('label.cadres.field.district_id') }}</label>
                                <select name="district_id" class="form-control form-control-sm input-form" id="district_id-edit">
                                </select>
                                <p id="district_id-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">{{ __('label.cadres.field.address') }}</label>
                                <input type="text"
                                    class="form-control form-control-sm input-form"
                                    id="address-edit"
                                    name="address"
                                >
                                <p id="address-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="job">{{ __('label.cadres.field.job') }}</label>
                                <input type="text"
                                    class="form-control form-control-sm input-form"
                                    id="job-edit"
                                    name="job"
                                >
                                <p id="job-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    @if(auth()->user()->can('Edit-cadres'))
                        <button class="btn btn-primary btn-sm edit">
                            <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                        </button>
                    @endif
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel"
                            data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
