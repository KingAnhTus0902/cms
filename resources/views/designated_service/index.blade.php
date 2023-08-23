@section('title', __('label.designated_service.title'))
@extends('layouts.admin')

@section('content-header')
    @include('elements.designated_service.search-form')
@endsection
@section('content')
    @include('elements.designated_service.add')
    @include('elements.designated_service.edit', [
    'rooms' => $rooms,
])
    <div id="content-list">
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('summernote/summernote.min.css') }}">
@endpush
@push('scripts')
    <script>
        const API_LIST = "{{route('admin.list.designated_service')}}";
        const API_DETAIL = "{{ route("admin.detail.designated_service", ":id") }}";
        const API_CREATE = "{{route('admin.create.designated_service')}}";
        const API_UPDATE = "{{ route("admin.update.designated_service") }}";
        const API_DELETE = "{{ route("admin.delete.designated_service") }}";
        const API_UPLOAD = "{{ route("admin.upload.designated_service") }}";
        const API_UPLOAD_EDIT = "{{ route("admin.upload_edit.designated_service", ":id") }}";
    </script>
    <script src="{{ asset('js/pages/designated-service.js') }}"></script>
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
@endpush






