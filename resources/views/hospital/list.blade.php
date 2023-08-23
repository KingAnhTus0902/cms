@section('title', __('label.hospital.title'))
@extends('layouts.admin')

@section('content-header')
    @include('elements.hospital.search', [
    'cities' => $cities
])
@endsection
@section('content')
    @include('elements.hospital.add', [
    'cities' => $cities,
    'organizations' => $organizations
])
    @include('elements.hospital.edit', [
    'cities' => $cities,
    'organizations' => $organizations
])
    <div id="content-list">
    </div>
@endsection
@push('scripts')
    <script>
        const API_LIST = "{{route('admin.list.hospital')}}";
        const API_DETAIL = "{{ route("admin.detail.hospital", ":id") }}";
        const API_CREATE = "{{route('admin.create.hospital')}}";
        const API_UPDATE = "{{ route("admin.update.hospital") }}";
        const API_DELETE = "{{ route("admin.delete.hospital") }}";
    </script>
    <script src="{{ asset('js/pages/hospital.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 18px;
            padding: 0;
        }
        .select2-container--default .select2-selection--single {
            height: calc(1.8125rem + 2px);
            border-radius: 0.2rem;
            border: 1px solid #ced4da;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
@endpush
