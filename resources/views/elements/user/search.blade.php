<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{ __('title.user_page') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 block-button-add">
            @if(auth()->user()->can('Create-user') &&
               (\App\Helpers\RoleHelper::getName() == ADMIN || !$departments->isEmpty())
            )
                <button type="button" class="btn btn-success open-add-modal"
                        data-toggle="modal" data-target="#add-user">
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
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">{{ __('label.user.name') }}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text"
                                    name="name"
                                    id="name-search"
                                    class="form-control form-control-sm"
                                    placeholder="{{ __('placeholder.user.name') }}"
                            >
                            <input type="hidden" id="input-search-name-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">{{ __('label.user.role_id') }}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <select class="form-control form-control-sm select2" id="role_id-search">
                                <option value="">--- {{ __('placeholder.user.role') }} ---</option>
                                @foreach($roles as $value)
                                    <option value={{ $value->id }}>{{ $value->default_name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="input-search-role_id-hidden" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-md-2">
            <div class="row justify-content-center">
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">
                        {{ __('label.user.department_id') }}
                    </label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text"
                                    name="department_id"
                                    id="department_id-search"
                                    class="form-control form-control-sm"
                                    placeholder="{{ __('placeholder.department.name') }}">
                            <input type="hidden" id="input-search-department_id-hidden" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label">{{ __('label.user.room_id') }}</label>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text"
                                    name="room_id"
                                    id="room_id-search"
                                    class="form-control form-control-sm"
                                    placeholder="{{ __('placeholder.room.name') }}"
                            >
                            <input type="hidden" id="input-search-room_id-hidden" value="">
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
