@php
    use App\Helpers\NumberFormatHelper;
    use App\Constants\MedicalSessionConstants;
    use App\Helpers\CommonHelper;
@endphp
<table id="disease-table" class="table table-bordered dtr-inline table-striped">
    <thead>
        <tr></tr>
        <tr>
            <th colspan="1"></th>
            <th colspan="8">Tên cơ sở khám, chữa bệnh:&ensp;&ensp;{{$hospital->name}} </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th colspan="3">Mẫu số: C79a – HD</th>
        </tr>
        <tr>
            <th colspan="1"></th>
            <th colspan="5">Mã số:&ensp;&ensp;{{$hospital->code}}</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th colspan="3">(Ban hành theo Thông tư số 178/2012/TT-BTC ngày 23/10/2012 của Bộ Tài chính)</th>
        </tr>
        <tr>
            <th colspan="1"></th>
            <th colspan="23">DANH SÁCH NGƯỜI BỆNH BẢO HIỂM Y TẾ KHÁM CHỮA BỆNH NGOẠI TRÚ ĐỀ NGHỊ THANH TOÁN</th>
        </tr>
        <tr>
            <th colspan="1"></th>
            <th colspan="23">Từ ngày: {{ $time[0] }} Đến ngày: {{ $time[1] }}</th>
        </tr>
        <tr></tr>

        <tr>
            <th></th>
            <th colspan="21"></th>
            <th class="text-center" colspan="2">Đơn vị: đồng</th>
        </tr>
        <tr>
            <th></th>
            <th class="text-center" rowspan="3">{{ __('label.common.field.order') }}</th>
            <th class="text-center" rowspan="3">{{ __('label.medical_session.field.cadres_name') }}</th>
            <th class="text-center" colspan="2">{{ __('label.medical_session.field.cadres_birthday') }}</th>
            <th class="text-center" rowspan="3">{{ __('label.invoice.cadre.medical_insurance_number') }}</th>
            <th class="text-center" rowspan="3">{{ __('label.medical_session.field.place_code') }}</th>
            <th class="text-center" rowspan="3">{{ __('label.disease.code') }}</th>
            <th class="text-center" rowspan="3">{{ __('label.medical_session.field.medical_examination_day') }}</th>
            <th class="text-center" colspan="12" rowspan="1">{{ __('label.medical_session.field.total_medical_expenses') }}</th>
            <th class="text-center" rowspan="3">{{ __('label.medical_session.field.the_patient_pays') }}</th>
            <th class="text-center" rowspan="1" colspan="2">{{ __('label.medical_session.field.request_social_insurance_to_pay') }}</th>
        </tr>
        <tr>
            <th></th>
            <th class="text-center" rowspan="2">{{ __('label.medical_session.field.male') }}</th>
            <th class="text-center" rowspan="2">{{ __('label.medical_session.field.female') }}</th>
            <th class="text-center" rowspan="2">{{ __('label.medical_session.field.total') }}</th>
            <th class="text-center" colspan="6">{{ __('label.medical_session.field.payout_rates_not_apply') }}</th>
            <th class="text-center" colspan="3">{{ __('label.medical_session.field.prorated_payment') }}</th>
            <th class="text-center" rowspan="2">{{ __('label.medical_session.field.examination_price') }}</th>
            <th class="text-center" rowspan="2">{{ __('label.medical_session.field.transport') }}</th>
            <th class="text-center" rowspan="2">{{ __('label.medical_session.field.total') }}</th>
            <th class="text-center truncate-text" rowspan="2" title="{{ __('label.medical_session.field.outside_price') }}">{{ __('label.medical_session.field.outside_price') }}</th>
        </tr>
        <tr>
            <th></th>
            <th class="text-center">{{ __('label.medical_test.name') }}</th>
            <th class="text-center">{{ __('label.medical_session.field.cdhatdcn') }}</th>
            <th class="text-center">{{ __('label.material_type.type.medicine') }}</th>
            <th class="text-center">{{ __('label.medical_session.field.blood') }}</th>
            <th class="text-center">{{ __('label.medical_session.field.ttpt') }}</th>
            <th class="text-center">{{ __('label.medical_session.field.medical_supplies') }}</th>
            <th class="text-center">DVKT</th>
            <th class="text-center">{{__('label.material_type.type.medicine') }}</th>
            <th class="text-center">{{ __('label.medical_session.field.medical_supplies') }}</th>
        </tr>
        <tr>
            <th></th>
            <th class="text-center">A</th>
            <th class="text-center">B</th>
            <th class="text-center">C</th>
            <th class="text-center">D</th>
            <th class="text-center">E</th>
            <th class="text-center">G</th>
            <th class="text-center">H</th>
            <th class="text-center">I</th>
            <th class="text-center">(1)</th>
            <th class="text-center">(2)</th>
            <th class="text-center">(3)</th>
            <th class="text-center">(4)</th>
            <th class="text-center">(5)</th>
            <th class="text-center">(6)</th>
            <th class="text-center">(7)</th>
            <th class="text-center">(8)</th>
            <th class="text-center">(9)</th>
            <th class="text-center">(10)</th>
            <th class="text-center">(11)</th>
            <th class="text-center">(12)</th>
            <th class="text-center">(13)</th>
            <th class="text-center">(14)</th>
            <th class="text-center">(15)</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $array = [];
    $order = 0;
    $totalPrice = ZERO_PRICE;
    $totalTestPrice = ZERO_PRICE;
    $totalImageAnalysation = ZERO_PRICE;
    $totalMedicine = ZERO_PRICE;
    $totalSurgeryTips = ZERO_PRICE;
    $totalExaminationPrice = ZERO_PRICE;
    $totalPatientPay = ZERO_PRICE;
    $totalHealthInsuranceFund = ZERO_PRICE;
    ?>
    @foreach ($medicalSessions as $key => $medicalSession)
    <?php
    if (empty($array) || !in_array($medicalSession->hospital_line, $array)) {
        array_push($array, $medicalSession->hospital_line);
        $order = 0;
    ?>
        <tr>
            <th></th>
            @if($medicalSession->hospital_line == MedicalSessionConstants::ORIGINAL_PROVINCE_HOSPITAL_LINE)
                <th colspan="8">A. BỆNH NHÂN NỘI TỈNH  KHÁM, CHỮA BỆNH BAN ĐẦU</th>
            @elseif($medicalSession->hospital_line == MedicalSessionConstants::INNER_PROVINCE_TO_HOSPITAL_LINE)
                <th colspan="8">B. BỆNH NHÂN NỘI TỈNH ĐẾN</th>
            @elseif($medicalSession->hospital_line == MedicalSessionConstants::OUT_OF_PROVINCE_TO_HOSPITAL_LINE)
                <th colspan="8">C. BỆNH NHÂN NGOẠI TỈNH ĐẾN</th>
            @endif
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php
    }
    ?>
    <tr class="odd">
        <td></td>
        <?php 
            $totalPrice = $totalPrice + $medicalSession->payment_price;
            $totalTestPrice = $totalTestPrice + $medicalSession->xet_nghiem;
            $totalImageAnalysation = $totalImageAnalysation + $medicalSession->cdha + $medicalSession->tdcn;
            $totalMedicine = $totalMedicine + $medicalSession->medicine;
            $totalSurgeryTips = $totalSurgeryTips + $medicalSession->ttpt;
            $totalExaminationPrice = $totalExaminationPrice + $medicalSession->examination_insurance_price;
            $totalPatientPay = $totalPatientPay + $medicalSession->patient_pay;
            $totalHealthInsuranceFund = $totalHealthInsuranceFund + $medicalSession->health_insurance_fund;
        ?>
        <td class="text-center">{{ $medicalSession->number }}</td>
        <td class="text-center">{{ $medicalSession->cadres_name }}</td>
        <td class="text-center">{{ CommonHelper::formatDate($medicalSession->male_birthday, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}</td>
        <td class="text-center">{{ CommonHelper::formatDate($medicalSession->female_birthday, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}</td>
        <td class="text-center">{{ $medicalSession->medical_insurance_number }}</td>
        <td class="text-center">{{ $medicalSession->hospital_code }}</td>
        <td class="text-center">{{ $medicalSession->disease_code }}</td>
        <td class="text-center">{{ $medicalSession->medical_examination_day }}</td>
        <td class="text-center">{{NumberFormatHelper::priceFormat($medicalSession->payment_price)}}</td>
        <td class="text-center">{{NumberFormatHelper::priceFormat($medicalSession->xet_nghiem)}}</td>
        <td class="text-center">{{NumberFormatHelper::priceFormat($medicalSession->cdha + $medicalSession->tdcn)}}</td>
        <td class="text-center">{{NumberFormatHelper::priceFormat($medicalSession->medicine)}}</td>
        <td class="text-center"></td>
        <td class="text-center">{{NumberFormatHelper::priceFormat($medicalSession->ttpt)}}</td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center">{{NumberFormatHelper::priceFormat($medicalSession->examination_insurance_price)}}</td>
        <td class="text-center"></td>
        <td class="text-center">{{NumberFormatHelper::priceFormat($medicalSession->patient_pay)}}</td>
        <td class="text-center">{{NumberFormatHelper::priceFormat($medicalSession->health_insurance_fund)}}</td>
        <td class="text-center"></td>
    </tr>
    @endforeach

    <tr class="odd">
        <td></td>
        <td></td>
        <td colspan="5" class="text-center">
            Tổng cộng {{ $hospitalLine }}
        </td>
        <td>x</td>
        <td>x</td>
        <td>{{ NumberFormatHelper::priceFormat($totalPrice) }}</td>
        <td>{{ NumberFormatHelper::priceFormat($totalTestPrice) }}</td>
        <td>{{ NumberFormatHelper::priceFormat($totalImageAnalysation) }}</td>
        <td>{{ NumberFormatHelper::priceFormat($totalMedicine) }}</td>
        <td></td>
        <td>{{ NumberFormatHelper::priceFormat($totalSurgeryTips) }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{ NumberFormatHelper::priceFormat($totalExaminationPrice) }}</td>
        <td></td>
        <td>{{ NumberFormatHelper::priceFormat($totalPatientPay) }}</td>
        <td>{{ NumberFormatHelper::priceFormat($totalHealthInsuranceFund) }}</td>
        <td></td>
    </tr>
    <tr>
        <th colspan="1"></th>
        <th colspan="23">Số tiền đề nghị thanh toán (viết bằng chữ): {{ NumberFormatHelper::convertNumberToWords($totalHealthInsuranceFund) }} đồng</th>
    </tr>
    <tr>
        <th colspan="1"></th>
        <th colspan="2"></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" colspan="1">........, ngày ....... tháng ......... năm.....</th>
    </tr>
    <tr>
        <th colspan="1"></th>
        <th class="text-center" colspan="2">Người lập biểu</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" colspan="2">Trưởng phòng KHTH</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" colspan="2">Kế toán trưởng</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" colspan="1">Thủ trưởng đơn vị</th>
    </tr>
    <tr>
        <th colspan="1"></th>
        <th class="text-center" colspan="2">(Ký, họ tên)</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" colspan="2">(Ký, họ tên)</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" colspan="2">(Ký, họ tên)</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-center" colspan="1">(Ký, họ tên, đóng dấu)</th>
    </tr>
    </tbody>
</table>

