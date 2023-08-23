@extends('layouts.admin')
@section('title', __('label.examination.title'))
@section('content')
    <div id="content-list">
        @include('elements.examination.detail-form', [
            'medical_session'   => $medical_session,
            'vital_sign'        => $vital_sign,
            'designatedServiceMedicalSession' => $designatedServiceMedicalSession,
            'designatedService' => $designatedService,
        ])
    </div>
@endsection
@push('scripts')
    <script>
        const API_TOKEN = '{!! csrf_token() !!}';
        var url = "{{route('admin.medical_session.examination.create_or_update', ':id')}}";
        var urlStart = "{{route('admin.medical_session.examination.start_medical_session', ':id')}}";
        const API_CREATE_OR_UPDATE = url.replace(":id", {{ $medical_session->id }});
        const API_START_MEDICAL_SESSION = urlStart.replace(":id", {{ $medical_session->id }});
        const API_LIST_DSMS = '{{ route('admin.designated_service_of_medical_session.list', $medical_session->id)}}';
        const API_CREATE_DSMS = '{{ route('admin.designated_service_of_medical_session.store', $medical_session->id) }}';
        const API_UPDATE_DSMS = '{{ route('admin.designated_service_of_medical_session.update', ':id') }}';
        const API_LIST_MEDICINE_OF_MEDICAL_SESSION = "{{ route('admin.list.medicine_of_medical_session') }}";
        const API_DETAIL_MEDICINE_OF_MEDICAL_SESSION = "{{ route('admin.detail.medicine_of_medical_session', ':id') }}";
        const API_CREATE_MEDICINE_OF_MEDICAL_SESSION = "{{ route('admin.create.medicine_of_medical_session') }}";
        const API_UPDATE_MEDICINE_OF_MEDICAL_SESSION = "{{ route('admin.update.medicine_of_medical_session') }}";
        const API_DELETE_MEDICINE_OF_MEDICAL_SESSION = "{{ route('admin.delete.medicine_of_medical_session') }}";
        const API_SUGGEST_MATERIAL = "{{ route('admin.suggest.medicine_of_medical_session') }}";
        const API_DETAIL_MATERIAL = "{{ route('admin.suggest.material.detail', ':id') }}";
        const API_CHANGE_ROOM_OF_MEDICAL_SESSION = "{{ route('admin.medical_session.change_room') }}";
        const API_RE_EXAMINATION_OF_MEDICAL_SESSION = "{{ route('admin.medical_session.re_examination') }}";
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
        const API_LIST_MEDICAL_SESSION = '{{route('admin.medical_session.index')}}';
        const API_TRANSFER = '{{route('admin.medical_session.transfer', ':id')}}';
        const API_CREATE_TRANSFER = '{{route('admin.create.hospital_transfer', ':id')}}';
        const API_CANCEL = '{{route('admin.medical_session.cancel', ':id')}}';
        const API_COMPLETE = '{{route('admin.medical_session.complete', ':id')}}';
        const API_UPDATE_COMPLETE = '{{route('admin.medical_session.update_status_complete', ':id')}}';
        const API_UPDATE_CANCEL = '{{route('admin.medical_session.update_status_cancel', ':id')}}';
        const API_WAITING_RESULT = '{{route('admin.medical_session.waiting_result', ':id')}}';
    </script>
    <script src="{{ asset('js/pages/examination.js') }}"></script>
    <script src="{{ asset('js/pages/designated_service_medical_session.js') }}"></script>
    <script src="{{ asset('js/pages/medicine-of-medical-session.js') }}"></script>
@endpush
