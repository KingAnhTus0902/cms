@extends('layouts.admin')

@section('title', __('label.import_materials_slip.title'))

@section('content-header')
    @include('elements.import_materials_slip.search-form')
@endsection

@section('content')
    <div class="modal fade" id="detail-import-material-slip" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fas fa-edit"></i>
                        {{ __('label.import_materials_slip.title_detail') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="content-detail-material-slip">
                </div>
            </div>
        </div>
    </div>
    <div id="import-materials-slip-list"></div>
    @include('elements.import_materials_slip.import')
@endsection

@push('scripts')
    <script>
        const API_LIST = "{{ route('admin.import_materials_slip.list') }}";
        const API_VALID_IMPORT = "{{ route('admin.import_materials_slip.valid_import') }}";
        const API_IMPORT = "{{ route('admin.import_materials_slip.import') }}";
        const API_DETAIL = "{{ route('admin.import_materials_slip.detail',":id") }}";
        const API_DELETE = "{{ route('admin.import_materials_slip.delete') }}";
    </script>
    <script src="{{ asset('js/pages/import-materials-slip.js') }}"></script>
@endpush
