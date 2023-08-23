@extends('layouts.admin')
@section('title', __('title.user_info_page'))
@section('content')
    <div class="card">
        <div class="card-header" style="background-color: #ecf0f5">
            <h3 class="card-title" style="font-size: 17px">
                {{ __('title.user_info_page') }}
            </h3>
        </div>
        <div class="card-body">
            <form id="profile-form" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="executor_id" class="col-form-label">
                                    {{ __('label.user.name') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                       name="name"
                                       class="form-control form-control-sm input-form"
                                       id="name"
                                       value="{{ auth()->user()->name }}"
                                >
                                <span id="name-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="avatar" class="col-form-label">
                                    {{ __('label.user.avatar') }}
                                </label>
                            </div>
                            <div class="col-md-2">
                                <div class="upload-container">
                                    <input name="avatar[]"
                                           id="file"
                                           class="form-control form-control-sm input-form d-none"
                                           type="file"
                                    >
                                    <span class="btn btn-success icon-upload">
                                        <i class="fas fa-upload"></i>
                                        <input class="btn" type="button" value="Thêm ảnh" id="upload">
                                    </span>
                                </div>
                                <img id="preview"
                                     src="{{ $user->avatar }}" alt="image"
                                     style="{{ !empty($user->avatar) ? 'display: block;' : 'display: none;' }};"/>
                                <span id="avatar-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="email" class="col-form-label">
                                    {{ __('label.user.email') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                       name="email"
                                       class="form-control form-control-sm input-form"
                                       id="email"
                                       value="{{ $user->email }}"
                                >
                                <span id="email-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="address" class="col-form-label">
                                    {{ __('label.user.address') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                       name="address"
                                       class="form-control form-control-sm input-form"
                                       id="address"
                                       value="{{ $user->address }}"
                                >
                                <span id="address-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="phone" class="col-form-label">
                                    {{ __('label.user.phone') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                       name="phone"
                                       class="form-control form-control-sm input-form"
                                       id="phone"
                                       value="{{ $user->phone }}"
                                >
                                <span id="phone-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="phone" class="col-form-label">
                                    {{ __('label.user.certificate') }}
                                    @if (\App\Helpers\RoleHelper::getByRole([EXAMINATION_DOCTOR, REFERRING_DOCTOR]))
                                        <span class="text-red">(*)</span>
                                    @endif
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                       name="certificate"
                                       class="form-control form-control-sm input-form"
                                       id="certificate"
                                       value="{{ $user->certificate }}"
                                >
                                <span id="certificate-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="text-right">
                            <button class="btn btn-primary btn-sm profile">
                                <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" style="background-color: #ecf0f5">
            <h3 class="card-title" style="font-size: 17px">
                {{ __('title.user_reset_password_page') }}
            </h3>
        </div>
        <div class="card-body">
            <form id="change-password" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="password_old" class="col-form-label">
                                    {{ __('label.user.old_password') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="password"
                                       name="password_old"
                                       class="form-control form-control-sm input-form"
                                       id="password_old"
                                       value=""
                                >
                                <i class="fa fa-fw fa-eye toggle-icon" id="togglePassword"></i>
                                <span id="password_old-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="password" class="col-form-label">
                                    {{ __('label.user.new_password') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="password"
                                       name="password"
                                       class="form-control form-control-sm input-form"
                                       id="password"
                                       value=""
                                >
                                <i class="fa fa-fw fa-eye toggle-icon" id="togglePassword"></i>
                                <span id="password-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="password_confirm" class="col-form-label">
                                    {{ __('label.user.password_confirm') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="password"
                                       name="password_confirm"
                                       class="form-control form-control-sm input-form"
                                       id="password_confirm"
                                       value=""
                                >
                                <i class="fa fa-fw fa-eye toggle-icon"></i>
                                <span id="password_confirm-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="text-right">
                            <button class="btn btn-primary btn-sm change-password">
                                <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        let PROFILE_FORM = '#profile-form';
        let CHANGE_PASSWORD_FORM = '#change-password';

        $.clinicToggle({
            selector: '.toggle-icon',
            icon: 'fa-eye fa-eye-slash'
        });

        $.clinicSaveWithFile({
            selector: '.profile',
            data: PROFILE_FORM,
            url: '{{ route('admin.users.profile') }}',
            method: 'POST',
            options: (response) => {
                $(PROFILE_FORM).find('.validate-error').text('');
                if (response.code === HTTP_UNPROCESSABLE_ENTITY) {
                    showMessageValidate('edit', response.errors);
                } else {
                    $('.label-user').text($('#name').val());
                    $('.user-image').attr('src', $('#preview').attr('src'))
                    swal(response.success, "", "success");
                }
            }
        });

        $.clinicSave({
            selector: '.change-password',
            data: CHANGE_PASSWORD_FORM,
            url: '{{ route('admin.users.change-password') }}',
            method: 'PUT',
            options: (responses) => {
                $(CHANGE_PASSWORD_FORM).find('.validate-error').text('');
                if (responses.code === HTTP_UNPROCESSABLE_ENTITY) {
                    showMessageValidate('edit', responses.message);
                } else {
                    $('#change-password')[0].reset();
                    swal(responses.success, "", "success");
                }
            }
        });

        $.clinicUpload({
            selector: '#upload',
            file_image: '#file',
            preview_image: '#preview'
        });

    </script>
@endpush
