<div id="reset-cadres" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title header-content">
                    <i class="fas fa-edit"></i>
                    {{ __('label.cadres.modal_title_reset') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reset-cadres-form">
                    @csrf
                    <div class="row">
                        <div class="col-2 dt-center">
                            <label for="old_password">
                                {{ __('label.cadres.field.old_password') }}
                                <span class="text-red">(*)</span>
                            </label>
                        </div>
                        <div class="col-10">
                            <input type="password"
                                class="form-control form-control-sm input-form"
                                id="old_password-reset"
                                name="old_password"
                            >
                            <p id="old_password-reset-error" class="error validate-error"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 dt-center">
                            <label for="password">
                                {{ __('label.cadres.field.new_password') }}
                                <span class="text-red">(*)</span>
                            </label>
                        </div>
                        <div class="col-10">
                            <input type="password"
                                class="form-control form-control-sm input-form"
                                id="password-reset"
                                name="password"
                            >
                            <p id="password-reset-error" class="error validate-error"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2 dt-center">
                            <label for="confirm_password">
                                {{ __('label.cadres.field.confirm_password') }}
                                <span class="text-red">(*)</span>
                            </label>
                        </div>
                        <div class="col-10">
                            <input type="password" class="form-control form-control-sm input-form" id="confirm_password-reset" name="confirm_password">
                            <p id="confirm_password-reset-error" class="error validate-error"></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-primary btn-sm reset-password">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
