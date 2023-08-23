@extends('layouts.admin')
@section('title', __('label.department.title'))
@section('content-header')
    @include('elements.department.search-form')
@endsection
@section('content')
    @include('elements.department.add')
    @include('elements.department.edit')
    <div id="content-list">
    </div>
@endsection
@push('scripts')
    <script>
        const API_LIST = "{{route('admin.department.list')}}";
        const API_DETAIL = "{{ route("admin.detail.department", ":id") }}";
        const API_CREATE = "{{route('admin.create.department')}}";
        const API_UPDATE = "{{ route("admin.update.department") }}";
        const API_DELETE = "{{ route("admin.delete.department") }}";
    </script>
    <script src="{{ asset('js/pages/department.js') }}"></script>
@endpush






