@extends('layouts.admin')
@section('title', __('title.user_page'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                @section('content-header')
                    @include('elements.user.search')
                @endsection
                @include('elements.user.add')
                @include('elements.user.edit')
                {{-- Table --}}
                <div id="content-list">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .select2-container--open .select2-selection__rendered{
            border: none;
        }

        .select2-container .select2-search--inline{
            display: none;
        }

        .select2-selection__choice {
            font-size: 85%;
        }

        .select2-dropdown--below {
            margin-top: 1px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        const API_TOKEN = '{!! csrf_token() !!}';
        const API_LIST = '{{ route('admin.users.list') }}';
        const API_CREATE = '{{ route('admin.users.store') }}';
        const API_UPDATE = '{{ route('admin.users.update', ':id') }}';
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
    </script>
    <script src="{{ asset('js/pages/user.js') }}"></script>
@endpush
