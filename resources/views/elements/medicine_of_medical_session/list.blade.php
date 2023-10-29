@php
    use App\Helpers\TextFormatHelper;
    use App\Constants\MedicalSessionConstants;
    use App\Constants\PrescriptionConstants;
    use App\Helpers\RoleHelper;
    use App\Constants\MedicineConstants;
    $arStatusNotEdit = [MedicineConstants::STATUS_CANCEL, MedicineConstants::STATUS_DISPENSED];
    $isDisable = ($medicalSessionStatusPayment == MedicalSessionConstants::PAID_STATUS) ? 'disabled' : "";
@endphp
<div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
    <div class="card m-2">
        <div class="row mt-2 mb-10">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h6 class="card-title btn-medicine-of-medical-session-heading h4-fw">
                    {{ __('label.prescription_of_medical_session.title') }}</h6>
                <div class="button-group">
                    <button type="button" class="btn btn-tool open-add-modal" data-toggle="modal" {{$isDisable ?? ""}}
                        title="{{ __('label.medicine_of_medical_session.modal_title_add') }}"
                        style="margin-right: -10px !important;"
                        data-target="#add-medicine-of-medical-session">
                        <i class="fas fa-plus-square" style="color: #077664;font-size: 20px;"></i>
                    </button>
                    <button type="button" class="btn btn-tool open-print-modal"
                        title="{{ __('label.common.button.print_title') }}"
                        data-url="{{ route('admin.print.prescription', ['medical_session_id' => $medicalSessionId]) }}">
                        <i class="fa fa-fw fa-print large" style="color: #FF6600"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <table id="example2" class="table table-borderless dtr-inline" style="margin-left: 20px;"
                    aria-describedby="example2_info">
                    <tbody>
                        @foreach ($medicineOfMedicalSessions as $key => $medicineOfMedicalSession)
                            <tr class="odd">
                                <td class="dt-center pt-0 pb-0 u-width45">
                                    <strong class="btn-medicine-of-medical-session-title col-form-label-fz">{{ ++$key }}.</strong>
                                </td>
                                <td class="word-break pt-0 pb-0 pl-2 pr-1" tabindex="0">
                                    <strong class="btn-medicine-of-medical-session-title col-form-label-fz">
                                        {{ $medicineOfMedicalSession->materials_name }}
                                    </strong>
                                    <p class="mb-0 pb-0 mt-1">
                                        {{ $medicineOfMedicalSession->materials_usage }}</p>
                                    <p class="mb-0 pb-0">
                                        {!! TextFormatHelper::textFormat($medicineOfMedicalSession->advice) !!}
                                    </p>
                                </td>
                                <td class="word-break pt-0 pb-0 pr-2 w-15">
                                    <strong class="btn-medicine-of-medical-session-title col-form-label-fz">
                                        {{ $medicineOfMedicalSession->materials_amount }}
                                        {{ $medicineOfMedicalSession->materials_unit }}
                                    </strong>
                                </td>

                                <td class="word-break pt-0 pb-0 pr-2 w-15">
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-info btn-sm mr-3 open-edit-modal btn-action-examination" {{$isDisable ?? ""}}
                                            title="{{ __('label.common.button.edit_title') }}"
                                            data-id="{{ $medicineOfMedicalSession->id }}" data-form-id="form"
                                            data-toggle="modal" data-target="#edit-medicine-of-medical-session"
                                            title="{{ __('label.common.button.edit_title') }}"
                                        @if(
                                            in_array($medicineOfMedicalSession->getRawOriginal('status'),
                                               $arStatusNotEdit)
                                       )    disabled
                                            @endif
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-danger btn-sm mr-3 delete-btn
                                            btn-action-examination" {{$isDisable ?? ""}}
                                            title="{{ __('label.common.button.delete_title') }}"
                                            data-id="{{ $medicineOfMedicalSession->id }}"
                                            @if(
                                                in_array($medicineOfMedicalSession->getRawOriginal('status'),
                                                $arStatusNotEdit)
                                       )    disabled
                                            @endif
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
