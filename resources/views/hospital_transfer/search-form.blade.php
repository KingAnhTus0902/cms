<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{__('label.hospital_transfer.title')}}</h3>
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
                            <input type="text"
                                   class="form-control form-control-sm daterangepicker-input"
                                   id="input-search-time" @if($dataSearchHospitalTransfer) value="{{$dateSearchHospitalTransfer}} @endif">
                            <input type="hidden" id="input-search-time-hidden" value="{{$dateSearchHospitalTransfer}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">
                        {{__("label.hospital_transfer.field.medical_sessions_id")}}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input
                                type="text"
                                class="form-control form-control-sm id"
                                placeholder="{{__("label.hospital_transfer.field.medical_sessions_id")}}"
                                id="input-search-medical_sessions_id" value="{{$medicalSearchHospitalTransfer}}"
                            />
                            <input type="hidden" id="input-search-medical_sessions_id-hidden" value="{{$medicalSearchHospitalTransfer}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-md-2">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-status">
                        {{__("label.hospital_transfer.field.cadre_name")}}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input
                                type="text"
                                class="form-control form-control-sm id"
                                placeholder="{{__("label.hospital_transfer.field.cadre_name")}}"
                                id="input-search-cadre_name"
                                value="{{$nameSearchHospitalTransfer}}"
                            />
                            <input type="hidden" id="input-search-cadre_name-hidden" value="{{$nameSearchHospitalTransfer}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-room">
                        {{__("label.hospital_transfer.field.identity_card_number")}}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input
                                type="text"
                                class="form-control form-control-sm id"
                                placeholder="{{__("label.hospital_transfer.field.identity_card_number")}}"
                                id="input-search-identity_card_number"
                                value="{{$identityCardNumberSearchHospitalTransfer}}"
                            />
                            <input type="hidden" id="input-search-identity_card_number-hidden"
                                   value="{{$identityCardNumberSearchHospitalTransfer}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1 block-button-card-outline">
            <div class="btn-group pull-left">
                <button class="btn btn-info submit" id="search-hospital_transfer">
                    <i class="fa fa-search"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.search') }}
                </button>
            </div>
            <div class="btn-group pull-left undo-card-outline">
                <button class="btn btn-default" onclick="resetFormSearchHospitalTransfer('#search-master-form')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
