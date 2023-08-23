@php
    use App\Helpers\CommonHelper;
    use App\Helpers\TextFormatHelper;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    @media print {
        @page {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    }
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
        margin-top: 6px;
        margin-bottom: 8px;
    }

    .diagnose {
        display: flex;
        flex-direction: column;
        padding-left: 15px;
    }

    .diagnose > span {
        margin: 5px;
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

    .medicine-info .btn-medicine-of-medical-session-title,
    .medicine-info p {
        margin: 0 !important;
    }
    </style>

</head>

<body>
    <div class="section">
        <img class="image" src="{{ !empty($setting->logo)
            ? $setting->logo
            : asset("images\logo\ministry_of_health_vietnam_Logo.png") }}" alt="logo"/>
        <div class="flex-box" style="margin-right: auto">
            <div>
                {{ $setting->ministry_of_health ?? __('print.common.header.health_department') }}
            </div>
            <div>{{ $setting->hospital->name ?? '' }}</div>
            <div>{{ $setting->address ?? ''}}</div>
        </div>
        <div class="flex-box">
            <div>{{ __('print.common.cadres.code') }} </div>
            <div>{{ $medicalSession->cadre_code }}</div>
            <div>&nbsp;</div>
        </div>
    </div>
    <div class="section" style="margin-top: 20px; justify-content: center;">
        <div class="flex-box" style="margin-left: 0;">
            <div style="font-size: 17pt; font-weight: bold; text-align: center;">
                {{ __('print.prescription.title') }}
            </div>
            <div>&nbsp;</div>
        </div>
    </div>
    <div class="section" style="margin-top: 12px;">
        <div class="flex-box" style="margin-left: 5px">
            <div class="wrap">{{ __('print.common.cadres.name') }}: {{ $medicalSession->cadre_name }}</div>
            <div class="wrap">{{ __('print.common.cadres.address') }}: {{ $medicalSession->cadre_address }}</div>
            <div>{{ __('print.common.diagnose') }}: </div>
            <div class="diagnose">
                <span>{!! TextFormatHelper::textFormat($medicalSession->diagnose) !!}</span>
            </div>
            <div>{{ __('print.prescription.medicines_to_treat') }}</div>
        </div>
        <div class="flex-box" style="margin-left: 0; align-self: flex-start;">
            <div>{{ __('print.common.cadres.gender') }}:
                {{ $medicalSession->cadre_gender }}
            </div>
        </div>
        <div class="flex-box" style="align-self: flex-start;">
            <div>{{ __('print.common.cadres.birthday') }}:
                {{ $medicalSession->cadre_birthday
                    ? CommonHelper::formatDate($medicalSession->cadre_birthday, YEAR_MONTH_DAY, DAY_MONTH_YEAR)
                    : '' }}
            </div>
        </div>
    </div>
    <div class="section" style="margin-top: 12px;">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><strong>{{ __('print.common.field.ordinal_number') }}</strong></td>
                    <td style="text-align: center; vertical-align: middle;">
                        <strong> {{ __('print.prescription.field.material_name_and_usage') }}</strong>
                    </td>
                    <td class="no-wrap" style="text-align: center; vertical-align: middle;width: 15%">
                        <strong>{{ __('print.common.field.amount') }}</strong>
                    </td>
                </tr>
                @if (!$medicineOfMedicalSessions->isEmpty())
                    @foreach ($medicineOfMedicalSessions as $key => $medicineOfMedicalSession)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="medicine-info">
                                <strong class="btn-medicine-of-medical-session-title">
                                    {{ $medicineOfMedicalSession->materials_name }}
                                </strong>
                                <p class="mb-0 pb-0 mt-1">
                                    {{ $medicineOfMedicalSession->materials_usage }}
                                </p>
                                <p class="mb-0 pb-0">
                                    {!! TextFormatHelper::textFormat($medicineOfMedicalSession->advice) !!}
                                </p>
                            </td>
                            <td style="text-align: center; vertical-align: middle">
                                {{ $medicineOfMedicalSession->materials_amount }}
                                {{ $medicineOfMedicalSession->materials_unit }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="section" style="margin-top: 12px;">
    </div>
    <div class="section" style="margin-top: 12px;">
        <div class="flex-box" style="margin-left: auto;">
            <span style="font-size:11pt;">{{ __('print.common.footer.current_address') }} -
                {{ __('print.common.footer.day') }} {{ date('d') }}
                {{ __('print.common.footer.month') }} {{ date('m') }}
                {{ __('print.common.footer.year') }} {{ date('Y') }}
            </span>
            <span style="text-align: center; margin-top: 5px;">{{ __('print.common.treating_doctor') }}</span>
            <span style="text-align: center; margin-top: 5px; font-size: 14pt; font-weight: bold;">
                @if (!$medicineOfMedicalSessions->isEmpty())
                    {{ $medicineOfMedicalSessions[0]->user?->name }}
                @endif
            </span>
        </div>
    </div>
</body>

</html>
