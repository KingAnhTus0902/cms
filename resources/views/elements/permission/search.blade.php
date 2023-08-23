<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{ __('title.permission_page') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 block-button-add">
            <a href="{{ route('admin.permission.getPermission') }}"
               type="button"
               class="btn btn-primary glyphicon glyphicon-hand-up mr-3" style="font-size: 14px">
               {{ __('title.permission_role_page') }}
            </a>
            {{--<button type="button" class="btn btn-success open-add-modal"--}}
                    {{--data-toggle="modal" data-target="#add-permission">--}}
                {{--<i class="fas fa-plus mr-2"></i>{{ __('label.common.button.open_add_modal') }}--}}
            {{--</button>--}}
        </div>
    </div>
</div>
<div class="card-body" style="display: none;">
    <form id="search-master-form">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-5 col-lg-5 col-xl-4_4 col-xxl-3 control-label">{{ __('label.permission.name') }}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text"
                                name="name"
                                id="name-search"
                                class="form-control form-control-sm"
                                placeholder="{{ __('placeholder.permission.name') }}"
                            >
                            <input type="hidden" id="input-search-name-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">{{ __('label.permission.type') }}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2 w-100" id="type-search">
                                <option value="1">{{ __('placeholder.permission.type') }}</option>
                                @foreach(\App\Models\Permission::$type as $key => $value)
                                    <option value={{ $key }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-type-hidden" value="1">
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
                <button class="btn btn-default" onclick="resetForm('#search-master-form')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
        </div>
    </div>
</div>
