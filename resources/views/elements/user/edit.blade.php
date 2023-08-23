<div id="edit-user"
     class="modal fade bd-example-modal-lg"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('title.user_edit_page') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="name" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.name') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="name-edit"
                                       name="name"
                                >
                                <span id="name-edit-error" class="error validate-error"></span>
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
                                       id="phone-edit"
                                       name="phone"
                                >
                                <span id="phone-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="email" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.email') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="email-edit"
                                       name="email"
                                >
                                <span id="email-edit-error" class="error validate-error"></span>
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
                                       id="address-edit"
                                       name="address"
                                >
                                <span id="address-edit-error" class="error validate-error"></span>
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
                                       id="position-edit"
                                       name="position"
                                >
                                <span id="position-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm">
                                <label for="certificate" class="col-form-label col-form-label-sm">
                                    {{ __('label.user.certificate') }}
                                    <span class="text-red" id="certificate-required-edit">(*)</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm input-form"
                                       id="certificate-edit"
                                       name="certificate"
                                >
                                <span id="certificate-edit-error" class="error validate-error"></span>
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
                                                           id="role_id-edit"
                                                           name="role_id"
                                                           value="{{ $value->id }}"
                                                           class="custom-radio-input"
                                                    >
                                                    {{ $value->default_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <span id="role_id-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6" id="department-hidden">
                            <div class="form-group form-group-sm">
                                <label for="department_id">{{ __('label.user.department_id') }}
                                    <span class="text-red" id="department-required-edit">*</span>
                                </label>
                                <select class="form-control form-control-sm select2"
                                        name="department_id"
                                        id="department_id-edit-select"
                                        data-url="{{ route('admin.department.room') }}"
                                        style="width: 100%;"
                                >
                                    <option value="">--- {{ __('title.default_select') }} ---</option>
                                    @if (!$departments->isEmpty())
                                        @foreach ($departments as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <span id="department_id-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6" id="room-hidden">
                            <div class="form-group form-group-sm">
                                <label for="room_id">{{ __('label.user.room_id') }}
                                    <span class="text-red" id="room-required-edit">*</span>
                                </label>
                                <select class="form-control form-control-sm select2"
                                        id="room_id-edit-select"
                                        name="room_id[]"
                                        style="width: 100%;"
                                        multiple="multiple"
                                >
                                    <option disabled value="">--- {{ __('title.default_select') }} ---</option>
                                </select>
                                <span id="room_id-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id-edit">
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    @if (auth()->user()->can('Edit-user') &&
                        (\App\Helpers\RoleHelper::getName() == ADMIN ||
                         auth()->user()->id == $value->user_head_id
                         ))
                        <button class="btn btn-primary btn-sm edit">
                            <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                        </button>
                    @endif
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel"
                            data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
