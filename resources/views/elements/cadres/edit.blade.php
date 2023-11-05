@php
    use App\Constants\CadresConstants;
@endphp

<div id="edit-cadres" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
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
                <form id="add-cadres-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">
                                    {{ __('label.cadres.field.name') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="name-edit" name="name">
                                <p id="name-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-8">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">
                                    {{ __('label.cadres.field.phone') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="phone-edit" name="phone">
                                <p id="phone-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">
                                    {{ __('label.cadres.field.email') }}
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="email-edit" name="email">
                                <p id="email-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                <select name="gender" class="form-control form-control-sm input-form" id="gender-add">
                                    <option value="0">{{ __('label.cadres.gender_value.male') }}</option>
                                    <option value="1">{{ __('label.cadres.gender_value.female') }}</option>
                                </select>
                                <p id="gender-edit-error" class="error validate-error"></p>
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
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city_id">{{ __('label.cadres.field.city_id') }}</label>
                                <select name="city_id" class="form-control form-control-sm input-form" id="city_id-edit">
                                </select>
                                <p id="city_id-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district_id">{{ __('label.cadres.field.district_id') }}</label>
                                <select name="district_id" class="form-control form-control-sm input-form" id="district_id-edit">
                                </select>
                                <p id="district_id-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
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
