<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/icon/clinic-icon.jpg') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('font/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>{{ __('menu.login_page') }}</title>
</head>
<body>
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2 d-none d-sm-block" style="background-image: url({{ asset('images/clinic-login.jpg') }});">
        <div class="d-flex flex-wrap h-100 justify-content-end align-content-end">
            <div class="m-lg-2 p-3 text-center" id="system_name">
                <img class="img-logo mb-2" src="{{ !empty($setting->logo)
                        ? $setting->logo
                        : asset("images\logo\ministry_of_health_vietnam_Logo.png") }}" alt="logo">

                <h3 class="my-2"><strong>{{ $setting->default_name ?? 'Hệ thống CLINIC' }}</strong></h3>
                <p class="mb-4 clinic-description">{{ __('menu.login') }}</p>
            </div>
        </div>
    </div>
    <div class="contents order-2 order-md-1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center mb-4">
                            <div class=" d-block d-sm-none">
                                <img class="img-logo mb-3" src="{{ asset('images\logo\ministry_of_health_vietnam_Logo.png') }}" alt="logo">
                            </div>
                            <h3>Đăng nhập Hệ thống</h3>
                        </div>
                        @include('elements.message')
                        <div class="form-group first">
                            <label for="email">{{ __('menu.email') }}</label>
                            <input value="{{ old('email') }}" type="text" class="form-control form-control-sm @inputValid('email')"
                                   placeholder="{{ __('placeholder.email') }}" name="email">
                            @inputError('email')
                        </div>
                        <div style="clear:both"></div>
                        <div class="form-group last mb-3">
                            <label for="password">{{ __('menu.password') }}</label>
                            <input type="password" class="form-control form-control-sm @inputValid('password')"
                                   placeholder="{{ __('placeholder.password') }}" id="password" name="password">
                            @inputError('password')
                        </div>
                        <div style="clear:both"></div>
                        <div class="d-flex mb-3 align-items-center">
                            <label class="control control--checkbox mb-0">
                                <span class="caption">{{ __('menu.remember') }}</span>
                                <input type="checkbox" checked="checked" class="form-control form-control-sm"/>
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">{{ __('button.login') }}</button>
                        <div class="mt-2">
                            <a href="{{route('password.forgot')}}" class="forgot-pass">{{ __('button.forgot_password') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
