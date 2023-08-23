<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{__('label.room.title')}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 block-button-add">
            @if(auth()->user()->can('Create-room') && $departmentsToCreateRoom->count())
                <button type="button" class="btn btn-success open-add-modal"
                        data-toggle="modal" data-target="#add-room">
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
                    <label class="col-md-5 col-lg-5 col-xl-4 col-xxl-2_5 control-label" for="input-search-code">
                        {{ __('label.room.field.code') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="input-search-code"
                                    placeholder="{{ __('label.room.field.code') }}">
                            <input type="hidden" id="input-search-code-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-location">
                        {{ __('label.room.field.location') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="input-search-location"
                                    placeholder="{{ __('label.room.field.location') }}">
                            <input type="hidden" id="input-search-location-hidden" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-md-2">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-5 col-lg-5 col-xl-4 col-xxl-2_5 control-label" for="input-search-name">
                        {{ __('label.room.field.name') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="input-search-name"
                                    placeholder="{{ __('label.room.field.name') }}">
                            <input type="hidden" id="input-search-name-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-department">
                        {{ __('label.room.field.department') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2" style="width: 100%;" id="input-search-department">
                                <option value="">--- {{ __('label.room.choose_department') }} ---</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-department-hidden" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1 block-button-card-outline">
            <div class="btn-group pull-left">
                <button class="btn btn-info submit" id="search-room">
                    <i class="fa fa-search"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.search') }}
                </button>
            </div>
            <div class="btn-group pull-left undo-card-outline">
                <button class="btn btn-default" onclick="resetForm('#search-master-form')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
