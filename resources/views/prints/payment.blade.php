@php
    use App\Helpers\NumberFormatHelper;
    use App\Helpers\CommonHelper;
    use App\Constants\DesignatedServiceConstants;
    use App\Constants\CadresConstants;
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
            <td width="20%">(3) {{ __('label.invoice.cadre.medical_insurance_live_code') }}:</td>
            <td width="10%" class="box-infor">{{ $cadre_medical_insurance_live_code }}</td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="11%">(4) {{ __('label.invoice.cadre.medical_insurance_number') }}:</td>
            @if (strlen($cadre_medical_insurance_number) == FIFTEEN_CHAR)
                <td width="5%" class="box-infor">{{ $cadre_medical_insurance_code[0] }}</td>
                <td width="2%" class="box-infor">{{ $cadre_medical_insurance_code[1] }}</td>
                <td width="3%" class="box-infor">{{ $cadre_medical_insurance_code[2] }}</td>
                <td width="15%" class="box-infor">{{ $cadre_medical_insurance_code[3] }}</td>
            @else
                <td width="4%" class="box-infor"></td>
                <td width="4%" class="box-infor"></td>
                <td width="4%" class="box-infor"></td>
                <td width="4%" class="box-infor">{{ substr($cadre_medical_insurance_number, 0, 2) }}</td>
                <td width="4%" class="box-infor">{{ substr($cadre_medical_insurance_number, 2, 3) }}</td>
                <td width="5%" class="box-infor">{{ substr($cadre_medical_insurance_number, 5) }}</td>
            @endif
            <td width="5%"></td>
            <td width="40%">{{ __('label.invoice.cadre.from') }}:
                {{ CommonHelper::formatDate($cadre_medical_insurance_start_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
                {{ __('label.invoice.cadre.to') }}
                {{ CommonHelper::formatDate($cadre_medical_insurance_end_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}</td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="70%">(5) {{ __('label.invoice.cadre.medical_insurance_address') }}:
                {{ $cadre_medical_insurance_address }}</td>
            <td width="18%" class="text-right">(6) {{ __('label.invoice.cadre.hospital_id') }}:</td>
            <td width="2%"></td>
            <td width="10%" class="box-infor">{{ $cadre_hospital_code }}</td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="45%">(7) {{ __('label.invoice.cadre.medical_examination_day') }}:
                {{ $examination_start_invoice['hour'] }} {{ __('label.invoice.hour') }}
                {{ $examination_start_invoice['minute'] }} {{ __('label.invoice.minute') }},
                {{ $examination_start_invoice['day'] }}
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>(8) {{ __('label.invoice.cadre.examination_day') }}:
                {{ $examination_start_invoice['hour'] }} {{ __('label.invoice.hour') }}
                {{ $examination_start_invoice['minute'] }} {{ __('label.invoice.minute') }},
                {{ $examination_start_invoice['day'] }}
            </td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td>(9) {{ __('label.invoice.cadre.medical_examination_day_end') }}:
                {{ $examination_end_invoice['hour'] }} {{ __('label.invoice.hour') }}
                {{ $examination_end_invoice['minute'] }} {{ __('label.invoice.minute') }},
                {{ $examination_end_invoice['day'] }}
            </td>
            <td>{{ __('label.invoice.cadre.total_treatment_days') }}: 0</td>
            <td width="15%">{{ __('label.invoice.cadre.discharge_status') }}:</td>
            <td width="10%" class="box-infor"></td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="10%">(11) {{ __('label.invoice.cadre.emergency') }}</td>
            <td width="3%" class="box-infor">
                @if ($is_emergency == MedicalSessionConstants::EMERGENCY)
                    {{ __('label.invoice.cadre.checked') }}
                @endif
            </td>
            <td width="2%"></td>
            <td width="11%">(12) {{ __('label.invoice.cadre.right_treatment_line') }}</td>
            <td width="3%" class="box-infor">
                @if ($treatment_line == MedicalSessionConstants::RIGHT_TREATMENT_LINE)
                    {{ __('label.invoice.cadre.checked') }}
                @endif
            </td>
            <td width="1%"></td>
            <td width="20%">{{ __('label.invoice.cadre.move_from') }}:</td>
            <td width="20%">{{ __('label.invoice.cadre.move_to') }}:</td>
            <td width="11%">(13) {{ __('label.invoice.cadre.on_treatment_line') }}</td>
            <td width="3%" class="box-infor">
                @if ($treatment_line == MedicalSessionConstants::ON_TREATMENT_LINE)
                    {{ __('label.invoice.cadre.checked') }}
                @endif
            </td>
            <td width="1%"></td>
            <td width="12%">(14) {{ __('label.invoice.cadre.opposite_treatment_line') }}</td>
            <td width="3%" class="box-infor">
                @if ($treatment_line == MedicalSessionConstants::OPPOSITE_TREATMENT_LINE)
                    {{ __('label.invoice.cadre.checked') }}
                @endif
            </td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="70%">(15) {{ __('label.invoice.cadre.diagnose') }}: {{ $diagnose }}</td>
            <td width="20%">(16) {{ __('label.invoice.cadre.diseases_code') }}:</td>
            <td width="10%" class="box-infor">
                @if (!empty($diseases[MedicalSessionConstants::MAIN_DISEASE]))
                    {{ $diseases[MedicalSessionConstants::MAIN_DISEASE]['disease_code'] }}
                @endif
            </td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td>(17) {{ __('label.invoice.cadre.sub_disease_name') }}:
                @if (!empty($diseases[MedicalSessionConstants::SUB_DISEASE]))
                    {{ $diseases[MedicalSessionConstants::SUB_DISEASE]['disease_name'] }}
                @endif
            </td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td width="20%">(18) {{ __('label.invoice.cadre.sub_disease_code') }}:</td>
            <td width="10%" class="box-infor">
                @if (!empty($diseases[MedicalSessionConstants::SUB_DISEASE]))
                    {{ $diseases[MedicalSessionConstants::SUB_DISEASE]['disease_code'] }}
                @endif
            </td>
            <td width="70%"></td>
        </tr>
    </table>
    <table class="infor">
        <tr>
            <td>
                (19) {{ __('label.invoice.cadre.05_years_from_the_date') }}:
                @if (!empty($cadre_is_long_date) && $cadre_is_long_date == CadresConstants::IS_LONG_DATE_ONE)
                    {{ CommonHelper::formatDate(
                        $cadre_medical_insurance_start_date,
                        YEAR_MONTH_DAY,
                        DAY_MONTH_YEAR)
                    }}
                @endif
            </td>
            <td>
                (20) {{ __('label.invoice.cadre.exemption_from_the_date') }}:
                @if (!empty($cadre_is_long_date) && $cadre_is_long_date == CadresConstants::IS_LONG_DATE_ONE)
                    {{ CommonHelper::formatDate(
                        $cadre_medical_insurance_end_date,
                        YEAR_MONTH_DAY,
                        DAY_MONTH_YEAR)
                    }}
                @endif
            </td>
        </tr>
    </table>
    <p><b>II. {{ __('label.invoice.medical_examination/treatment_expenses') }}:
    </b><i>({{ __('label.invoice.note') }})</i><br /></p>
    <table class="infor">
        <tr>
            <td width="11%">{{ __('label.invoice.cadre.medical_insurance_number') }}:</td>
            @if (strlen($cadre_medical_insurance_number) == FIFTEEN_CHAR)
                <td width="5%" class="box-infor">{{ $cadre_medical_insurance_code[0] }}</td>
                <td width="2%" class="box-infor">{{ $cadre_medical_insurance_code[1] }}</td>
                <td width="3%" class="box-infor">{{ $cadre_medical_insurance_code[2] }}</td>
                <td width="15%" class="box-infor">{{ $cadre_medical_insurance_code[3] }}</td>
            @else
                <td width="4%" class="box-infor"></td>
                <td width="4%" class="box-infor"></td>
                <td width="4%" class="box-infor"></td>
                <td width="4%" class="box-infor">{{ substr($cadre_medical_insurance_number, 0, 2) }}</td>
                <td width="4%" class="box-infor">{{ substr($cadre_medical_insurance_number, 2, 3) }}</td>
                <td width="5%" class="box-infor">{{ substr($cadre_medical_insurance_number, 5) }}</td>
            @endif
            <td width="5%"></td>
            <td width="20%">{{ __('label.invoice.cadre.from') }}:
                {{ CommonHelper::formatDate($cadre_medical_insurance_start_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
                {{ __('label.invoice.cadre.to') }}
                {{ CommonHelper::formatDate($cadre_medical_insurance_start_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
            </td>
            <td width="10%">{{ __('label.invoice.benefit_rate') }}:</td>
            <td width="10%" class="box-infor">{{ $benefit_rate }}</td>
        </tr>
    </table>
    <br />
    <p>({{ __('label.invoice.medical_costs_from_date') }}
        {{ CommonHelper::formatDate($cadre_medical_insurance_start_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
        {{ __('label.invoice.medical_costs_to_date') }}
        {{ CommonHelper::formatDate($cadre_medical_insurance_start_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }} )
    </p>
</div>
<div class="page-break">
    <table width="100%" class="data">
        <tr style="text-align: center">
            <td rowspan="2" width="20%"><b>{{ __('label.invoice.invoice.content') }}</b></td>
            <td rowspan="2" width="4%"><b>{{ __('label.invoice.invoice.unit') }}</b></td>
            <td rowspan="2" width="3%"><b>{{ __('label.invoice.invoice.amount') }}</b></td>
            <td rowspan="2" width="8%"><b>{{ __('label.invoice.invoice.service_unit_price') }}</b> <i>(đồng)</i>
            </td>
            <td rowspan="2" width="8%"><b>{{ __('label.invoice.invoice.insurance_unit_price') }}</b>
                <i>(đồng)</i></td>
            <td rowspan="2" width="4%"><b>{{ __('label.invoice.invoice.service_payment_rate') }}</b> <i>(%)</i>
            </td>
            <td rowspan="2" width="10%"><b>{{ __('label.invoice.invoice.service_money') }}</b> <i>(đồng)</i></td>
            <td rowspan="2" width="4%"><b>{{ __('label.invoice.invoice.insurance_payment_rate') }}</b>
                <i>(%)</i></td>
            <td rowspan="2" width="10%"><b>{{ __('label.invoice.invoice.insurance_money') }}</b> <i>(đồng)</i>
            </td>
            <td colspan="4" width="24%"><b>{{ __('label.invoice.invoice.payment_source') }}</b> <i>(đồng)</i>
            </td>
        </tr>
        <tr style="text-align: center">
            <td width="9%"><b>{{ __('label.invoice.invoice.health_insurance_fund') }}</b></td>
            <td width="9%"><b>{{ __('label.invoice.invoice.patient_pays_the_same') }}</b></td>
            <td width="4%"><b>{{ __('label.invoice.invoice.other') }}</b></td>
            <td width="10%"><b>{{ __('label.invoice.invoice.patient_self_pay') }}</b></td>
        </tr>
        <tr style="text-align: center">
            <td class="height-no">(1)</td>
            <td class="height-no">(2)</td>
            <td class="height-no">(3)</td>
            <td class="height-no">(4)</td>
            <td class="height-no">(5)</td>
            <td class="height-no">(6)</td>
            <td class="height-no">(7)</td>
            <td class="height-no">(8)</td>
            <td class="height-no">(9)</td>
            <td class="height-no">(10)</td>
            <td class="height-no">(11)</td>
            <td class="height-no">(12)</td>
            <td class="height-no">(13)</td>
        </tr>
        <tr class="text-right">
            @if (!empty($examination_types))
                <td colspan="6" class="height-no text-left"><b> 1. {{ __('label.invoice.invoice.examination') }}</b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($examinations_service_cost, '', 2, ',', '.') }}</b></td>
                <td class="height-no"></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($examinations_insurance_cost, '', 2, ',', '.') }}</b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(($examinations_insurance_cost * $benefit_rate) / 100, '', 2, ',', '.') }}</td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(($examinations_insurance_cost - (($examinations_insurance_cost * $benefit_rate) / 100)), '', 2, ',', '.') }}</b>
                </td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</b></td>
        </tr>
        @foreach ($examination_types as $key => $value)
            <tr class="text-right">
                <td class="height-no text-left">{{ $value['name'] }}</td>
                <td class="height-no text-left">{{ __('label.invoice.invoice.time') }}</td>
                <td class="height-no">1</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['service_unit_price'], '', 2, ',', '.') }}</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['insurance_unit_price'], '', 2, ',', '.') }}</td>
                <td class="height-no">
                    @if ($key == 0)
                        100
                    @elseif($key >= 1 && $key <= 3)
                        30
                    @else
                        0
                    @endif
                </td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['service_unit_price'], '', 2, ',', '.') }}</td>
                <td class="height-no">100</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['insurance_unit_price'], '', 2, ',', '.') }}</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat(($value['insurance_unit_price'] * $benefit_rate) / 100, '', 2, ',', '.') }}</td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat(($value['insurance_unit_price'] - (($value['insurance_unit_price'] * $benefit_rate) / 100)), '', 2, ',', '.') }}
                </td>
                <td class="height-no"></td>
                <td class="height-no">{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</td>
            </tr>
        @endforeach
        @endif
        @if (!empty($services))
            @foreach ($services as $key => $data)
                @if (!empty($data))
                    <tr class="text-right">
                        <td colspan="6" class="height-no text-left"><b>{{ 3 + $key }}.
                                {{ DesignatedServiceConstants::TYPE_SURGERY[$key] }}</b></td>
                        <td class="height-no"></td>
                        <td class="height-no"></td>
                        <td class="height-no"></td>
                        <td class="height-no"></td>
                        <td class="height-no"></td>
                        <td class="height-no"></td>
                        <td class="height-no"></td>
                    </tr>
                    @foreach ($data as $value)
                        @if ($value['use_insurance'] == 1)
                            <tr class="text-right">
                                <td class="height-no text-left"> {{ $value['designated_service_name'] }}</td>
                                <td class="height-no text-left"> {{ __('label.invoice.invoice.time') }}</td>
                                <td class="height-no">{{ $value['designated_service_amount'] }}</td>
                                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['designated_service_unit_price'], '', 2, ',', '.') }}
                                </td>
                                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['designated_insurance_unit_price'], '', 2, ',', '.') }}
                                </td>
                                <td class="height-no">100</td>
                                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['total_service'], '', 2, ',', '.') }}</td>
                                <td class="height-no">100</td>
                                <td class="height-no">{{ NumberFormatHelper::priceFormat($value['total_insurance'], '', 2, ',', '.') }}</td>
                                <td class="height-no">{{ NumberFormatHelper::priceFormat(($value['total_insurance'] * $benefit_rate) / 100, '', 2, ',', '.') }}
                                </td>
                                <td class="height-no">{{ NumberFormatHelper::priceFormat(($value['total_insurance'] - (($value['total_insurance'] * $benefit_rate) / 100)), '', 2, ',', '.') }}
                                </td>
                                <td class="height-no"></td>
                                <td class="height-no">{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
        @if (!empty($medicines))
            <tr class="text-right">
                <td colspan="6" class="height-no text-left"><b> 8. Thuốc, dịch truyền</b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($medicines_service_cost, '', 2, ',', '.') }}</b></td>
                <td class="height-no"></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($medicines_insurance_cost, '', 2, ',', '.') }}</b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(($medicines_insurance_cost * $benefit_rate) / 100, '', 2, ',', '.') }}</b>
                </td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(($medicines_insurance_cost - (($medicines_insurance_cost * $benefit_rate) / 100)), '', 2, ',', '.') }}</b>
                </td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</b></td>
                <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</b></td>
            </tr>
            @foreach ($medicines as $key => $value)
                @if ($value['use_insurance'] == 1)
                    <tr class="text-right">
                        <td class="height-no text-left"> {{ $value['materials_name'] }}</td>
                        <td class="height-no text-left"> {{ $value['materials_unit'] }}</td>
                        <td class="height-no">{{ $value['materials_amount'] }}</td>
                        <td class="height-no">{{ NumberFormatHelper::priceFormat($value['materials_unit_price'], '', 2, ',', '.') }}</td>
                        <td class="height-no">{{ NumberFormatHelper::priceFormat($value['materials_insurance_unit_price'], '', 2, ',', '.') }}</td>
                        <td class="height-no">100</td>
                        <td class="height-no">{{ NumberFormatHelper::priceFormat($value['total_service'], '', 2, ',', '.') }}</td>
                        <td class="height-no">100</td>
                        <td class="height-no">{{ NumberFormatHelper::priceFormat($value['total_insurance'], '', 2, ',', '.') }}</td>
                        <td class="height-no">{{ NumberFormatHelper::priceFormat(($value['total_insurance'] * $benefit_rate) / 100, '', 2, ',', '.') }}
                        </td>
                        <td class="height-no">{{ NumberFormatHelper::priceFormat(($value['total_insurance'] - (($value['total_insurance'] * $benefit_rate) / 100)), '', 2, ',', '.') }}
                        </td>
                        <td class="height-no"></td>
                        <td class="height-no">{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</td>
                    </tr>
                @endif
            @endforeach
        @endif
        <tr class="text-right">
            <td colspan="6" class="height-no"><b>Cộng: </b></td>
            <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($sum_service, '', 2, ',', '.') }}</b></td>
            <td class="height-no"></td>
            <td class="height-no"><b>{{ NumberFormatHelper::priceFormat($sum_insurance, '', 2, ',', '.') }}</b></td>
            <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(($sum_insurance * $benefit_rate) / 100, '', 2, ',', '.') }}</b></td>
            <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(($sum_insurance - (($sum_insurance * $benefit_rate) / 100)), '', 2, ',', '.') }}</b></td>
            <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</b></td>
            <td class="height-no"><b>{{ NumberFormatHelper::priceFormat(0, '', 2, ',', '.') }}</b></td>
        </tr>
    </table>
