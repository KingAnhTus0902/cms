@extends('layouts.admin')
@section('title', __('label.material.title'))
@section('content-header')
    @include('elements.material.search-form', [
        'materialTypes' => $materialTypes,
    ])
@endsection
@section('content')
    @include('elements.material.add', [
        'units' => $units,
        'materialTypes' => $materialTypes,
    ])
    @include('elements.material.edit', [
        'units' => $units,
        'materialTypes' => $materialTypes,
    ])
    <div id="content-list">
    </div>
@endsection


@push('scripts')
    <script>
        const API_LIST = "{{ route('admin.list.material') }}";
        const API_DETAIL = "{{ route('admin.detail.material', ':id') }}";
        const API_DETAIL_AMOUNT = "{{ route('admin.detail_amount.material', ':id') }}";
        const API_CREATE = "{{ route('admin.create.material') }}";
        const API_UPDATE = "{{ route('admin.update.material') }}";
        const API_DELETE = "{{ route('admin.delete.material') }}";
    </script>
    <script src="{{ asset('js/pages/material.js') }}"></script>
@endpush
