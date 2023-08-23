@extends('layouts.admin')
@section('title', __('label.room.title'))
@section('content-header')
    @include('elements.room.search-form')
@endsection
@section('content')
    @include('elements.room.add')
    @include('elements.room.edit')
    <div id="room-list"></div>
@endsection
@push('scripts')
    <script>
        const API_LIST = "{{route('admin.list.room')}}";
        const API_DETAIL = "{{ route("admin.detail.room", ":id") }}";
        const API_CREATE = "{{route('admin.create.room')}}";
        const API_UPDATE = "{{ route("admin.update.room") }}";
        const API_DELETE = "{{ route("admin.delete.room") }}";
    </script>
    <script src="{{ asset('js/pages/room.js') }}"></script>
@endpush
