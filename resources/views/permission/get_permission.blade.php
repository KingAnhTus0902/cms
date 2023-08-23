@extends('layouts.admin')
@section('title', __('title.permission_role_page'))
@section('content')
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="user-table" class="table table-striped table-bordered table-hover dtr-inline">
                                        <thead>
                                        <tr>
                                            <th class="text-center text-no">{{ __('label.permission.name') }}</th>
                                            <th class="text-center w-75">{{ __('label.permission.role') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (!empty($permissions))
                                            @php $i = 0 @endphp
                                            @foreach($permissions as $key => $value)
                                                @php $i++ @endphp
                                                <tr class="bg-grey"
                                                    data-toggle="collapse"
                                                    data-group="permission-{{ $i }}"
                                                    data-target=".permission-{{ $i }}"
                                                    aria-expanded="true"
                                                >
                                                    <td colspan="2">{{ $key }}</td>
                                                </tr>
                                                @if (!empty($key))
                                                    @foreach($value as $permission)
                                                        <tr class="bg-white permission-{{ $i }} collapse"
                                                            aria-expanded="false"
                                                        >
                                                            <td class="text-left text-wrap">{{ $permission->default_name }}</td>
                                                            <td class="text-left">
                                                                <select class="form-control form-control-sm select2"
                                                                        name="role_id[]"
                                                                        multiple="multiple"
                                                                        data-url="{{ route(
                                                                            'admin.permission.setPermission',
                                                                            $permission->id
                                                                        ) }}"
                                                                >
                                                                    <option value="" disabled="disabled">---
                                                                        {{ __('placeholder.permission.role_id') }} ---
                                                                    </option>
                                                                    <option value="1" disabled="disabled" selected>
                                                                        {{ CONVERT_ADMIN_VN }}
                                                                    </option>
                                                                    @foreach($roles as $v)
                                                                        <option value="{{ $v->id }}"
                                                                                @if ($permission->roles->contains(
                                                                                    'id', $v->id)
                                                                                ) selected @endif
                                                                        >
                                                                            {{ $v->default_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .text-sm .select2-container--default .select2-selection--multiple .select2-selection__rendered, select.form-control-sm~.select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding: 0 .25rem;
            margin-top: 0;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript">
        const FAIL_MESSAGE = '{{ __('messages.SM-002') }}';

        $.clinicOnReady({
            options: () => {
                const $select = $('.select2');
                const $disable = 'background: grey !important; border: 1px grey !important;';

                $select.select2();

                $('.select2-selection__choice').each((i, e) => {
                    if ($(e).text().includes('{{ CONVERT_ADMIN_VN }}')) {
                        $(e).attr('style', $disable);
                        $(e).children().remove();
                    }
                });

                $('.select2-selection__choice, .select2-selection__choice__remove').on('click', function() {
                    if ($(this).text().includes('{{ CONVERT_ADMIN_VN }}')) {
                        return false;
                    }
                });

                $select.on('change', function(e) {
                    const defaultSelect = $(e.target).next().find('li.select2-selection__choice').first();
                    defaultSelect.attr('style', $disable);
                    defaultSelect.children().remove();
                });
            }
        });

        $.clinicPermission({
            selector: '.select2',
            method: 'PUT',
            swal_confirm: 'Bạn có chắc chắn muốn thay đổi chức vụ ?',
            swal_success: FAIL_MESSAGE
        })
    </script>
@endpush
