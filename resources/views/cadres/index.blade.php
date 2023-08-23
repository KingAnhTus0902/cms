@extends('layouts.admin')
@section('title', __('label.cadres.title'))
@section('content-header')
    @include('elements.cadres.search-form')
@endsection
@section('content')
    @include('elements.cadres.add')
    @include('elements.cadres.edit')
    @include('elements.cadres.reset-password')
    <input type="hidden" name="type" id="type" value="">
    <div id="content-list">
    </div>
@endsection
@push('scripts')
    <script>
        const API_LIST   = "{{ route('admin.list.cadres') }}";
        const API_DETAIL = "{{ route('admin.detail.cadres', ':id') }}";
        const API_CREATE = "{{ route('admin.create.cadres') }}";
        const API_UPDATE = "{{ route('admin.update.cadres') }}";
        const API_DELETE = "{{ route('admin.delete.cadres') }}";
        const API_LIST_DISTRICT  = "{{ route('admin.list.district') }}";
        const API_RESET_PASSWORD = "{{ route('admin.reset.password.cadres') }}";
        const API_LIST_CITY = "{{ route('admin.list.city') }}";
        const API_LIST_FOLK = "{{ route('admin.list.folk') }}";
        const API_SUGGEST_HOSPITAL = "{{ route('admin.suggest.hospital.name') }}";
    </script>
    <script src="{{ asset('js/pages/cadres.js') }}"></script>
@endpush






