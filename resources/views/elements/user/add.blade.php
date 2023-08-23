<div id="add-user"
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
                    {{ __('title.user_create_page') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-user-form" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="name" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.name') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="name-add"
                                       name="name"
                                >
                                <span id="name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="phone" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.phone') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="phone-add"
                                       name="phone"
                                >
                                <span id="phone-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="email" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.email') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="email-add"
                                       name="email"
                                >
                                <span id="email-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-sm">
                                <label for="address" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.address') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="address-add"
                                       name="address"
                                >
                                <span id="address-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="position" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.position') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="position-add"
                                       name="position"
                                >
                                <span id="position-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="certificate" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.certificate') }}
                                    <span class="text-red" id="certificate-required">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="certificate-add"
                                       name="certificate"
                                >
                                <span id="certificate-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-sm">
                                <label for="role_id" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.role_id') }} <span class="text-red">(*)</span>
                                </label>
                                <div class="form-row">
                                    @if (!$roles->isEmpty())
                                        @foreach ($roles as $value)
                                            <div class="col">
                                                <label class="fw-400">
                                                    <input type="radio"
                                                           id="role_id"
                                                           name="role_id"
                                                           value="{{ $value->id }}"
                                                           class="custom-radio-input"
                                                           @if ($value->name == EXAMINATION_DOCTOR) checked @endif
                                                    >
                                                    {{ $value->default_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <span id="role_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" id="department-hidden">
                            <div class="form-group form-group-sm">
                                <label for="department_id" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.department_id') }}
                                    <span class="text-red" id="department-required">(*)</span>
                                </label>
                                <select class="form-control form-control-sm select2"
                                        id="department_id"
                                        name="department_id"
                                        data-url="{{ route('admin.department.room') }}"
                                        style="width: 100%;"
                                >
                                    <option selected value="">--- {{ __('title.default_select') }} ---</option>
                                    @if (!$departments->isEmpty())
                                        @foreach ($departments as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <span id="department_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6" id="room-hidden">
                            <div class="form-group form-group-sm">
                                <label for="room_id" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.room_id') }}
                                    <span class="text-red" id="room-required">(*)</span>
                                </label>
                                <select class="form-control form-control-sm select2"
                                        id="room_id"
                                        name="room_id[]"
                                        style="width: 100%;"
                                        multiple="multiple"
                                >
                                    <option disabled value="">--- {{ __('title.default_select') }} ---</option>
                                </select>
                                <span id="room_id-add-error" class="error validate-error"></span>
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
                    <button class="btn btn-default margin-left-5 reset" onclick="resetForm('#add-user')">
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
