@php
    use App\Helpers\CommonHelper;
@endphp
<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{ __('title.medical_test_page') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="card-body" style="display: none;">
    <form id="search-master-form">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">
                        {{ __('label.medical_session.field.medical_examination_day') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            @php
                                $date = CommonHelper::getSession('medical_test', 'medical_examination_day');
                            @endphp
                            <input type="text"
                                   class="form-control daterangepicker-input"
                                   id="medical_examination_day-search"
                                   value="{{ $date }}"
                            >
                            <input type="hidden"
                                   id="input-search-medical_examination_day-hidden"
                                   value="{{ !empty($date) ? $date : date('d/m/Y') . ' - ' . date('d/m/Y') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">
                        {{ __('label.medical_session.field.status') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2" id="status-search">
                                <option value="">--- {{ __('label.medical_session.search.placeholder.status') }}---
                                </option>
                                @foreach(\App\Models\DesignatedServiceOfMedicalSession::$status as $key => $value)
                                    <option value={{ $key }}
                                        @if (session('medical_test') && $key == session('medical_test')['status'])
                                            selected
                                        @endif>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-status-hidden"
                                   value="{{ CommonHelper::getSession('medical_test', 'status') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-md-2">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label
                        class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">{{ __('label.designated_service.field.specialist') }}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2" style="width: 100%;"
                                    id="specialist-search">
                                <option value="">{{ __('placeholder.designated_service.specialist') }}</option>
                                @foreach(\App\Constants\DesignatedServiceConstants::SPECIALIST as $key => $value)
                                    <option value={{ $key }}
                                        @if (session('medical_test') && $key == session('medical_test')['specialist'])
                                            selected
                                        @endif>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-specialist-hidden"
                                   value="{{ CommonHelper::getSession('medical_test', 'specialist') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">
                        {{ __('label.designated_service.field.room_id') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2"
                                    style="width: 100%;"
                                    id="room_id-search"
                            >
                                <option value="">--- {{ __('placeholder.designated_service.room_id') }} ---</option>
                                @foreach($rooms as $value)
                                    @if (\App\Helpers\RoleHelper::getName() == ADMIN)
                                        <option value={{ $value->id }}
                                            @if (
                                                session('medical_test') &&
                                                $value->id == session('medical_test')['room_id'])
                                                selected
                                            @endif>
                                            {{ $value->name }}
                                        </option>
                                    @else
                                        <option value={{ $value->id }}
                                            @if (
                                                session('medical_test') &&
                                                $value->id == session('medical_test')['room_id']
                                            )
                                                selected
                                            @endif
                                        >{{ $value->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-room_id-hidden"
                                   value="{{ CommonHelper::getSession('medical_session', 'room_id') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1 block-button-card-outline">
            <div class="btn-group pull-left">
                <button class="btn btn-info submit" id="search">
                    <i class="fa fa-search"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.search') }}
                </button>
            </div>
            <div class="btn-group pull-left undo-card-outline">
                <button class="btn btn-default" onclick="resetFormSearchMedicalTest('#search-master-form')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
