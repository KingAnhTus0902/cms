@extends('layouts.admin')
@section('title', __('title.distributed_materials'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                @section('content-header')
                    @include('elements.report.distributed-materials-search')
                @endsection
                {{-- Table --}}
                <div id="content-list">
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const API_TOKEN = '{!! csrf_token() !!}';
        const API_LIST = '{{ route('admin.report.distributedMaterials') }}';
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
    </script>
    <script src="{{ asset('js/pages/distributed-materials.js') }}"></script>
@endpush