</div>
<div class="page-break">
    <p>Tổng chi phí lần khám bệnh/cả đợt điều trị (làm tròn đến đơn vị đồng):
        {{ NumberFormatHelper::priceFormat($sum_insurance, '', 0, ',', '.') }} Đồng</p>
    <p>(Viết bằng chữ: {{ NumberFormatHelper::convertNumberToWords($sum_insurance, '', 0, ',', '.') }} đồng)</p>
    <p>Trong đó, số tiền do:</p>
    <p>- Quỹ BHYT thanh toán: {{ NumberFormatHelper::priceFormat(($sum_insurance * $benefit_rate) / 100, '', 0, ',', '.') }}</p>
    <p>- Người bệnh trả, trong đó:</p>
    <p>+ Cùng trả trong phạm vi BHYT:
        {{ NumberFormatHelper::priceFormat(($sum_insurance - (($sum_insurance * $benefit_rate) / 100)), '', 0, ',', '.') }}</p>
    <p>+ Các khoản phải trả khác: 0</p>
    <p>- Nguồn khác: 0</p>
    <br />
    <table>
        <tr>
            <td width="30%" style="text-align: center">
                <b>NGƯỜI LẬP BẢNG KÊ</b><br />
                <i>(ký, ghi rõ họ tên)</i><br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <b>XÁC NHẬN CỦA NGƯỜI BỆNH</b><br />
                <i>(ký, ghi rõ họ tên)</i><br />
                <b>(Tôi đã nhận ... phim ... Xquang/CT/MRl)</b>
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
                <i>Ngày.... tháng... năm...</i><br />
                <b>GIÁM ĐỊNH BHYT</b><br />
                <i>(ký, ghi rõ họ tên)</i><br />
            </td>
        </tr>
    </table>
</div>
</body>
