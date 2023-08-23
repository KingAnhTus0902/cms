@php
    use App\Helpers\CommonHelper;
    $dataSearchMs = session()->get('medicalSessionSearch') ?? null;
    $dateSearchMs = $dataSearchMs['keyword']['time'] ?? null;
    $multipleSearchMs = $dataSearchMs['keyword']['multiple'] ?? null;
    $statusSearchMs = $dataSearchMs['keyword']['status'] ?? null;
    $roomIdSearchMs = $dataSearchMs['keyword']['room_id'] ?? null;
    $pageMs = $dataSearchMs['page'] ?? 1;
@endphp
@extends('layouts.admin')
@section('title', __('label.medical_session.title'))
@section('content-header')
    @include('elements.medical_session.search-form')
@endsection
@section('content')
    @include('elements.medical_session.add')
    @include('elements.medical_session.edit')
    <input type="hidden" name="type" id="type" value="">
    <input type="hidden" id="hidden-page" value="{{$pageMs}}">
    <div id="medical-session-list"></div>
@endsection
@push('scripts')
    <script>
        const API_LIST           = "{{route('admin.medical_session.list')}}";
        const API_LIST_CITY      = "{{ route('admin.list.city') }}";
        const API_LIST_DISTRICT  = "{{ route('admin.list.district') }}";
        const API_LIST_FOLK      = "{{ route('admin.list.folk') }}";
        const API_CREATE_CADRES  = "{{ route('admin.medical_session.create.cadres') }}";
        const API_UPDATE_CADRES  = "{{ route('admin.medical_session.update.cadres') }}";
        const API_SUGGEST_CADRES = "{{ route('admin.medical_session.suggest.cadres') }}";
        const API_DETAIL_CADRES  = "{{ route('admin.medical_session.detail.cadres', ':id') }}";
        const API_CREATE_MEDICAL_SESSION  = "{{ route('admin.medical_session.create') }}";
        const API_UPDATE_MEDICAL_SESSION  = "{{ route('admin.medical_session.update') }}";
        const API_DETAIL         = "{{ route('admin.medical_session.detail', ':id') }}";
        const API_LIST_DEPARTMENT = "{{ route('admin.list.department') }}";
        const API_LIST_ROOM_BY_DEPARTMENT = "{{ route('admin.list.room.by.department') }}";
        const IS_REFERRING_DOCTOR = "{{ $isExaminationDoctor }}";
        const MESSAGE_ERROR = "{{ \Session::get('failed') }}";
        const API_SUGGEST_HOSPITAL = "{{ route('admin.suggest.hospital.name') }}";
    </script>
    <script src="{{ asset('js/pages/medical-session.js') }}"></script>
@endpush
