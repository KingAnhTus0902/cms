@extends('layouts.admin')
@section('title', __('label.unit.title'))
@section('content-header')
    @include('elements.unit.search-form')
@endsection
@section('content')
    @include('elements.unit.add')
    @include('elements.unit.edit')
    <div id="content-list">
    </div>
@endsection
@push('scripts')
    <script>
        const API_LIST = "{{ route('admin.list.unit') }}";
        const API_DETAIL = "{{ route("admin.detail.unit", ":id") }}";
        const API_CREATE = "{{ route('admin.create.unit') }}";
        const API_UPDATE = "{{ route("admin.update.unit") }}";
        const API_DELETE = "{{ route("admin.delete.unit") }}";
    </script>
    <script src="{{ asset('js/pages/unit.js') }}"></script>
@endpush


