@extends('layouts.admin')
@section('title', __('title.report.insurance_paid'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                @section('content-header')
                    @include('elements.report.search-insurance-paid')
                @endsection
                {{-- Table --}}
                <div id="content-list">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const API_TOKEN = '{!! csrf_token() !!}';
        const API_LIST = '{{ route('admin.report.insurancePaidList') }}';
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
    </script>
    <script src="{{ asset('js/pages/insurance-paid.js') }}"></script>
@endpush
