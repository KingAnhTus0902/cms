@extends('layouts.admin')
@section('title', __('label.health_insurance_card_head.title'))
@section('content-header')
    @include('elements.health_insurance_card.search-form')
@endsection

@section('content')
    @include('elements.health_insurance_card.add')
    @include('elements.health_insurance_card.edit')
    <div id="content-list">
    </div>
@endsection

@push('scripts')
    <script>
        const API_LIST = "{{ route('admin.list.health_insurance_card') }}";
        const API_DETAIL = "{{ route('admin.detail.health_insurance_card', ':id') }}";
        const API_CREATE = "{{ route('admin.create.health_insurance_card') }}";
        const API_UPDATE = "{{ route('admin.update.health_insurance_card') }}";
        const API_DELETE = "{{ route('admin.delete.health_insurance_card') }}";
    </script>
    <script src="{{ asset('js/pages/health-insurance-card.js') }}"></script>
@endpush
