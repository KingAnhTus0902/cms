@section('title', __('title.examination_type_page'))
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                @section('content-header')
                    @include('elements.examination_type.search')
                @endsection
                @include('elements.examination_type.add')
                @include('elements.examination_type.edit')
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
        const API_LIST = '{{ route('admin.examination_type.list') }}';
        const API_CREATE = '{{ route('admin.examination_type.store') }}';
        const API_UPDATE = '{{ route('admin.examination_type.update', ':id') }}';
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
    </script>
    <script src="{{ asset('js/pages/examination_type.js') }}"></script>
@endpush
