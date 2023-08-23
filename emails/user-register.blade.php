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

        Cảm ơn bạn đã trở thành thành viên của hệ thống quản lý clinic.<br>

        Email này đã được gửi cho bạn để xác nhận khi bạn được cấp tài khoản đăng ký.<br>

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>

        *Dưới đây là thông tin tài khoản đã đăng ký<br>

        Tên người dùng：{{ $params['data']['user_name'] }}<br>

        @if (isset($params['data']['password'])) Mật khẩu tạm thời：{{ $params['data']['password'] }}<br> @endif

        ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>

        Trên đây là mật khẩu tạm thời, vì vậy vui lòng thay đổi mật khẩu của bạn từ URL bên dưới trong vòng 24 giờ.<br>

        <a href="{{ $params['data']['link'] }}">{{ $params['data']['link'] }}</a><br>

        Lưu ý rằng, bạn cần địa chỉ email và mật khẩu để có thể đăng nhập được hệ thống.<br>

        [Thông tin liên hệ: {{ $setting->clinic_name }}]<br>

        Địa chỉ：{{ $setting->address ?? '' }}<br>

        Số điện thoại：{{ $setting->phone ?? '' }}<br>

        Địa chỉ email：{{ $setting->email ?? ''}}<br>

        --------------------------------------------------
    </div>
</body>

</html>
