
@php
    use App\Helpers\TextFormatHelper;
    use App\Models\DesignatedServiceOfMedicalSession;
@endphp
<div id="designed_service_medical_session-list">
    <div class="card m-2">
        <div class="row mt-2 mb-10">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h6 class="card-title btn-medicine-of-medical-session-heading h4-fw">
                    {{ __('label.designated_service_medical_session.title') }}
                </h6>
                <div class="button-group">
                    <button type="button" class="btn btn-tool open-add-modal" data-toggle="modal" {{$isDisable ?? ""}}
                        title="{{ __('label.designated_service_medical_session.modal_title_add') }}"
                        style="margin-right: -10px !important;" data-target="#add-designated-service-medical-session">
                        <i class="fas fa-plus-square" style="color: #077664;font-size: 20px;"></i>
                    </button>
                    <button type="button" class="btn btn-tool open-print-modal"
                        title="{{ __('label.common.button.print_title') }}"
                        data-url="{{ route('admin.designated_service_of_medical_session.print', [
                            'medical_session_id' => $medicalSession->id,
                        ]) }}">
                        <i class="fa fa-fw fa-print large" style="color: #FF6600"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                @if (!$designatedServiceMedicalSession->isEmpty())
                    <table id="example2" class="table table-borderless dtr-inline" style="margin-left: 20px;"
                        aria-describedby="example2_info">
                        <tbody>
                            @foreach ($designatedServiceMedicalSession as $key => $value)
                                <tr class="odd">
                                    <td class="dt-center pt-0 pb-0 u-width45">
                                        <strong
                                            class="btn-medicine-of-medical-session-title">{{ ++$key }}.
                                        </strong>
                                    </td>
                                    <td class="word-break pt-0 pb-0 pl-2 pr-1 w-50" tabindex="0">
                                        <strong class="btn-medicine-of-medical-session-title">
                                            {{ $value->designated_service_name }}
                                        </strong>
                                        <p class="mb-0 pb-0 mt-1">
                                            {!! TextFormatHelper::textFormat($value->description) !!}
                                        </p>
                                    </td>
                                    <td class="word-break pt-0 pb-0 pr-2 w-6">
                                        <strong class="btn-medicine-of-medical-session-title">
                                            {{ $value->designated_service_amount }}
                                        </strong>
                                    </td>
                                    <td class="word-break pt-0 pb-0 pr-2 w-10">
                                        <div class="btn-group" role="group">
                                            <button
                                                class="btn btn-info btn-sm mr-3 open-edit-modal-ds
                                                btn-action-examination" {{ !empty($isDisable) ? $isDisable :
                                                ($value->getRawOriginal('status') ==
                                                DesignatedServiceOfMedicalSession::FINISH ? 'disabled' :  "") }}
                                                title="{{ __('label.common.button.edit_title') }}"
                                                data-id="{{ $value->id }}" data-form-id="form" data-toggle="modal"
                                                data-url="{{
                                                route('admin.designated_service_of_medical_session.edit', $value->id)
                                                }}"
                                                data-target="#edit-designated-service-medical-session">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button
                                                class="btn btn-danger btn-sm mr-3 designated-service-delete
                                                btn-action-examination" {{ !empty($isDisable) ? $isDisable :
                                                ($value->getRawOriginal('status') ==
                                                DesignatedServiceOfMedicalSession::FINISH ? 'disabled' :  "") }}
                                                title="{{ __('label.common.button.delete_title') }}"
                                                data-id="{{ $value->id }}"
                                                data-url="{{
                                                route('admin.designated_service_of_medical_session.destroy', $value->id)
                                                }}"
                                                data-name="{{ $value->name }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button
                                                class="btn btn-success btn-sm open-print-modal btn-sm mr-3
                                                btn-action-examination"
                                                title="{{ __('label.common.button.print_title') }}"
                                                data-id="{{ $value->id }}"
                                                data-url="{{
                                                route('admin.designated_service_of_medical_session.print', [
                                                    'medical_session_id' => $medicalSession->id,
                                                    'id' => $value->id,
                                                ]) }}"
                                                data-name="{{ $value->name }}">
                                                <i class="fa fa-print"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="word-break pt-0 pb-0 pr-2">
                                        @if ($value->status == \App\Models\DesignatedServiceOfMedicalSession::FINISH)
                                            <a class="btn-medicine-of-medical-session-title print-btn" href="#"
                                            style="color: #007bff; "
                                            title="{{ __('label.designated_service.detail_title_button') }}"
                                            data-url="{{ route('admin.medical_tests.print_medical_test', $value->id) }}">
                                                {{ \App\Models\DesignatedServiceOfMedicalSession::$status[
                                                    (int)$value->status]
                                                }}
                                            </a>
                                        @else
                                            <strong class="btn-medicine-of-medical-session-title">
                                                {{ \App\Models\DesignatedServiceOfMedicalSession::$status[
                                                    (int)$value->status]
                                                }}
                                            </strong>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                @else
                    <div class="text-center">
                        <p></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
