@php
    use App\Constants\MedicalSessionConstants;
    use App\Helpers\CommonHelper;
@endphp
<div class="card-header">
    <div class="row">
        <div class="col-md-6">
            <h3 class="card-title">{{ __('title.payment_page') }}</h3>
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
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-time">
                        {{ __('label.medical_session.search.title.time') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            @php
                                $date = CommonHelper::getSession('payment', 'time');
                            @endphp
                            <input type="text" class="form-control form-control-sm" id="input-search-time" value="{{ $date }}">
                            <input type="hidden" id="input-search-time-hidden" value="{{ !empty($date) ? $date : (date('d/m/Y') . ' - ' . date('d/m/Y')) }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-payment-status">
                        {{ __('label.medical_session.search.title.payment_status') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-md">
                        <select class="form-control form-control-sm select2" style="width: 100%;" id="input-search-payment-status">
                                <option value="{{ MedicalSessionConstants::ALL_PAYMENT_STATUS }}">{{ __('label.medical_session.payment_status.all_payment_status') }}</option>
                            @foreach(\App\Constants\MedicalSessionConstants::PAYMENT_STATUS_TEXT as $key => $value)
                                <option value={{$key}}
                                    @if(session('payment') && $key == session('payment')['payment_status'])
                                        selected
                                    @endif >
                                    {{ $value }}
                               </option>
                            @endforeach
                            </select>
                            <input type="hidden" id="input-search-status-hidden" value="{{CommonHelper::getSession('payment', 'payment_status')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-md-2">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-multiple">
                        {{ __('label.medical_session.search.title.key_word') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            @php
                                $multiple = CommonHelper::getSession('payment', 'multiple');
                            @endphp
                            <input type="text" class="form-control form-control-sm" id="input-search-multiple"
                                   placeholder="{{ __('label.payment.search.placeholder.key_word') }}" value="{{ $multiple }}">
                            <input type="hidden" id="input-search-multiple-hidden" value="{{ !empty($multiple) ? $multiple : '' }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center"></div>
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
                <button class="btn btn-default" onclick="resetFilter('#search-master-form')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
