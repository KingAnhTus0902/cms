@php
    use App\Constants\DesignatedServiceConstants;
@endphp
<div id="add-designated_service" class="modal fade bd-example-modal-lg add-popup" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.designated_service.modal_title_add') }}
                </h4>
                <button type="button" class="close close-modal-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-designated_service-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name-add">{{ __('label.designated_service.field.name') }} <span
                                        class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="name-add" name="name">
                                <p id="name-add-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="service_unit_price-add">
                                    {{ __('label.designated_service.field.service_unit_price') }}
                                </label>
                                <input type="number"
                                       class="form-control form-control-sm input-form number-integer-validate"
                                       id="service_unit_price-add"
                                       name="service_unit_price">
                                <p id="service_unit_price-add-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="type_surgery-add">
                                    {{ __('label.designated_service.field.type_surgery') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm" style="width:100%"
                                        id="type_surgery-add" name="type_surgery">
                                        <option value="">---
                                        {{ __('label.designated_service.field.type_surgery') }}
                                        ---</option>
                                    @foreach (DesignatedServiceConstants::TYPE_SURGERY as $key => $typeSugery)
                                        <option value="{{ $key }}"> {{ $typeSugery }}</option>
                                    @endforeach
                                </select>
                                <p id="type_surgery-add-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="specialist-add">
                                    {{ __('label.designated_service.field.specialist') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm"
                                        id="specialist-add" name="specialist">
                                    <option value="">--- {{ __('label.designated_service.field.specialist') }} ---</option>
                                    @foreach (DesignatedServiceConstants::SPECIALIST as $key => $specialist)
                                        <option value="{{ $key }}"> {{ $specialist }}</option>
                                    @endforeach
                                </select>
                                <p id="specialist-add-error" class="error validate-error"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="room_id-add">
                                    {{ __('label.designated_service.field.room_id') }}
                                </label>
                                <select class="form-control form-control-sm select2" style="width:100%"
                                        id="room_id-add" name="room_id">
                                    <option value="">--- {{ __('label.designated_service.field.room_id') }} ---</option>
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
                                <label for="description-add">
                                    {{ __('label.designated_service.field.description') }}
                                </label>
                                <textarea class="form-control input-form" id="description-add" name="description"
                                          rows="2"></textarea>
                                <p id="description-add-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-primary btn-sm add">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-default margin-left-5 reset close-modal-btn"
                            onclick="resetDesignatedServiceForm('#add-designated_service')">
                        <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel close-modal-btn"
                                data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

