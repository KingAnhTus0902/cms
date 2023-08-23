@php
    use App\Constants\MedicalSessionConstants;
    use App\Helpers\NumberFormatHelper;
    use App\Constants\PrescriptionConstants;
    use App\Helpers\CommonHelper;
    use App\Constants\CadresConstants;
    $condition = $is_payment == MedicalSessionConstants::PAID_STATUS;
    $change = $condition ? 'cancel' : 'confirm';
    $current = $condition ? 'confirm' : 'cancel';
    $text = $condition ? __('label.common.button.cancel') : __('label.common.button.confirm');
    $classButton = $condition ? 'btn-danger' : 'btn-success';
@endphp
<form id="save-payment-status" onsubmit="return false">
    <div class="row">
        <div class="col-12">
            <div class="card examination">
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="col-form-label col-form-label-sm">
                                    Mã phiên khám:
                                </label>
                                <span class="text-sm">{!! $code !!}</span>
                            </div>
                            <div class="col-sm-6 text-right">
                                @if ($examination_status == MedicalSessionConstants::STATUS_DONE)
                                    <label class="col-form-label col-form-label-sm">
                                        Trạng thái thanh toán:
                                    </label>
                                    <span class="text-sm">{!! $payment_status !!}</span>
                                @else
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.medical_session.field.examination_status') }}:
                                    </label>
                                    <span class="text-sm">{!! $status !!}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.payment.cadre.information') }}
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.cadres.field.code') }}:
                                </label>
                                <span class="text-sm">{{ $cadre_code }}</span>
                                <input type="hidden" name="cadre_id" value="{{ $cadre_id }}">
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.payment.cadre.name') }}:
                                </label>
                                <span class="text-sm">{{ $cadre_name }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.payment.cadre.phone') }}:
                                </label>
                                <span class="text-sm">{{ $cadre_phone }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.cadres.field.gender') }}:
                                </label>
                                <span class="text-sm">
                                    {{ $cadre_gender }}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.cadres.field.identity_card_number') }}:
                                </label>
                                <span class="text-sm">{{ $cadre_identity_card_number }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.cadres.field.city_id') }}:
                                </label>
                                <span class="text-sm">{{ $city_name }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.cadres.field.examination_day') }}:
                                </label>
                                <span class="text-sm">
                                    {{ CommonHelper::formatDate($medical_examination_day, YEAR_MONTH_DAY_HIS, DAY_MONTH_YEAR) }}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.cadres.field.examination_day_end') }}:
                                </label>
                                <span class="text-sm">
                                    {{ CommonHelper::formatDate($medical_examination_day_end, YEAR_MONTH_DAY_HIS, DAY_MONTH_YEAR) }}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label col-form-label-sm">
                                    {{ __('label.cadres.field.emergency') }}
                                </label>
                                <input type="checkbox" class="custom-checkbox-input" name="is_emergency" value="1"
                                    @if ($is_emergency == MedicalSessionConstants::EMERGENCY) checked @endif>
                            </div>
                            @foreach (MedicalSessionConstants::TREATMENT_LINE as $key => $value)
                                @if ($key <= FIRST_TWO_RECORDS)
                                    <div class="col-md-4">
                                        <label class="col-form-label col-form-label-sm">
                                            {{ $value }}
                                        </label>
                                        <input type="radio" class="custom-radio-input-primary" name="treatment_line"
                                            value="{{ $key }}"
                                            @if ($key == $treatment_line)
                                                checked
                                            @else
                                                disabled
                                            @endif>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @if (!empty($cadre_medical_insurance_number))
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.payment.medical_insurance.medical_insurance_info') }}
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.medical_insurance_number') }}:
                                    </label>
                                    <span class="text-sm">{{ $cadre_medical_insurance_number }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.medical_insurance_symbol_code') }}:
                                    </label>
                                    <span class="text-sm">{{ $cadre_medical_insurance_symbol_code }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.medical_insurance_live_code') }}:
                                    </label>
                                    <span class="text-sm">{{ $cadre_medical_insurance_live_code }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.hospital_code') }}:
                                    </label>
                                    <span class="text-sm">{{ $cadre_hospital_code }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.medical_insurance_start_date') }}:
                                    </label>
                                    <span class="text-sm">
                                        {{ CommonHelper::formatDate($cadre_medical_insurance_start_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.medical_insurance_end_date') }}:
                                    </label>
                                    <span class="text-sm">
                                        {{ CommonHelper::formatDate($cadre_medical_insurance_end_date, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}
                                    </span>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.medical_insurance_address') }}:
                                    </label>
                                    <span class="text-sm">{{ $cadre_medical_insurance_address }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label col-form-label-sm">
                                        {{ __('label.cadres.field.is_long_date') }}:
                                    </label>
                                    <input type="checkbox" class="custom-checkbox-input" name="cadre_is_long_date" value="1"
                                    id="cadre_is_long_date"
                                    @if ($cadre_is_long_date == CadresConstants::IS_LONG_DATE_ONE) checked @endif
                                    routes="{{ route('admin.payment.' . $current, $id) }}"
                                    >
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="float-right mb-3">
                        <button class="btn btn-info" style="font-size: 14px" id="open-edit-modal-cadre" data-url="{{ route('admin.medical_session.detail', $id) }}">
                            <i class="fa fa-edit"></i>
                            Chỉnh sửa
                        </button>
                    </div>
                    <table id="disease-table" class="table table-striped table-hover dtr-inline">
                        <tr>
                            <th class="text-center">
                                {{ __('label.payment.service_name') }}
                            </th>
                            <th class="text-center">
                                {{ __('label.invoice.invoice.amount') }}
                            </th>
                            <th class="text-center">
                                {{ __('label.invoice.invoice.service_unit_price') }}
                            </th>
                            <th class="text-center">
                                {{ __('label.invoice.invoice.insurance_unit_price') }}
                            </th>
                            <th class="text-center">
                                {{ __('label.invoice.invoice.health_insurance_fund') }}
                            </th>
                            <th class="text-center">
                                {{ __('label.invoice.invoice.patient_pay') }}
                            </th>
                        </tr>
                        @if (!empty($examination_types))
                            <tr>
                                <th colspan="6">{{ __('label.invoice.examination') }}</th>
                            </tr>
                            @foreach ($examination_types as $value)
                                <tr>
                                    <td class="text-left">
                                        {{ $value['name'] }}
                                    </td>
                                    <td class="text-center">
                                        1 ({{ __('label.invoice.invoice.time') }})
                                    </td>
                                    <td class="text-center">
                                        @if ($use_medical_insurance == MedicalSessionConstants::NOT_INSURANCE)
                                            {{ NumberFormatHelper::priceFormat($value['service_unit_price'], '', 2, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($use_medical_insurance == MedicalSessionConstants::USE_INSURANCE)
                                            {{ NumberFormatHelper::priceFormat($value['insurance_unit_price'], '', 2, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($use_medical_insurance == MedicalSessionConstants::USE_INSURANCE)
                                            {{ NumberFormatHelper::priceFormat((($value['insurance_unit_price'] * $benefit_rate) / FULL_PERCENT), '', 2, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($use_medical_insurance == MedicalSessionConstants::USE_INSURANCE)
                                            {{ NumberFormatHelper::priceFormat(
                                                ($value['insurance_unit_price'] - (($value['insurance_unit_price'] * $benefit_rate) / FULL_PERCENT)), '', 2, ',', '.'
                                            ) }}
                                        @else
                                            {{ NumberFormatHelper::priceFormat($value['service_unit_price'], '', 2, ',', '.') }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        @if (!empty($services))
                            <tr>
                                <th colspan="6">Dịch Vụ</th>
                            </tr>
                            @foreach ($services as $value)
                                @if (!empty($value))
                                    @foreach ($value as $data)
                                        <tr>
                                            <td class="text-left">{{ $data['designated_service_name'] }}</td>
                                            <td class="text-center">{{ $data['designated_service_amount'] }}
                                                ({{ __('label.invoice.invoice.time') }})
                                            </td>
                                            <td class="text-center">
                                                @if (
                                                    $use_medical_insurance == MedicalSessionConstants::NOT_INSURANCE ||
                                                        $data['use_insurance'] == MedicalSessionConstants::NOT_INSURANCE)
                                                    {{ NumberFormatHelper::priceFormat($data['designated_service_unit_price'], '', 2, ',', '.') }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (
                                                    $use_medical_insurance == MedicalSessionConstants::USE_INSURANCE &&
                                                        $data['use_insurance'] == MedicalSessionConstants::USE_INSURANCE)
                                                    {{ NumberFormatHelper::priceFormat($data['designated_insurance_unit_price'], '', 2, ',', '.') }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (
                                                    $use_medical_insurance == MedicalSessionConstants::USE_INSURANCE &&
                                                        $data['use_insurance'] == MedicalSessionConstants::USE_INSURANCE)
                                                    {{ NumberFormatHelper::priceFormat((($data['total_insurance'] * $benefit_rate) / FULL_PERCENT), '', 2, ',', '.') }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (
                                                    $use_medical_insurance == MedicalSessionConstants::USE_INSURANCE &&
                                                        $data['use_insurance'] == MedicalSessionConstants::USE_INSURANCE)
                                                    {{ NumberFormatHelper::priceFormat(
                                                        ($data['total_insurance'] - (($data['total_insurance'] * $benefit_rate) / FULL_PERCENT)), '', 2, ',', '.'
                                                    ) }}
                                                @else
                                                    {{ NumberFormatHelper::priceFormat($data['total_service'], '', 2, ',', '.') }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                        @if (!empty($medicines))
                            <tr>
                                <th colspan="6">{{ __('label.material_type.type.medicine') }}
                                    @if ($medicines_status != PrescriptionConstants::STATUS_DISPENSED)
                                        ({{ PrescriptionConstants::DISPENSE_MEDICINE_STATUS[$medicines_status] }})
                                    @endif
                                    </td>
                            </tr>
                            @foreach ($medicines as $value)
                                <tr>
                                    <td class="text-left">{{ $value['materials_name'] }}</td>
                                    <td class="text-center">{{ $value['materials_amount'] }}
                                        ({{ $value['materials_unit'] }})
                                    </td>
                                    <td class="text-center">
                                        @if ($use_medical_insurance == MedicalSessionConstants::NOT_INSURANCE || $value['use_insurance'] == 0)
                                            {{ NumberFormatHelper::priceFormat($value['materials_unit_price'], '', 2, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($use_medical_insurance == MedicalSessionConstants::USE_INSURANCE && $value['use_insurance'] == 1)
                                            {{ NumberFormatHelper::priceFormat($value['materials_insurance_unit_price'], '', 2, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($use_medical_insurance == MedicalSessionConstants::USE_INSURANCE && $value['use_insurance'] == 1)
                                            {{ NumberFormatHelper::priceFormat((($value['total_insurance'] * $benefit_rate) / FULL_PERCENT), '', 2, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($use_medical_insurance == MedicalSessionConstants::USE_INSURANCE && $value['use_insurance'] == 1)
                                            {{ NumberFormatHelper::priceFormat(
                                                ($value['total_insurance'] - (($value['total_insurance'] * $benefit_rate) / FULL_PERCENT)),
                                                '', 2, ',', '.'
                                            ) }}
                                        @else
                                            {{ NumberFormatHelper::priceFormat($value['total_service'], '', 2, ',', '.') }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <th class="text-right" colspan="5">
                                {{ __('label.invoice.sum') }}:
                            </th>
                            <th class="text-center">
                                {{ NumberFormatHelper::priceFormat((($sum_insurance * (FULL_PERCENT - $benefit_rate)) / FULL_PERCENT + $other_medicines + $other_services), '', 2, ',', '.') }}
                                <input type="hidden" name="medical_price"
                                    value="{{$sum_insurance}}">
                                <input type="hidden" name="health_insurance_fund"
                                    value="{{
                                        ($sum_insurance * $benefit_rate) / FULL_PERCENT
                                    }}">
                                <input type="hidden" name="patient_pay"
                                    value="{{
                                        $sum_insurance - (($sum_insurance * $benefit_rate) / FULL_PERCENT)
                                    }}">
                                <input type="hidden" name="medicines_price"
                                    value="{{
                                        $medicines_insurance_cost - (($medicines_insurance_cost * $benefit_rate) / FULL_PERCENT) + $other_medicines
                                    }}">
                                <input type="hidden" name="benefit_rate"
                                    value="{{$benefit_rate}}">
                            </th>
                        </tr>
                    </table>
                </div>
                <div class="justify-content-between">
                    <div class="col d-flex justify-content-center">
                        <div class="row mb-3">
                            @if ($examination_status == MedicalSessionConstants::STATUS_DONE)
                                <div class="col-auto d-flex align-items-center">
                                    <button class="btn {{ $classButton }} open-add-modal {{ $change }}"
                                        data-toggle="modal" routes="{{ route('admin.payment.' . $change, $id) }}"
                                        data-target="#add-designated-service-medical-session"
                                        onclick="save('.{{ $change }}',
                                            {{ $medicines_status }},
                                            false)">
                                        {{ $text }}
                                    </button>
                                </div>
                            @endif
                            <div class="col-auto d-flex align-items-center">
                                <button style="border: 2px solid #FF6600;"
                                        class="btn btn-default open-print-modal confirm"
                                    routes="{{ route('admin.payment.confirm', $id) }}"
                                    data-url="{{ route('admin.payment.print', $id) }}"
                                    onclick="saveAndPrint()">
                                    <i style="color: #FF6600" class="fa fa-fw fa-print large"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
