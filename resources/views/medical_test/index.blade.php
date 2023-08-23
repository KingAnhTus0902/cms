@extends('layouts.admin')
@section('title', __('title.medical_test_page'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                @section('content-header')
                    @include('elements.medical_test.search')
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
        const API_LIST = '{{ route('admin.designated_service_of_medical_session.list_medical_test') }}';
    </script>
    <script src="{{ asset('js/pages/medical_test/index.js') }}"></script>
@endpush
