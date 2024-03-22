@php
    use App\Constants\CadresConstants;
@endphp
<div class="modal fade" id="edit-medical-session" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.medical_session.modal_title_edit') }}
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
                                        <label for="identity_card_number-edit" class="col-form-label
                                            col-form-label-sm">
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
                                        <select name="folk_id" class="form-control form-control-sm select2"
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
                                <input type="hidden" name="cadre_id_check" id="cadre_id_check-edit" value="">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer justify-content-between">
                        <div class="col-md-12 no-padding text-right">
                            <button class="btn btn-primary btn-sm edit-cadres">
                                <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
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
                    <form id="edit-medical-session-form">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department_id-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.department.field.name') }} <span class="text-red">(*)</span>
                                        </label>
                                        <select class="form-control form-control-sm select2" style="width: 100%;"
                                                id="department_id-edit" name="department_id"
                                                data-url="{{ route('admin.department.room') }}">
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                        </select>
                                        <span id="department_id-edit-error" class="error validate-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="room_id-edit" class="col-form-label col-form-label-sm">
                                            {{ __('label.room.field.name') }} <span class="text-red">(*)</span>
                                        </label>
                                        <select class="form-control form-control-sm select2" style="width: 100%;"
                                                id="room_id-edit" name="room_id">
                                            <option value="">
                                                --- {{ __('label.medical_session.search.placeholder.room') }} ---
                                            </option>
                                            @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endforeach
                                        </select>
                                        <p id="room_id-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="reason_for_examination-edit"
                                               class="col-form-label col-form-label-sm">
                                            {{ __('label.medical_session.field.reason_for_examination') }}
                                        </label>
                                        <textarea class="form-control form-control-sm" id="reason_for_examination-edit"
                                                  name="reason_for_examination">
                                        </textarea>
                                        <p id="reason_for_examination-edit-error" class="error validate-error"></p>
                                    </div>
                                </div>
                                <input type="hidden" name="cadre_id" id="cadre_id-edit" value="">
                            </div>
                        </div>
                        <input type="hidden" id="id_medical_session_hidden-edit" name="id_medical_session_hidden">
                        <input type="hidden" id="id_medical_session_room_hidden-edit"
                               name="id_medical_session_room_hidden">
                    </form>
                    <div class="modal-footer justify-content-between">
                        <div class="col-md-12 no-padding text-right">
                            <button class="btn btn-primary btn-sm edit-medical-card">
                                <i class="fa fa-save"></i>
                                {{ __('label.common.button.save') }}
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
