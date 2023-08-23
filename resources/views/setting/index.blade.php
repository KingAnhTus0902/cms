@extends('layouts.admin')
@section('title', __('title.setting_page'))
@section('content')
    <div class="card">
        <div class="card-header" style="background-color: #ecf0f5">
            <div class="d-flex align-items-center">
                <h3 class="card-title font-sm">{{ __('label.setting.common') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fa fa-filter active m-0"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="setting-form" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="hospital_id" class="col-form-label">
                                    {{ __('label.setting.hospital_id') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control form-control-sm select2" name="hospital_id" style="width: 100%;" id="input-search-status">
                                    @if (!$hospitals->isEmpty())
                                        @foreach($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}"
                                                @if ($hospital->id == $setting->hospital_id)
                                                    selected
                                                @endif>
                                                {{ $hospital->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <span id="hospital_id-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="default_name" class="col-form-label">
                                    {{ __('label.setting.default_name') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                       name="default_name"
                                       class="form-control form-control-sm input-form"
                                       id="default_name"
                                       value="{{ $setting->default_name }}"
                                >
                                <span id="default_name-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="clinic_name" class="col-form-label">
                                    {{ __('label.setting.clinic_name') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                       name="clinic_name"
                                       class="form-control form-control-sm input-form"
                                       id="clinic_name"
                                       value="{{ $setting->clinic_name }}"
                                >
                                <span id="clinic_name-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="logo" class="col-form-label">
                                    {{ __('label.setting.logo') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <div class="upload-container">
                                    <input name="logo[]"
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
                                     src="{{ !empty($setting->logo)
                                        ? $setting->logo
                                        : asset('images/logo/ministry_of_health_vietnam_Logo.png') }}" alt="image"/>
                                <span id="logo-edit-error" class="error validate-error"></span>
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
                                       value="{{ $setting->address }}"
                                >
                                <span id="address-edit-error" class="error validate-error"></span>
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
                                       value="{{ $setting->email }}"
                                >
                                <span id="email-edit-error" class="error validate-error"></span>
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
                                       value="{{ $setting->phone }}"
                                >
                                <span id="phone-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="ministry_of_health" class="col-form-label">
                                    {{ __('label.setting.ministry_of_health') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                       name="ministry_of_health"
                                       class="form-control form-control-sm input-form"
                                       id="ministry_of_health"
                                       value="{{ $setting->ministry_of_health }}"
                                >
                                <span id="ministry_of_health-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="base_salary" class="col-form-label">
                                    {{ __('label.setting.base_salary') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="number"
                                       name="base_salary"
                                       class="form-control form-control-sm input-form number-validate"
                                       id="base_salary"
                                       value="{{ $setting->base_salary }}"
                                >
                                <span id="base_salary-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label for="clinic_name_acronym" class="col-form-label">
                                    {{ __('label.setting.clinic_name_acronym') }} <span class="text-red">(*)</span>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text"
                                    name="clinic_name_acronym"
                                    class="form-control form-control-sm input-form"
                                    id="clinic_name_acronym"
                                    value="{{ $setting->clinic_name_acronym }}"
                                >
                                <span id="clinic_name_acronym-edit-error" class="error validate-error"></span>
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
@endsection

@push('scripts')
    <script>
        const API_UPDATE = '{{ route('admin.setting.update') }}';
    </script>
    <script src="{{ asset('js/pages/setting.js') }}"></script>
@endpush
