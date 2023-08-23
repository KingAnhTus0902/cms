@php
    use App\Constants\DesignatedServiceConstants;
@endphp
<div id="edit-designated_service" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.designated_service.modal_title_edit') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-designated_service-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name-edit">{{ __('label.designated_service.field.name') }} <span
                                        class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="name-edit" name="name">
                                <p id="name-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="use_insurance-edit" name="use_insurance"
                                           class="use_insurance_checkbox">
                                    <label for="use_insurance-edit" style="font-size: .875rem;">
                                        {{ __('label.designated_service.field.use_insurance') }}
                                    </label>
                                </div>
                                <span id="use_insurance-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-4 insurance_code_input">
                            <div class="form-group form-group-sm">
                                <label for="insurance_code-edit">
                                    {{ __('label.designated_service.field.insurance_code') }}
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="insurance_code-edit"
                                       name="insurance_code">
                                <p id="insurance_code-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4 insurance_unit_price_input">
                            <div class="form-group">
                                <label for="insurance_unit_price-edit">
                                    {{ __('label.designated_service.field.insurance_unit_price') }}
                                </label>
                                <input type="number"
                                       class="form-control form-control-sm input-form number-integer-validate"
                                       id="insurance_unit_price-edit"
                                       name="insurance_unit_price">
                                <p id="insurance_unit_price-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4 insurance_surcharge_input">
                            <div class="form-group">
                                <label for="insurance_surcharge-edit">
                                    {{ __('label.designated_service.field.insurance_surcharge') }}
                                </label>
                                <input type="number"
                                       class="form-control form-control-sm input-form number-integer-validate"
                                       id="insurance_surcharge-edit"
                                       name="insurance_surcharge">
                                <p id="insurance_surcharge-edit-error" class="error validate-error"></p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="service_unit_price-edit">
                                    {{ __('label.designated_service.field.service_unit_price') }}
                                </label>
                                <input type="number"
                                       class="form-control form-control-sm input-form number-integer-validate"
                                       id="service_unit_price-edit"
                                       name="service_unit_price">
                                <p id="service_unit_price-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="type_surgery-edit">
                                    {{ __('label.designated_service.field.type_surgery') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm"
                                        id="type_surgery-edit" name="type_surgery">
                                        <option value="">---
                                        {{ __('label.designated_service.field.type_surgery') }}
                                        ---</option>
                                    @foreach (DesignatedServiceConstants::TYPE_SURGERY as $key => $typeSugery)
                                        <option value="{{ $key }}"> {{ $typeSugery }}</option>
                                    @endforeach
                                </select>
                                <p id="type_surgery-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="specialist-edit">
                                    {{ __('label.designated_service.field.specialist') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm"
                                        id="specialist-edit" name="specialist">
                                <option value="">--- {{ __('label.designated_service.field.specialist') }} ---</option>
                                @foreach (DesignatedServiceConstants::SPECIALIST as $key => $specialist)
                                    <option value="{{ $key }}"> {{ $specialist }}</option>
                                @endforeach
                                </select>
                                <p id="specialist-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="room_id-edit">
                                    {{ __('label.designated_service.field.room_id') }}
                                </label>
                                <select class="form-control form-control-sm select2" style="width:100%"
                                        id="room_id-edit" name="room_id">
                                    <option value="">--- {{ __('label.designated_service.field.room_id') }} ---</option>
                                    @foreach($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->name}}</option>
                                    @endforeach
                                </select>
                                <p id="room_id-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="decision_number-edit">
                                    {{ __('label.designated_service.field.decision_number') }}
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="decision_number-edit"
                                        name="decision_number">
                                <p id="decision_number-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description-edit">
                                    {{ __('label.designated_service.field.description') }}
                                </label>
                                <textarea class="form-control input-form" id="description-edit" name="description"
                                          rows="2"></textarea>
                                <p id="description-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    @if(auth()->user()->can('Edit-designated_service'))
                        <button class="btn btn-primary btn-sm edit">
                            <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                        </button>
                    @endif
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


