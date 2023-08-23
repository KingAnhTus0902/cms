@extends('layouts.admin')
@section('title', __('title.dispense_medicine'))
@section('content-header')
    @include('elements.dispense_medicine.search-form')
@endsection
@section('content')
    @include('elements.dispense_medicine.edit')
    <input type="hidden" name="type" id="type" value="">
    <div id="medical-session-list"></div>
@endsection
@push('scripts')
    <script>
        const API_LIST           = "{{route('admin.dispense_medicine.list')}}";
        const API_DETAIL         = "{{ route('admin.dispense_medicine.detail', ':id') }}";
        const API_UPDATE_PRESCRIPTION         = "{{ route('admin.dispense_medicine.update_status') }}";
        const API_LIST_DEPARTMENT = "{{ route('admin.list.department') }}";
        const API_LIST_ROOM_BY_DEPARTMENT = "{{ route('admin.list.room.by.department') }}";
    </script>
    <script src="{{ asset('js/pages/dispense-medicine.js') }}"></script>
@endpush
