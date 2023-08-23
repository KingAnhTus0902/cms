@extends('layouts.admin')
@section('title', __('title.medical_test_view_page'))
@php
    use App\Models\DesignatedServiceOfMedicalSession;
    use App\Constants\DesignatedServiceConstants;
    use App\Constants\MedicalSessionConstants;
@endphp
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="add-medical_test-form" type="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="row form-group">
                                    <div class="col-md-1">
                                        <label for="executor_id" class="col-form-label col-form-label-sm">
                                            {{ __('label.medical_test.doctor') }}
                                        </label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text"
                                               class="form-control form-control-sm input-form"
                                               id="executor_id"
                                               disabled="disabled"
                                               value="{{ auth()->user()->name }}"
                                        >
                                        <input type="hidden" name="executor_id" value="{{ auth()->user()->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row form-group">
                                    <div class="col-md-1">
                                        <label for="executor_id" class="col-form-label col-form-label-sm">
                                            {{ __('label.medical_test.cadre') }}
                                        </label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text"
                                               class="form-control form-control-sm input-form"
                                               id="cadre"
                                               disabled="disabled"
                                               value="{{ $designatedServiceMedicalSession->medicalSession?->cadre_name }}"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row form-group">
                                    <div class="col-md-1">
                                        <label for="diagnose" class="col-form-label col-form-label-sm">
                                            {{ __('label.medical_session.field.diagnose') }}
                                        </label>
                                    </div>
                                    <div class="col-md-11">
                                        <textarea
                                            type="text"
                                            class="form-control form-control-sm input-form"
                                            id="diagnose"
                                            disabled="disabled"
                                        >{{ $designatedServiceMedicalSession->medicalSession?->diagnose }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row form-group">
                                    <div class="col-md-1">
                                        <label for="name" class="col-form-label col-form-label-sm">
                                            {{ __('label.medical_test.requirement') }}
                                        </label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text"
                                               class="form-control form-control-sm input-form"
                                               value="{{
                                                $designatedServiceMedicalSession->designated_service_name .
                                                ' (' . DesignatedServiceConstants::SPECIALIST[
                                                    $designatedServiceMedicalSession->designatedService?->specialist
                                                ] . ')'
                                            }}"
                                               disabled="disabled"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row form-group">
                                    <div class="col-md-1">
                                        <label for="name" class="col-form-label col-form-label-sm">
                                            {{
                                                __('label.designated_service_medical_session.designated_service_amount')
                                            }}
                                        </label>
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text"
                                               class="form-control form-control-sm input-form"
                                               value="{{ $designatedServiceMedicalSession->designated_service_amount }}"
                                               disabled="disabled"
                                        >
                                    </div>
                                </div>
                            </div>
                            @php
                                $paidStatus = (
                                    $designatedServiceMedicalSession->medicalSession?->getRawOriginal('payment_status')
                                        == MedicalSessionConstants::PAID_STATUS
                                );
                                $waitting = (
                                    $designatedServiceMedicalSession->status == DesignatedServiceOfMedicalSession::WAITING
                                );
                                $finish = (
                                    $designatedServiceMedicalSession->status == DesignatedServiceOfMedicalSession::FINISH
                                );
                                $cancel = (
                                    $designatedServiceMedicalSession->status == DesignatedServiceOfMedicalSession::CANCEL
                                );
                                $display = $waitting ? 'd-none' : 'd-block';
                                $disabled = ($cancel || ($finish && $paidStatus))  ? 'disabled="disabled"' : '';
                                $print = $finish ? '' : 'd-none';
                            @endphp
                            @if ($waitting)
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="row form-group">
                                        <a class="btn btn-primary processing change-status"
                                           data-url="{{ route(
                                                        'admin.medical_tests.status',
                                                        $designatedServiceMedicalSession->id
                                                    ) }}"
                                           data-value="{{ DesignatedServiceOfMedicalSession::PROCESSING }}"
                                        >
                                            <i class="fa fa-save"></i> {{ __('label.medical_test.button.processing') }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 {{ $display }}">
                                <div class="row form-group">
                                    <div class="col-md-1">
                                        <label for="name" class="col-form-label col-form-label-sm">
                                            {{ __('label.designated_service_medical_session.medical_test_result') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                    </div>
                                    <div class="col-md-11">
                                        <textarea
                                            class="form-control form-control-sm input-form"
                                            id="medical_test_result"
                                            name="medical_test_result"
                                            rows="2"
                                        >
                                        {{
                                            isset($designatedServiceMedicalSession->medical_test_result)
                                                ? html_entity_decode(
                                                    $designatedServiceMedicalSession->medical_test_result
                                                )
                                                : html_entity_decode(
                                                    $designatedServiceMedicalSession->designatedService?->description
                                                )
                                        }}
                                        </textarea>
                                        <span id="medical_test_result-edit-error" class="error validate-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 {{ $display }}">
                                <div class="row form-group">
                                    <div class="col-md-1">
                                        <label for="medical_test_conclude" class="col-form-label col-form-label-sm">
                                            {{ __('label.designated_service_medical_session.medical_test_conclude') }}
                                            <span class="text-red">(*)</span>
                                        </label>
                                    </div>
                                    <div class="col-md-11">
                                        <textarea name="medical_test_conclude" id="medical_test_conclude-add" rows="3"
                                            class="form-control form-control-sm input-form" {{ $disabled }}
                                            >{{ $designatedServiceMedicalSession->medical_test_conclude }}</textarea>
                                        <span id="medical_test_conclude-edit-error" class="error validate-error"></span>
                                    </div>
                                </div>
                                <input type="hidden" id="id-edit" value="{{ $designatedServiceMedicalSession->id }}">
                                <input type="hidden" name="executor_id" value="{{ auth()->user()->id }}">
                                <input type="hidden"
                                       name="designated_service_id"
                                       value="{{ $designatedServiceMedicalSession->designatedService?->id }}"
                                >
                                <input type="hidden"
                                       name="status"
                                       id="status"
                                       value="{{ DesignatedServiceOfMedicalSession::FINISH }}"
                                >
                                <input type="hidden"
                                       name="status"
                                       id="status_draft"
                                       value="{{ DesignatedServiceOfMedicalSession::PROCESSING }}"
                                >
                                <input type="hidden"
                                       id="current_status"
                                       value="{{ $designatedServiceMedicalSession->status }}"
                                >
                                <input type="hidden"
                                       id="payment_status"
                                       value="{{
                                            $designatedServiceMedicalSession->medicalSession?->getRawOriginal(
                                                'payment_status'
                                       ) }}"
                                >
                            </div>
                        </div>
                    </form>
                    <div class="row action">
                        <div class="col-12 {{ $display }}">
                            <div class="form-group">
                                <div class="text-right">
                                    @if (!$cancel && (!$finish || !$paidStatus))
                                        <button class="btn btn-success edit-btn w-auto mr-1">
                                            <i class="fa fa-save"></i> {{ __('label.medical_test.button.create') }}
                                        </button>
                                    @endif
                                    @if (!$cancel && !$finish)
                                            <button class="btn btn-primary draft w-auto mr-1">
                                                <i class="fa fa-save"></i> {{ __('label.medical_test.button.draft') }}
                                            </button>
                                    @endif
                                    @if (!$cancel)
                                        <button class="btn btn-default print-btn mr-1 {{ $print }}"
                                                data-url="{{
                                                        route(
                                                            'admin.medical_tests.print_medical_test',
                                                            $designatedServiceMedicalSession->id
                                                        )
                                                    }}"
                                        >
                                            <i class="fa fa-print"></i> {{ __('label.medical_test.button.print') }}
                                        </button>
                                    @endif
                                    @if (!$cancel && (!$finish || !$paidStatus))
                                        <button class="btn btn-danger change-status"
                                                data-url="{{
                                                        route(
                                                            'admin.medical_tests.status',
                                                            $designatedServiceMedicalSession->id
                                                        )
                                                    }}"
                                                data-value="{{ DesignatedServiceOfMedicalSession::CANCEL }}"
                                        >
                                            <i class="fa fa-trash"></i> {{ __('label.medical_test.button.cancel') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('summernote/summernote.min.css') }}">
@endpush
@push('scripts')
    <script>
        const API_UPDATE = '{{ route('admin.designated_service_of_medical_session.update',
            $designatedServiceMedicalSession->id
        ) }}';
        const API_RETURN = '{{ route('admin.medical_tests.index') }}';
        const API_UPLOAD = '{{ route('admin.medical_tests.upload', $designatedServiceMedicalSession->id) }}';
    </script>
    <script src="{{ asset('js/pages/medical_test/view.js') }}"></script>
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
@endpush
