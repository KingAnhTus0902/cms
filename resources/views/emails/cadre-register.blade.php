<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
</head>

<body>
    <div>
        *Email này là thư trả lời tự động từ hệ thống.<br>
        Kính gửi {{ $params['data']['name'] }}<br>

        Chúng tôi rất vui mừng thông báo rằng tài khoản của bạn đã được tạo thành công trên hệ thống của chúng tôi.
        Dưới đây là thông tin tài khoản của bạn:<br>

        Địa chỉ email：{{ $params['data']['user_name'] }}<br>

        @if (isset($params['data']['password'])) Mật khẩu tạm thời：{{ $params['data']['password'] }}<br> @endif


        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>

        Nếu bạn gặp bất kỳ vấn đề nào trong quá trình đăng nhập hoặc sử dụng ứng dụng, hãy liên hệ với chúng tôi qua
        thông tin dưới đây.<br>

        [Thông tin liên hệ: {{ $setting->clinic_name ?? '' }}]<br>

        Địa chỉ：{{ $setting->address ?? '' }}<br>

        Số điện thoại：{{ $setting->phone ?? '' }}<br>

        Địa chỉ email：{{ $setting->email ?? ''}}<br><br>

        Trân trọng,<br>
        Nhóm Hỗ trợ của {{ $setting->default_name ?? '' }}<br>

        --------------------------------------------------
    </div>
</body>

</html>
