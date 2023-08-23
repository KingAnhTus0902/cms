@extends('layouts.admin')
@section('title', __('title.disease_page'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                @section('content-header')
                    @include('elements.disease.search')
                @endsection
                @include('elements.disease.add')
                @include('elements.disease.edit')
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
        const API_LIST = '{{ route('admin.diseases.list') }}';
        const API_CREATE = '{{ route('admin.diseases.store') }}';
        const API_UPDATE = '{{ route('admin.diseases.update', ':id') }}';
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
    </script>
    <script src="{{ asset('js/pages/disease.js') }}"></script>
@endpush
