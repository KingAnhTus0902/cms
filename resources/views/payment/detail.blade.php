@extends('layouts.admin')
@section('title', __('title.payment_detail'))
@section('content')
    @include('elements.payment.edit-cadre')
    <div class="row">
        <div class="col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                {{-- Table --}}
                <div id="content-list">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const API_LIST_CITY      = "{{ route('admin.list.city') }}";
        const API_LIST_DISTRICT  = "{{ route('admin.list.district') }}";
        const API_LIST_FOLK      = "{{ route('admin.list.folk') }}";
        const API_SUGGEST_HOSPITAL = "{{ route('admin.suggest.hospital.name') }}";
        const API_UPDATE_CADRES  = "{{ route('admin.medical_session.update.cadres') }}";
        const API_TOKEN = '{!! csrf_token() !!}';
        const API_LIST = "{{ route("admin.payment.paymentDetail", $id) }}";
        const API_PAYMENT_CONFIRM = "{{ route("admin.payment.confirm", $id) }}";
        const API_PAYMENT_CANCEL = "{{ route("admin.payment.cancel", $id) }}";
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
    </script>
    <script src="{{ asset('js/pages/payment.js') }}"></script>
@endpush
