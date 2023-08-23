@extends('layouts.admin')
@section('title', __('label.material_type.title'))
@section('content-header')
    @include('elements.material_type.search-form')
@endsection
@section('content')
    @include('elements.material_type.add')
    @include('elements.material_type.edit')
    <div id="content-list">
    </div>
@endsection
@push('scripts')
    <script>
        const API_LIST = "{{route('admin.material_type.list')}}";
        const API_DETAIL = "{{ route("admin.detail.material_type", ":id") }}";
        const API_CREATE = "{{route('admin.create.material_type')}}";
        const API_UPDATE = "{{ route("admin.update.material_type") }}";
        const API_DELETE = "{{ route("admin.delete.material_type") }}";
    </script>
    <script src="{{ asset('js/pages/material_type.js') }}"></script>
@endpush

