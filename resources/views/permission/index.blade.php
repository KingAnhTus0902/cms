@extends('layouts.admin')
@section('title', __('title.permission_page'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                @section('content-header')
                    @include('elements.permission.search')
                @endsection
                @include('elements.permission.add')
                @include('elements.permission.edit')
                {{-- Table --}}
                <div id="content-list">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        const API_TOKEN = '{!! csrf_token() !!}';
        const API_LIST = '{{ route('admin.permission.list') }}';
        const API_CREATE = '{{ route('admin.permission.store') }}';
        const API_UPDATE = '{{ route('admin.permission.update', ':id') }}';
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
    </script>
    <script src="{{ asset('js/pages/permission.js') }}"></script>
@endpush
