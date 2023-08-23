<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>

<body>
<?php
$logo = asset('images\logo\ministry_of_health_vietnam_Logo.png');
?>
<div style="background:#f9f9f9;">
    <div style="background-color:#f9f9f9;">
        <div class="m-auto bg-transparent">
            <table class="fs-0 w-100 bg-transparent mx-auto" role="presentation">
                <tbody>
                <tr>
                    <td class="text-center fs-0" style="vertical-align:top; padding:40px 0">
                        <div class="d-inline-block text-left w-100" style="vertical-align:top;font-size:13px;">
                            <table class="w-100" role="presentation">
                                <tbody>
                                <tr>
                                    <td class="fs-0 p-0 word-break mx-auto mx-auto">
                                        <table class="mx-auto" role="presentation">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('home') }}">
                                                        <img alt="" title="" width="150" height="150" src="{{ $logo }}">
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="m-auto; overflow-hidden">
            <div class="bg-white mx-auto" style="max-width:640px;">
                <table class="fs-0 w-100 bg-white" role="presentation">
                    <tbody>
                    <tr>
                        <td class="text-center" style="

                            vertical-align:top;
                            direction:ltr;
                            font-size:0;
                            padding:40px 50px
                        ">
                            <div class="d-inline-block text-left w-100" style="
                                vertical-align:top;
                                direction:ltr;
                                font-size:13px;
                            ">
                                <table role="presentation" class="w-100">
                                    <tbody>
                                    <tr>
                                        <td class="word-break fs-0 p-0 text-start">
                                            <div class="text-left"  style="
                                                color:#737f8d;
                                                font-size:16px;
                                                line-height:24px;
                                            ">
                                                <h2 style="
                                                    font-weight:500;
                                                    font-size:20px;
                                                    color:#4f545c;
                                                    letter-spacing:0
                                                ">
                                                    Kính gửi {{ $params['data']['name'] }},
                                                </h2>
                                                <p>
                                                    Bạn đang yêu cầu đặt lại mật khẩu cho tài khoản của bạn tại
                                                    hệ thống quản lý CLINIC.<br><br>
                                                    Sử dụng mã OTP để xác thực quá trình thay đổi mật khẩu<br>
                                                    Nếu bạn không yêu cầu mật khẩu mới, vui lòng bỏ qua
                                                    email này.<br><br>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="word-break fs-0">
                                            <table class="w-100" role="presentation" style="border-collapse:separate">
                                                <tbody>
                                                <tr>
                                                    <td style="
                                                        display: -webkit-box !important;
                                                        display: -ms-flexbox !important;
                                                        display: flex !important;
                                                        align-items: center;
                                                        justify-content: center;
                                                    ">
                                                        <p style="
                                                            font-size: 30px;
                                                            color: #fff;
                                                            background-color: #4CAF50;
                                                            padding: 5px 15px;
                                                            border-radius: 5px;
                                                        ">{{ $params['data']['otp'] }}</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="word-break w-100" style="padding:30px 0">
                                            <p style="font-size:1px;margin:0 auto;border-top:1px solid #dcddde;"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="word-break fs-0 p-0 text-start">
                                            <div style="color:#737f8d; font-size:16px; line-height:24px;">
                                                <p>
                                                    Mã OTP chỉ có hiệu lực trong 5 phút, vui lòng thay đổi mật khẩu
                                                    bằng mã OTP và không chia sẻ mã này với bất kì ai.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mx-auto bg-transparent" style="max-width:640px;">
            <table class="text-center fs-0 w-100 bg-transparent" role="presentation">
                <tbody>
                    <tr>
                    <td style="
                        text-align:center;
                        vertical-align:top;
                        direction:ltr;
                        font-size:0;
                        padding:20px 0;
                    ">
                        <div style="
                            vertical-align:top;
                            display:inline-block;
                            direction:ltr;
                            font-size:13px;
                            text-align:left;
                            width:100%;
                        ">
                            <table class="w-100" role="presentation">
                                <tbody>
                                <tr>
                                    <td class="word-break fs-0 p-0 mx-auto">
                                        <div class="text-center" style="
                                            color:#99aab5;
                                            font-size:12px;
                                            line-height:24px;
                                        ">
                                            Được gửi bởi hệ thống quản lý CLINIC
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="word-break fs-0 p-0 mx-auto">
                                        <div class="text-center" style="
                                            color:#99aab5;
                                            font-size:12px;
                                            line-height:24px;
                                        ">
                                            Địa chỉ: Tòa nhà Roman Plaza, Đại Mễ , Tố Hữu , Nam Từ Liêm, Hà Nội
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
