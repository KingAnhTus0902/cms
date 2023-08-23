@php
    use App\Constants\MedicalSessionConstants;
@endphp
<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{__('label.medical_session.title')}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 block-button-add">
            <button type="button" class="btn btn-success open-add-medical-session-modal"
                    data-toggle="modal" data-target="#add-medical-session" title="{{ __('label.medical_session.modal_title_add') }}">
                <i class="fas fa-plus mr-2"></i>{{ __('label.common.button.open_add_modal') }}
            </button>
        </div>
    </div>
</div>
<div class="card-body" style="display: none;">
    <form id="search-master-form">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-time">
                        {{ __('label.medical_session.search.title.time') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm daterangepicker-input"
                                   id="input-search-time" @if($dateSearchMs) value="{{$dateSearchMs}}" @endif>
                            <input type="hidden" id="input-search-time-hidden" value="{{$dateSearchMs}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-department">
                        {{ __('label.medical_session.search.title.status') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2" style="width: 100%;" id="input-search-status">
                                <option value="">
                                    --- {{ __('label.medical_session.search.placeholder.status') }} ---
                                </option>
                                @foreach(MedicalSessionConstants::STATUS_TEXT as $key => $value)
                                    <option value="{{ $key }}"
                                            @if($statusSearchMs && $key == $statusSearchMs)
                                                selected
                                            @endif
                                        >
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-status-hidden" value="{{$statusSearchMs}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-md-2">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-status">
                        {{ __('label.medical_session.search.title.key_word') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="input-search-multiple"
                                    placeholder="{{ __('label.medical_session.search.placeholder.code_name_phone') }}"
                                    value="{{$multipleSearchMs}}">
                            <input type="hidden" id="input-search-multiple-hidden" value="{{$multipleSearchMs}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-room">
                        {{ __('label.medical_session.search.title.room') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2" style="width: 100%;" id="input-search-room">
                                <option value="">
                                    --- {{ __('label.medical_session.search.placeholder.room') }} ---
                                </option>
                                @foreach($rooms as $room)
                                    <option value="{{$room->id}}"
                                        @if($roomIdSearchMs && $roomIdSearchMs == $room->id)
                                            selected
                                        @endif
                                    >
                                        {{$room->name}}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-room-hidden" value="{{$roomIdSearchMs}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1 block-button-card-outline">
            <div class="btn-group pull-left">
                <button class="btn btn-info submit" id="search-medical-session">
                    <i class="fa fa-search"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.search') }}
                </button>
            </div>
            <div class="btn-group pull-left undo-card-outline">
                <button class="btn btn-default" onclick="resetFormSearchMedicalSession('#search-master-form')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
