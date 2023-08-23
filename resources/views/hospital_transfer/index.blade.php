@php
    $dataSearchHospitalTransfer = session()->get('hospitalTransferSearch') ?? null;
    $dateSearchHospitalTransfer= $dataSearchHospitalTransfer['keyword']['time'] ?? null;
    $medicalSearchHospitalTransfer = $dataSearchHospitalTransfer['keyword']['medical_id'] ?? null;
    $nameSearchHospitalTransfer = $dataSearchHospitalTransfer['keyword']['name'] ?? null;
    $identityCardNumberSearchHospitalTransfer = $dataSearchHospitalTransfer['keyword']['identity_card_number'] ?? null;
    $pageHospitalTransfer = $dataSearchHospitalTransfer['page'] ?? 1;
@endphp
@section('title', __('label.hospital_transfer.title'))
@extends('layouts.admin')
@section('content-header')
    @include('hospital_transfer.search-form')
@endsection
@section('content')
    <input type="hidden" id="hidden-page" value="{{$pageHospitalTransfer}}">
    <div id="content-list">
    </div>
@endsection
@push('scripts')
    <script>
        const API_LIST = "{{route('admin.list.hospital_transfer')}}";
    </script>
    <script src="{{ asset('js/pages/hospital-transfer.js') }}"></script>
@endpush
