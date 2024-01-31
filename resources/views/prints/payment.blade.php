@php
    use App\Helpers\NumberFormatHelper;
    use App\Helpers\CommonHelper;
    use App\Constants\DesignatedServiceConstants;
    use App\Constants\MedicalSessionConstants;
    use App\Constants\Constant;
@endphp
<style>
    .data tr td {
        border: solid;
        border-width: thin;
        padding: 0in 1mm 0in 1mm;
    }

    .data tr.text-right td {
        padding: 0in 1mm 0in 1mm;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .infor tr td {
        height: 20px;
        word-break: break-all;
    }

    .infor, .infor tr {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .box-infor {
        border: solid;
        border-width: thin;
        text-align: center;
        height: 10px;
    }
    .height-no {
        height: 35px;
    }
    .text-left {
        text-align: left;
        margin-left: 1px;
        margin-right: 1px
    }
    .text-right {
        text-align: right;
        margin-left: 1px;
        margin-right: 1px
    }
    body {
        font-family: 'Times New Roman', Times, serif !important;
        font-size: 14pt !important;
        overflow-y: auto;
        padding: 0.5cm;
    }
    @media print {
        .page-break {
            display: block;
            page-break-before: always;
        }
        @page {
            margin: 0.5cm 0cm;
            size: landscape;
        }
        .data { page-break-after:auto }
        tr    { page-break-inside:avoid; page-break-after:auto }
        td    { page-break-inside:avoid; page-break-after:auto }

    }
</style>
<body>
<div class="page-break">
    <table class="infor">
        <tbody>
            <tr>
                <td width="78%">
                    <p><b>Bộ Y tế/ Sở Y tế/ Y tế ngành: {{ $ministry_of_health }}</b></p>
                    <p><b>Cơ sở khám, chữa bệnh: {{ $hospital_name ?? null }}</b></p>
                    <p><b>Khoa: {{ $department['name'] ?? null }}</b></p>
                    <p><b>Mã khoa:  {{ $department['code'] ?? null }}</b></p>
                </td>
                <td width="22%">
                    <p><b>Mẫu số: 01/KBCB</b></p>
                    <p><b>Mã số người bệnh: {{ $cadre_code }}</b></p>
                    <p><b>Số khám bệnh: {{ $code }}</b></p>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="text-align: center;">
        <b>BẢNG KÊ CHI PHÍ<br />KHÁM BỆNH</b>
    </div>
    <br />
    <b>I. {{ __('label.invoice.administrative_section') }}:</b>
    <table class="infor">
        <tr>
            <td width="45%">(1) {{ __('label.invoice.cadre.name') }}: {{ $cadre_name }}</td>
            <td width="40%">{{ __('label.invoice.cadre.birthday') }}:
                {{ CommonHelper::formatDate($cadre_birthday, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
            </td>
            <td width="15%">{{ __('label.invoice.cadre.gender') }}:
                {{ $cadre_gender == MALE ? GENDER[MALE] : GENDER[FEMALE]
                }}
            </td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="70%">(2) {{ __('label.invoice.cadre.address') }}: {{ $cadre_address }}</td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="45%">(3) {{ __('label.invoice.cadre.medical_examination_day') }}:
                {{ $examination_start_invoice['hour'] }} {{ __('label.invoice.hour') }}
                {{ $examination_start_invoice['minute'] }} {{ __('label.invoice.minute') }},
                {{ $examination_start_invoice['day'] }}
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>(4) {{ __('label.invoice.cadre.examination_day') }}:
                {{ $examination_start_invoice['hour'] }} {{ __('label.invoice.hour') }}
                {{ $examination_start_invoice['minute'] }} {{ __('label.invoice.minute') }},
                {{ $examination_start_invoice['day'] }}
            </td>
        </tr>
    </table>
    @if($examination_end_invoice['hour']  != '...')
    <table class="infor">
        <tr>
            <td>(5) {{ __('label.invoice.cadre.medical_examination_day_end') }}:
                {{ $examination_end_invoice['hour'] }} {{ __('label.invoice.hour') }}
                {{ $examination_end_invoice['minute'] }} {{ __('label.invoice.minute') }},
                {{ $examination_end_invoice['day'] }}
            </td>
            <td>{{ __('label.invoice.cadre.total_treatment_days') }}: 0</td>
        </tr>
    </table>
    @endif
    @if($diagnose)
    <table class="infor">
        <tr>
            <td width="70%">(6) {{ __('label.invoice.cadre.diagnose') }}: {{ $diagnose }}</td>
        </tr>
    </table>
    @endif
    @if (!empty($diseases[MedicalSessionConstants::MAIN_DISEASE]))
    <table class="infor">
        <tr>
            <td width="20%">(7) {{ __('label.invoice.cadre.diseases_code') }}:</td>
            <td width="10%" class="box-infor">
                    {{ $diseases[MedicalSessionConstants::MAIN_DISEASE]['disease_code'] }}
            </td>
            <td width="70%"></td>
        </tr>
    </table>
    @endif
    @if (!empty($diseases[MedicalSessionConstants::SUB_DISEASE]))
    <table class="infor">
        <tr>
            <td>(8) {{ __('label.invoice.cadre.sub_disease_name') }}:
                {{ $diseases[MedicalSessionConstants::SUB_DISEASE]['disease_name'] }}
            </td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="20%">(9) {{ __('label.invoice.cadre.sub_disease_code') }}:</td>
            <td width="10%" class="box-infor">
                {{ $diseases[MedicalSessionConstants::SUB_DISEASE]['disease_code'] }}
            </td>
            <td width="70%"></td>
        </tr>
    </table>
    @endif
    <p><b>II. {{ __('label.invoice.medical_examination/treatment_expenses') }}:
    </b></i><br /></p>
</div>
<div>
    <table width="100%" class="data">
        <tr style="text-align: center">
            <td rowspan="2" width="20%"><b>{{ __('label.invoice.invoice.content') }}</b></td>
            <td rowspan="2" width="4%"><b>{{ __('label.invoice.invoice.unit') }}</b></td>
            <td rowspan="2" width="3%"><b>{{ __('label.invoice.invoice.amount') }}</b></td>
            <td rowspan="2" width="8%"><b>{{ __('label.invoice.invoice.service_unit_price') }}</b> <i>(đồng)</i>
            </td>
            <td rowspan="2" width="10%"><b>{{ __('label.invoice.invoice.service_money') }}</b> <i>(đồng)</i></td>

            <td colspan="4" width="24%"><b>{{ __('label.invoice.invoice.payment_source') }}</b> <i>(đồng)</i>
            </td>
        </tr>
        <tr style="text-align: center">
            <td width="16%"><b>{{ __('label.invoice.invoice.patient_self_pay') }}</b></td>
            <td width="16%"><b>{{ __('label.invoice.invoice.other') }}</b></td>
        </tr>
        <tr style="text-align: center">
            <td class="height-no">(1)</td>
            <td class="height-no">(2)</td>
            <td class="height-no">(3)</td>
            <td class="height-no">(4)</td>
            <td class="height-no">(5)</td>
            <td class="height-no">(6)</td>
            <td class="height-no">(7)</td>
        </tr>
        @if ($examination_status == MedicalSessionConstants::STATUS_WAITING || $examination_status == MedicalSessionConstants::STATUS_DONE)
        <tr class="text-right">
            @if (!empty($examination_types))
                <td colspan="6" class="height-no text-left"><b> 1. {{ __('label.invoice.invoice.examination') }}</b></td>
                <td class="height-no"><b></b></td>
        </tr>
        @foreach ($examination_types as $key => $value)
            <tr class="text-right">
                <td class="height-no text-left">{{ $value['name'] }}</td>
                <td class="height-no text-left">{{ __('label.invoice.invoice.time') }}</td>
                <td class="height-no">1</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['service_unit_price'], '', 2, ',', '.') }}</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['service_unit_price'], '', 2, ',', '.') }}</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['service_unit_price'], '', 2, ',', '.') }}</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</td>
            </tr>
        @endforeach
        @endif
        @endif
        @if (!empty($services))
            @foreach ($services as $key => $data)
                @if (!empty($data))
                    <tr class="text-right">
                        <td colspan="6" class="height-no text-left"><b>{{ 3 + $key }}.
                                {{ DesignatedServiceConstants::TYPE_SURGERY[$key] }}</b></td>
                        <td class="height-no"></td>
                    </tr>
                    @foreach ($data as $value)
                        <tr class="text-right">
                            <td class="height-no text-left"> {{ $value['designated_service_name'] }}</td>
                            <td class="height-no text-left"> {{ __('label.invoice.invoice.time') }}</td>
                            <td class="height-no">{{ $value['designated_service_amount'] }}</td>
                            <td class="height-no">{{ NumberFormatHelper::priceFormat($value['designated_service_unit_price'], '', 2, ',', '.') }}
                            </td>
                            <td class="height-no">{{ NumberFormatHelper::priceFormat($value['total_service'], '', 2, ',', '.') }}
                            </td>
                            <td class="height-no">{{ NumberFormatHelper::priceFormat($value['total_service'], '', 2, ',', '.') }}</td>
                            <td class="height-no">{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        @endif
        @if($examination_status == MedicalSessionConstants::STATUS_WAITING_RESULT)
            <tr class="text-right">
                <td colspan="5" class="height-no"><b>Cộng: </b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($services_service_cost, '', 2, ',', '.') }} </b></td>
                <td colspan="6" class="height-no">{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</td>
            </tr>

        @elseif($examination_status == MedicalSessionConstants::STATUS_DONE)
            <tr class="text-right">
                <td colspan="5" class="height-no"><b>Cộng: </b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($sum_service, '', 2, ',', '.') }} </b></td>
                <td colspan="6" class="height-no">{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</td>
            </tr>
        @elseif($examination_status == MedicalSessionConstants::STATUS_WAITING)
            <tr class="text-right">
                <td colspan="5" class="height-no"><b>Cộng: </b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($examinations_service_cost, '', 2, ',', '.') }} </b></td>
                <td colspan="6" class="height-no">{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</td>
            </tr>
        @endif
    </table>
</div>
<div class="page-break">

    @if($examination_status == MedicalSessionConstants::STATUS_WAITING_RESULT)
        <p>Tổng chi phí lần khám bệnh/cả đợt điều trị (làm tròn đến đơn vị đồng):
            {{ NumberFormatHelper::priceFormat($services_service_cost, '', 0, ',', '.') }} Đồng</p>
        <p>(Viết bằng chữ: {{ NumberFormatHelper::convertNumberToWords($services_service_cost, '', 0, ',', '.') }} đồng)</p>
        <p>Trong đó, số tiền do:</p>
        <p>- Người bệnh trả: {{ NumberFormatHelper::priceFormat($services_service_cost, '', 0, ',', '.') }} Đồng</p>
        <p>- Nguồn khác: 0</p>
        <br />
    @elseif($examination_status == MedicalSessionConstants::STATUS_WAITING)
        <p>Tổng chi phí lần khám bệnh/cả đợt điều trị (làm tròn đến đơn vị đồng):
            {{ NumberFormatHelper::priceFormat($examinations_service_cost, '', 0, ',', '.') }} Đồng</p>
        <p>(Viết bằng chữ: {{ NumberFormatHelper::convertNumberToWords($examinations_service_cost, '', 0, ',', '.') }} đồng)</p>
        <p>Trong đó, số tiền do:</p>
        <p>- Người bệnh trả: {{ NumberFormatHelper::priceFormat($examinations_service_cost, '', 0, ',', '.') }} Đồng</p>
        <p>- Nguồn khác: 0</p>
        <br />
    @elseif($examination_status == MedicalSessionConstants::STATUS_DONE)
        <p>Tổng chi phí lần khám bệnh/cả đợt điều trị (làm tròn đến đơn vị đồng):
            {{ NumberFormatHelper::priceFormat($sum_service, '', 0, ',', '.') }} Đồng</p>
        <p>(Viết bằng chữ: {{ NumberFormatHelper::convertNumberToWords($sum_service, '', 0, ',', '.') }} đồng)</p>
        <p>Trong đó, số tiền do:</p>
        <p>- Người bệnh trả: {{ NumberFormatHelper::priceFormat($sum_service, '', 0, ',', '.') }} Đồng</p>
        <p>- Nguồn khác: 0</p>
        <br />
    @endif
    <table>
        <tr>
            <td width="30%" style="text-align: center">
                <b>XÁC NHẬN CỦA NGƯỜI BỆNH</b><br />
                <i>(ký, ghi rõ họ tên)</i><br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
            </td>
            <td width="40%"></td>
            <td width="30%" style="text-align: center">
                <i>Ngày.... tháng... năm...</i><br />
                <b>KẾ TOÁN VIỆN PHÍ</b><br />
                <i>(ký, ghi rõ họ tên)</i><br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <i></i><br />
                <b></b><br />
                <i></i><br />
            </td>
        </tr>
    </table>
</div>
</body>
