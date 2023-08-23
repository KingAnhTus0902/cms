<div class="card-header">
    <h1 class="card-title">{{ __('label.material.title') }}</h1>
    <button type="button" class="btn btn-tool"
            data-card-widget="collapse" title="{{ __('label.common.button.search') }}">
        <i class="fa fa-filter active"></i>
    </button>
    <div class="card-tools">
        @if(auth()->user()->can('Create-material'))
            <button type="button" class="btn btn-success open-add-modal" data-toggle="modal" data-target="#add-material"><i
                    class="fas fa-plus mr-2"></i>{{ __('label.common.button.open_add_modal') }}
            </button>
        @endif
    </div>
</div>
<div class="card-body" style="display: none; padding-top: 10px;">
    <div id="material-search-form">
        <div>
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-6 row justify-content-center">
                        <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="input-search-material">
                            {{ __('label.material.keyword') }}
                        </label>
                        <div class="col-md-7">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm id"
                                    placeholder="{{ __('label.material.search_keyword') }}" id="input-search-material"
                                    value="">
                                <input type="hidden" id="input-search-hidden" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 row justify-content-center">
                        <label class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 control-label" for="select-material">
                            {{ __('label.material.material_type') }}
                        </label>
                        <div class="col-md-7">
                            <div class="input-group input-group-sm">
                                <select class="form-control form-control-sm select2" style="width: 100%;" id="select-material">
                                    <option value="">--- {{ __('label.material.choose_material_type') }} ---</option>
                                    @foreach ($materialTypes as $materialType)
                                        <option value="{{ $materialType->id }}">{{ $materialType->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="select-material-type-hidden" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-10 offset-md-1 block-button-card-outline">
                <div class="btn-group pull-left">
                    <button class="btn btn-info submit" id="search-material">
                        <i class="fa fa-search"></i>
                        &nbsp;&nbsp;{{ __('label.common.button.search') }}
                    </button>
                </div>
                <div class="btn-group pull-left undo-card-outline">
                    <button class="btn btn-default" onclick="resetMaterialFormSearch('#material-search-form')">
                        <i class="fa fa-undo"></i>
                        &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
