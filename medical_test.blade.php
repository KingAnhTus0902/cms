<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <style>
        .section {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .image {
            width: 80px;
            height: auto;
            vertical-align: top;
        }

        .flex-box {
            display: flex;
            flex-direction: column;
            margin-left: 20px;
        }

        .flex-box > div {
            margin-bottom: 8px;
        }

        .flex-column {
            flex-direction: column;
        }

        .result > * {
            margin: 15px 0;
        }

        .result {
            padding-top: 10px;
            width: 100%;
            text-align: left;
        }

        .result > img {
            width:  150px !important;
            height: auto !important;
        }

        .result > table {
            border-collapse: collapse;
            width: 100%;
        }

        .result > table th,
        .result > table td {
            padding: 8px;
            text-align: left;
        }

        /* Table Header */
        .table thead th {
            background-color: #f8f9fa;
            border: 2px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        /* Table Body */
        .table tbody td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }

        /* Table Striped Rows */
        .table tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        .mt-15 {
            margin-top: 15px;
        }

        .mt-25 {
            margin: 25px;
        }

        .ml-0 {
            margin-left: 0
        }

        .mt-5 {
            margin-top: 5px;
        }

        .fs-13 {
            font-size: 13pt;
        }

        @media print {
            @page {
                size: A4;
            }
        }

        .bold {
            font-weight: bold;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>
@php
    use App\Helpers\CommonHelper;
    use App\Constants\DesignatedServiceConstants;
@endphp
<div class="section mt-15">
    <img class="image"
         src="{{ !empty($setting->logo)
            ? $setting->logo
            : asset('images/logo/ministry_of_health_vietnam_Logo.png') }}"
         alt="logo"
    >
    <div class="flex-box" style="margin-right: auto">
        <div>
            {{ $setting->ministry_of_health ?? __('print.common.header.health_department') }}
        </div>
        <div>{{$setting->hospital->name ?? ''}}</div>
        <div>{{$setting->address ?? ''}}</div>
    </div>
    <div class="flex-box">
        <div>Mã bệnh nhân</div>
        <div>{{ $designatedServiceMedicalSession->medicalSession?->cadre_code }}</div>
        <div>&nbsp;</div>
    </div>
</div>
<div class="section" style="margin-top: 20px; justify-content: center;">
    <div class="flex-box ml-0">
        @php
            $typeSurgery = $designatedServiceMedicalSession->designated_service_type_surgery
        @endphp
        <div class="bold center" style="font-size: 17pt;">KẾT QUẢ {{
            $typeSurgery && isset(DesignatedServiceConstants::TYPE_SURGERY[$typeSurgery])
                ? mb_strtoupper(DesignatedServiceConstants::TYPE_SURGERY[$typeSurgery])
                : 'XÉT NGHIỆM'
        }}</div>
        <div>&nbsp;</div>
    </div>
</div>
<div class="section mt-15">
    <div>Họ v&agrave; t&ecirc;n: {{ $designatedServiceMedicalSession->medicalSession?->cadre_name }}</div>
    <div>Giới tính: {{
            CommonHelper::getGender($designatedServiceMedicalSession->medicalSession?->cadre_gender)
        }}</div>
    <div class="flex-box">Ngày sinh: {{
            $designatedServiceMedicalSession->medicalSession?->cadre_birthday
                ? CommonHelper::formatDate(
                    $designatedServiceMedicalSession->medicalSession?->cadre_birthday,
                    YEAR_MONTH_DAY,
                    DAY_MONTH_YEAR
                )
                : ''
        }}</div>
</div>
<div class="section mt-15">
    <div>Địa chỉ: {{ $designatedServiceMedicalSession->medicalSession?->cadre_address }}</div>
</div>
<div class="section mt-15">
    @php
        $specialList = $designatedServiceMedicalSession->designated_service_specialist;
    @endphp
    <div>Yêu cầu: {{
        $designatedServiceMedicalSession->designated_service_name.
        ' (' .
            ($specialList && isset(DesignatedServiceConstants::SPECIALIST[$specialList])
                ? DesignatedServiceConstants::SPECIALIST[$specialList]
                : ' ')
        . ')'
    }}</div>
</div>
<div class="section mt-15">
    <div class="flex-box ml-0">
        <div>Chẩn đoán: {{ $designatedServiceMedicalSession->medicalSession?->diagnose }}</div>
    </div>
</div>
<div class="section flex-column mt-25">
    <div class="bold center fs-13">Kết quả: </div>
    <div class="result">
        {!!
            $designatedServiceMedicalSession->medical_test_result ??
            $designatedServiceMedicalSession->designatedService?->description
        !!}
    </div>
</div>
<div class="section flex-column mt-25">
    <div class="bold center fs-13">Kết luận: </div>
    <div class="result">
        {{ $designatedServiceMedicalSession->medical_test_conclude }}
    </div>
</div>
<div class="section mt-15">
    <div class="flex-box" style="margin-left: auto;">
        <span style="font-size:11pt;">Hà Nội -
            {{ 'Ngày ' . date('d') . ' tháng ' . date('m') . ' năm ' . date('Y')
        }}</span>
        <span class="center mt-5">BÁC SỸ ĐIỀU TRỊ</span>
        <span class="center mt-5 bold" style="font-size: 14pt;">

        </span>
    </div>
</div>
</body>
</html>
