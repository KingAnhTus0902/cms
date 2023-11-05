<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{__('label.cadres.title')}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 block-button-add">
            @if(auth()->user()->can('Create-cadres'))
                <button type="button" class="btn btn-success open-add-modal"
                        data-toggle="modal" data-target="#add-cadres">
                    <i class="fas fa-plus mr-2"></i>{{ __('label.common.button.open_add_modal') }}
                </button>
            @endif
        </div>
    </div>
</div>
<div class="card-body" style="display: none;">
    <form id="search-master-form">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">{{__("label.cadres.search_name")}}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input
                                type="text"
                                class="form-control form-control-sm id"
                                placeholder="{{__("label.cadres.search_name_ph")}}"
                                id="input-search-name-cadres"
                            />
                            <input type="hidden" id="input-search-name-cadres-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">{{__("label.cadres.search_identity_card_number")}}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input
                                type="text"
                                class="form-control form-control-sm id"
                                placeholder="{{__("label.cadres.search_identity_card_number")}}"
                                id="input-search-identity_card_number"
                            />
                            <input type="hidden" id="input-search-identity_card_number-hidden" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1" style="text-align: center">
            <div class="btn-group pull-left">
                <button class="btn btn-info submit" id="search-cadres">
                    <i class="fa fa-search"></i>&nbsp;&nbsp;{{ __('label.common.button.search') }}
                </button>
            </div>
            <div class="btn-group pull-left" style="margin-left: 10px">
                <button
                    class="btn btn-default"
                    id="search-cadres-clear"
                    ><i class="fa fa-undo"></i>&nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
