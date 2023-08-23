<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{ __('title.examination_type_page') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
        <div class="col-sm-6 block-button-add">
            @if(auth()->user()->can('Create-disease'))
                <button type="button" class="btn btn-success open-add-modal"
                        data-toggle="modal" data-target="#add-examination_type">
                    <i class="fas fa-plus mr-2"></i>{{ __('label.common.button.open_add_modal') }}
                </button>
            @endif
        </div>
    </div>
</div>
<div class="card-body" style="display: none;">
    <form id="search-master-form">
        <div class="col-md-12">
            <div class="row">
                <label class="col-md-2 offset-md-2 control-label text-sm-left text-md-right">{{ __('label.examination_type.keyword') }}</label>
                <div class="col-md-4">
                    <div class="input-group input-group-sm">
                        <input type="text"
                            name="keyword"
                            id="keyword-search"
                            class="form-control form-control-sm"
                            placeholder="{{ __('placeholder.examination_type.name') }}">
                        <input type="hidden" id="input-keyword-search-hidden" value="">
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
