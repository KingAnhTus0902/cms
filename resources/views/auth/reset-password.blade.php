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
    <title>{{ __('title.user_reset_password_page') }}</title>
</head>
<body>
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2"
         style="background-image: url({{ asset('images/clinic-reset-password.jpg') }});">
    </div>
    <div class="contents order-2 order-md-1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="offset-md-2 col-md-10 login-sec">
                    <h2 class="text-center">{{ __('title.user_reset_password_page') }}</h2>
                    <div id="flash-message">
                        @if(Session::has('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <form id="reset-form" method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="password" class="col-form-label">{{ __('label.user.password') }}</label>
                            </div>
                            <div class="col-md-7">
                                <input name="password" type="password" class="form-control form-control-sm"
                                       placeholder="{{ __('placeholder.password') }}">
                            </div>
                            @if($errors->has('firstname'))
                                <div class="error">{{ $errors->first('firstname') }}</div>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="email" class="col-form-label">
                                    {{ __('label.user.password_confirm') }}
                                </label>
                            </div>
                            <div class="col-md-7">
                                <input name="password_confirmation"
                                       placeholder="{{ __('placeholder.password_confirm') }}"
                                       type="password"
                                       class="form-control form-control-sm"
                                >
                                @if($errors->has('firstname'))
                                    <div class="error">{{ $errors->first('firstname') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-10 text-center">
                            <input class="form-control form-control-sm" name="email" type="text" value="{{ $data['email'] }}" hidden>
                            <input class="form-control form-control-sm" name="token" type="text" value="{{ $data['token'] }}" hidden>
                            <button type="submit" class="btn btn-reset-password">{{ __('button.update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
