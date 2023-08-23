
@extends('layouts.admin')
@section('title', __('label.news.title'))
@section('content-header')
    @include('elements.news.search-form')
@endsection
@section('content')
    @include('elements.news.add')
    @include('elements.news.edit')
    <div id="content-list">
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('summernote/summernote.min.css') }}">
@endpush
@push('scripts')
    <script>
        const API_LIST = "{{route('admin.news.list')}}";
        const API_DETAIL = "{{ route("admin.detail.news", ":id") }}";
        const API_CREATE = "{{route('admin.create.news')}}";
        const API_UPDATE = "{{ route("admin.update.news") }}";
        const API_DELETE = "{{ route("admin.delete.news") }}";
        const API_LIST_CATEGORY = "{{ route("admin.list.category") }}";
        const API_UPLOAD = "{{ route("admin.upload.news") }}";
        const API_UPLOAD_EDIT = "{{ route("admin.upload_edit.news", ":id") }}";
    </script>

    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('js/pages/news.js') }}"></script>
@endpush
