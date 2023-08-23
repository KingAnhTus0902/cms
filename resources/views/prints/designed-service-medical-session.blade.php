@php
    use App\Helpers\TextFormatHelper;
    use App\Helpers\CommonHelper;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .section {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .image {
            width: 60px;
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

        .diagnose {
            display: flex;
            flex-direction: column;
            padding-left: 15px;
        }

        .diagnose > span {
            margin: 0;
        }

        /* Table */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Table Header */
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        /* Table Body */
        .table tbody td {
            border-bottom: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            padding: 8px;
        }

        /* Table Striped Rows */
        .table tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        /* Table Bordered */
        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .no-wrap {
            white-space: nowrap;
        }

        .wrap {
            word-break: break-word;
            overflow-wrap: anywhere;
        }

        .text-sm {
            font-size: 12px;
        }

        .header-title {
                font-size: 11px;
                margin-bottom: 5px !important;
        }

        .center {
            text-align: center !important;
        }

        @media print {
            @page {
                size: A5;
            }
        }
    </style>
</head>

<body>
    @if (!$designatedServiceMedicalSession->isEmpty())
        @foreach ($designatedServiceMedicalSession as $value)
            <div class="main" style="page-break-after: always;">
                <div class="section">
                    <img class="image"
                        src="{{ !empty($setting->logo) ? $setting->logo :
                        asset('images\logo\ministry_of_health_vietnam_Logo.png') }}"
                        alt="logo" />
                    <div class="flex-box" style="margin-right: auto">
                        <div class="header-title">
                            {{ $setting->ministry_of_health ?? __('print.common.header.health_department') }}
                        </div>
                        <div class="header-title">{{ $setting->hospital->name ?? '' }}</div>
                        <div class="header-title">{{ $setting->address ?? '' }}</div>
                    </div>
                    <div class="flex-box">
                        <div class="header-title">Mã bệnh nhân</div>
                        <div class="header-title">{{ $medicalSession->cadre_code }}</div>
                        <div>&nbsp;</div>
                    </div>
                </div>
                <div class="section" style="margin-top: 12px; justify-content: center;">
                    <div class="flex-box" style="margin-left: 0;">
                        <div style="font-size: 15pt; font-weight: bold; text-align: center;">PHIẾU CHỈ ĐỊNH CLS, TTPT</div>
                        <div>&nbsp;</div>
                    </div>
                </div>
                <div class="section">
                    <div class="flex-box" style="margin-left: 5px">
                        <div class="wrap text-sm">Họ v&agrave; t&ecirc;n: {{ $medicalSession->cadre_name }}</div>
                        <div class="wrap text-sm">Địa chỉ: {{ $medicalSession->cadre_address }}</div>
                        <div class="text-sm">Chẩn đoán: </div>
                    </div>
                    <div class="flex-box" style="margin-left: 0; align-self: flex-start;">
                        <div class="text-sm">Giới tính: {{
                           $medicalSession->cadre_gender
                        }}</div>
                    </div>
                    <div class="flex-box" style="align-self: flex-start;">
                        <div class="text-sm">Ngày sinh:
                            {{ $medicalSession->cadre_birthday
                                ? CommonHelper::formatDate(
                                    $medicalSession->cadre_birthday, YEAR_MONTH_DAY, DAY_MONTH_YEAR
                                ) : '' }}
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="diagnose">
                        <span class="text-sm">
                            {!! TextFormatHelper::textFormat($medicalSession->diagnose) !!}
                        </span>
                    </div>
                </div>
                <div class="section" style="margin-top: 12px;">
                    <div class="text-sm">Phòng thực hiện :
                        @if (!$value->isEmpty())
                            {{ $value[0]->room?->name }}
                        @endif
                    </div>
                </div>
                <div class="section" style="margin-top: 12px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="center text-sm">STT</th>
                                <th class="no-wrap center text-sm">Yêu cầu</th>
                                <th class="no-wrap center text-sm">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$value->isEmpty())
                                @foreach ($value as $k => $v)
                                    <tr>
                                        <td class="center text-sm">{{ $k + 1 }}</td>
                                        <td tabindex="0">
                                            <strong class="wrap text-sm">{{ $v->designated_service_name }}</strong>
                                            <p style="padding: 5px 0 0; margin: 0;" class="text-sm">
                                                <small>
                                                    {!! TextFormatHelper::textFormat($v->description) !!}
                                                </small>
                                            </p>
                                        </td>
                                        <td class="center text-sm">{{ $v->designated_service_amount }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="section" style="margin-top: 12px;">
                    <div class="flex-box" style="margin-left: auto;">
                        <span class="text-sm">Hà Nội -
                            {{ 'Ngày ' . date('d') . ' tháng ' . date('m') . ' năm ' . date('Y') }}</span>
                        <span style="text-align: center; margin-top: 5px; font-size: 14px">BÁC SỸ ĐIỀU TRỊ</span>
                        <span class="text-sm" style="text-align: center; margin-top: 5px; font-weight: bold;">
                            @if (!$value->isEmpty())
                                {{ $value[0]->user?->name }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            @if (!$loop->last)
                <br><br>
            @endif
        @endforeach
    @endif
</body>

</html>
