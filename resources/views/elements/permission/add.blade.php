<div id="add-permission"
     class="modal fade bd-example-modal-lg"
     tabindex="-1"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('title.permission_create_page') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-permission-form" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="name" class="col-form-label col-form-label-sm">
                                    {{ __('label.permission.name') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="name-add"
                                       name="name"
                                >
                                <span id="name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="type" class="col-form-label col-form-label-sm">
                                    {{ __('label.permission.type') }} <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm select2 w-100" id="type" name="type">
                                    <option selected value="">--- {{ __('title.default_select') }} ---</option>
                                        @foreach (\App\Models\Permission::$type as $key => $value)
                                            <option value="{{ $key }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                </select>
                                <span id="type-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-primary btn-sm add">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-default margin-left-5 reset" onclick="resetForm('#add-permission')">
                        <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
