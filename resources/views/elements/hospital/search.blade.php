<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{__('label.hospital.title')}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 block-button-add">
            @if(auth()->user()->can('Create-hospital'))
                <button type="button" class="btn btn-success open-add-modal"
                        data-toggle="modal" data-target="#add-hospital">
                    <i class="fas fa-plus mr-2"></i>{{ __('label.common.button.open_add_modal') }}
                </button>
            @endif
        </div>
    </div>
</div>
<div class="card-body" style="display: none;">
    <form id="input-search-hospital">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">
                        {{ __('label.hospital.field.name') }}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="input-search-name"
                                    placeholder="{{ __('label.hospital.field.name') }}">
                            <input type="hidden" id="input-search-name-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">
                        {{ __('label.hospital.field.city_id') }}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2"
                                    style="width: 100%;" id="input-search-city_id">
                                <option value="">
                                    {{ __('label.hospital.field.city_id') }}</option>
                                @foreach($cities as $city)
                                    <option value={{$city->id}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-city_id-hidden" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1 block-button-card-outline">
            <div class="btn-group pull-left">
                <button class="btn btn-info submit" id="search-hospital">
                    <i class="fa fa-search"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.search') }}
                </button>
            </div>
            <div class="btn-group pull-left undo-card-outline">
                <button class="btn btn-default" onclick="resetForm('#input-search-hospital')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
