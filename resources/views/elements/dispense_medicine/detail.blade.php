@php
    use App\Helpers\CommonHelper;
    use App\Constants\PrescriptionConstants;
    use App\Constants\MedicalSessionConstants;
@endphp
<div class="row">
    <div class="col-12">
        <div>
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <label class="col-form-label col-form-label-fz">
                                {{ __('label.payment.cadre.information') }}
                            </label>
                        </div>
                    </div>
                    <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                    {{ __('label.examination.field.cadres_name') }}:
                                </label>
                                <span class="col-form-label-fz">{{ $medical_session->cadre_name ?? '' }}</span>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                    {{ __('label.cadres.field.gender') }}:
                                </label>
                                <span class="col-form-label-fz">{{ $medical_session->cadre_gender }}</span>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                    {{ __('label.cadres.field.birthday') }}:
                                </label>
                                <span class="col-form-label-fz">
                                    {{ $medical_session->cadre_birthday ?
                                    CommonHelper::formatDate($medical_session->cadre_birthday,
                                    YEAR_MONTH_DAY,
                                    DAY_MONTH_YEAR)
                                    : '' }}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                    {{ __('label.examination.current_room') }}:
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" id="medical_session_status"
                                    value="{{ $medical_session->getRawOriginal('status') }}">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                    {{ __('label.dispense_medicine.field.medical_session_status') }}:
                                </label>
                                <span class="col-form-label-fz">{!! $medical_session->status ?? '' !!}</span>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                    {{ __('label.examination.field.date') }}:
                                </label>
                                <span class="col-form-label-fz">{{$medical_session->medical_examination_day}}</span>
                            </div>
                            <div class="col-md">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.job') }}:
                                </label>
                                <span class="col-form-label-fz">{{ $medical_session->cadre_job}}</span>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <!-- BHYT -->
                            <!-- <ADDRESS> -->
                            <div class="col-12">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                    {{ __('label.cadres.field.address') }}:
                                </label>
                                <span class="col-form-label-fz">{{ $medical_session->cadre_address}}</span>
                            </div>

                        @if ($medical_session->cadre_medical_insurance_number)

                            <div class="col-md-4">
                                <input type="hidden" id="medical_session_status"
                                    value="{{ $medical_session->getRawOriginal('status') }}">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.medical_insurance_number') }}:
                                </label>
                                <span class="col-form-label-fz">{{$medical_session->cadre_medical_insurance_number}}</span>
                            </div>

                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.medical_insurance_start_date') }}:
                                </label>
                                <span class="col-form-label-fz">
                                    {{ $medical_session->cadre_medical_insurance_start_date ?
                                    CommonHelper::formatDate($medical_session->cadre_medical_insurance_start_date,
                                    YEAR_MONTH_DAY,
                                    DAY_MONTH_YEAR)
                                    : '' }}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.medical_insurance_end_date') }}:
                                </label>
                                <span class="col-form-label-fz">
                                    {{ $medical_session->cadre_medical_insurance_end_date ?
                                        CommonHelper::formatDate($medical_session->cadre_medical_insurance_end_date,
                                        YEAR_MONTH_DAY,
                                        DAY_MONTH_YEAR)
                                        : '' }}
                            </span>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.hospital_code') }}:
                                </label>
                                <span class="col-form-label-fz">{{$medical_session->cadre_hospital_code}}</span>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.medical_insurance_symbol_code') }}:
                                </label>
                                <span class="col-form-label-fz">{{$medical_session->cadre_medical_insurance_symbol_code}}</span>
                            </div>
                            <div class="col-md-4">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.medical_insurance_live_code') }}:
                                </label>
                                <span class="col-form-label-fz">{{$medical_session->cadre_medical_insurance_live_code}}</span>
                            </div>
                            <div class="col-md">
                                <label for="reason_for_examination-edit" class="col-form-label col-form-label-fz">
                                {{ __('label.cadres.field.medical_insurance_address') }}:
                                </label>
                                <span class="col-form-label-fz">{{$medical_session->cadre_medical_insurance_address}}</span>
                            </div>
                         @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" id="prescription_id" value="{{ count($medicines) > 0 ? $medicines[0]->prescription_id : '' }}">
                            <table id="example2" class="th-center table table-striped table-hover dtr-inline dataTable"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr>
                                    <th class="dt-center u-width10 ordinal-number"
                                        data-column-name="id" id="ordinal-number-news">
                                        #
                                    </th>
                                    <th class="dt-center w-15" tabindex="0" aria-controls="example2">
                                        {{__("label.medicine_of_medical_session.field.medicine_of_medical_session")}}
                                    </th>
                                    <th class="dt-center" tabindex="0">
                                        {{__("label.medicine_of_medical_session.field.materials_name")}}
                                    </th>
                                    <th class="dt-center" tabindex="0">
                                        {{__("label.medicine_of_medical_session.field.materials_status")}}
                                    </th>
                                    <th class="dt-center w-10">
                                        {{__("label.medicine_of_medical_session.field.materials_amount")}}
                                    </th>
                                    <th class="dt-center w-10">
                                        {{__("label.medicine_of_medical_session.field.materials_unit")}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($medicines as $key => $medicine)
                                    <tr class="odd">
                                        <td class="dt-center">{{ ++$key }}</td>
                                        <td class="dt-center">
                                            {{ $medicine->materials_code }}
                                        </td>
                                        <td class="word-break">
                                            <strong class="btn-medicine-of-medical-session-title">
                                                {{ $medicine->materials_name }}
                                            </strong>
                                            <p class="mb-0 pb-0 mt-1">
                                                {{ $medicine->materials_usage }}</p>
                                            <p class="mb-0 pb-0">{{ $medicine->advice }}
                                            </p>
                                        </td>
                                        <td class="dt-center">
                                            {!!  $medicine->status_label ?? '' !!}
                                        </td>
                                        <td class="dt-center">
                                            {{ $medicine->materials_amount }}
                                        </td>
                                        <td class="dt-center">
                                            {{ $medicine->materials_unit }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <div class="col-md-12 no-padding text-right">
        @if(count($medicines) > 0 && $prescription->status == PrescriptionConstants::STATUS_WAITING_DISPENSED)
            <button class="btn btn-primary btn-sm auto-width update"
                    data-action="{{ PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_DISPENSED] }}"
            >
                <i class="fa fa-save"></i> {{ __('label.dispense_medicine.button.dispense') }}
            </button>
            <button class="btn btn-default btn-sm update"
                    data-action="{{ PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_CANCEL] }}"
            >
                <i class="fas fa-undo"></i> {{ __('label.dispense_medicine.button.cancel') }}
            </button>
        @endif
        @if(count($medicines) > 0 && $prescription->status == PrescriptionConstants::STATUS_DISPENSED && $paymentStatus == MedicalSessionConstants::UNPAID_STATUS)

            <button class="btn btn-default btn-sm update" id="cancel-dispensing"
                    data-action="{{ PrescriptionConstants::DISPENSE_MEDICINE_STATUS[PrescriptionConstants::STATUS_WAITING_DISPENSED] }}"
            >
                <i class="fas fa-undo"></i> {{ __('label.dispense_medicine.button.undo_dispense') }}
            </button>
        @endif
        <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
            <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
        </button>
    </div>
</div>
