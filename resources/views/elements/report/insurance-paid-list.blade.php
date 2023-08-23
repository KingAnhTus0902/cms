@php
use App\Helpers\NumberFormatHelper;
use App\Constants\MedicalSessionConstants;
use App\Helpers\CommonHelper;
@endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    @if ($total > 0)
                        <div class="row">
                            <div class="col-sm-12">
                                <div style="width: 100% !important; overflow-x:scroll">
                                    <table id="disease-table" class="table table-bordered dtr-inline table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="3">
                                                    {{ __('label.common.field.order') }}
                                                </th>
                                                <th class="text-center" rowspan="3">
                                                    {{ __('label.medical_session.field.cadres_name') }}
                                                </th>
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
                                                <th class="text-center" rowspan="2">{{ __('label.medical_session.field.male') }}</th>
                                                <th class="text-center" rowspan="2">{{ __('label.medical_session.field.female') }}</th>
                                                <th class="text-center" rowspan="2">{{ __('label.medical_session.field.total') }}</th>
                                                <th class="text-center" colspan="6">{{ __('label.medical_session.field.payout_rates_not_apply') }}</th>
                                                <th class="text-center" colspan="3">{{ __('label.medical_session.field.prorated_payment') }}</th>
                                                <th class="text-center" rowspan="2">{{ __('label.medical_session.field.examination_price') }}</th>
                                                <th class="text-center" rowspan="2">{{ __('label.medical_session.field.transport') }}</th>
                                                <th class="text-center" rowspan="2">{{ __('label.medical_session.field.total') }}</th>
                                                <th class="text-center" rowspan="2" title="{{ __('label.medical_session.field.outside_price') }}">
                                                    {{ __('label.medical_session.field.outside_price') }}
                                                </th>
                                            </tr>
                                            <tr>
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
                                        ?>
                                        @foreach ($medicalSessions as $key => $medicalSession)
                                        <?php
                                            if (empty($array) || !in_array($medicalSession->hospital_line, $array)) {
                                            array_push($array, $medicalSession->hospital_line);
                                        ?>
                                            <tr>
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
                                                    <td class="text-right">{{ $medicalSession->number }}</td>
                                                    <td class="text-left">{{ $medicalSession->cadres_name }}</td>
                                                    <td class="text-right">{{ CommonHelper::formatDate($medicalSession->male_birthday, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}</td>
                                                    <td class="text-right">{{ CommonHelper::formatDate($medicalSession->female_birthday, YEAR_MONTH_DAY, DAY_MONTH_YEAR) }}</td>
                                                    <td class="text-right">{{ $medicalSession->medical_insurance_number }}</td>
                                                    <td class="text-right">{{ $medicalSession->hospital_code }}</td>
                                                    <td class="text-left">{{ $medicalSession->disease_code }}</td>
                                                    <td class="text-right">{{ $medicalSession->medical_examination_day }}</td>
                                                    <td class="text-right">{{NumberFormatHelper::priceFormat($medicalSession->payment_price)}}</td>
                                                    <td class="text-right">{{NumberFormatHelper::priceFormat($medicalSession->xet_nghiem)}}</td>
                                                    <td class="text-right">{{NumberFormatHelper::priceFormat($medicalSession->cdha + $medicalSession->tdcn)}}</td>
                                                    <td class="text-right">{{NumberFormatHelper::priceFormat($medicalSession->medicine)}}</td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right">{{NumberFormatHelper::priceFormat($medicalSession->ttpt)}}</td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right">{{NumberFormatHelper::priceFormat($medicalSession->examination_insurance_price)}}</td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right">{{NumberFormatHelper::priceFormat($medicalSession->patient_pay)}}</td>
                                                    <td class="text-right">{{NumberFormatHelper::priceFormat($medicalSession->health_insurance_fund)}}</td>
                                                    <td class="text-right"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    @include('elements.paginate')
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <p>{{ __('messages.EM-001') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<input hidden id="startDateSearch" value="{{$start}}">
<input hidden id="endDateSearch" value="{{$end}}">
