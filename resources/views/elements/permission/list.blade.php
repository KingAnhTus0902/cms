<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    @if ($total > 0)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="permission-table" class="table table-striped table-hover dtr-inline">
                                        <thead>
                                        <tr>
                                            <th class="text-center w-5">{{ __('label.common.field.ordinal_number') }}</th>
                                            <th class="text-center w-25">{{ __('label.permission.name') }}</th>
                                            <th class="text-center w-10">{{ __('label.permission.type') }}</th>
                                            <th class="text-center w-10">{{ __('label.permission.created_at') }}</th>
                                            <th class="text-center w-10">{{ __('label.permission.updated_at') }}</th>
                                            {{--<th class="text-center text-nowrap w-10">
                                                ('label.common.field.action')}}
                                            </th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($permissions as $key => $value)
                                            <tr>
                                                <td class="text-center">{{ $permissions->firstItem() + $key }}</td>
                                                <td class="text-left word-break">{{ $value->default_name }}</td>
                                                <td class="text-left word-break">
                                                    {{ \App\Models\Permission::$type[$type] }}
                                                </td>
                                                <td class="text-right word-break">{{ $value->created_at }}</td>
                                                <td class="text-right word-break">{{ $value->updated_at }}</td>
                                                {{--<td class="text-center text-nowrap">
                                                    <button class="btn btn-info btn-sm mr-2 open-edit-modal"
                                                            data-id="{{ $value->id }}"
                                                            data-form-id="form" data-toggle="modal"
                                                            data-url="{{
                                                                route('admin.permission.edit', $value->id)
                                                                . '?type=' . $type
                                                            }}"
                                                            data-target="#edit-permission"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $value->id }}"
                                                            data-url="{{
                                                                route('admin.permission.destroy', $value->id)
                                                                . '?type=' . $type
                                                            }}"
                                                            data-name="{{ $value->name }}"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    @include('elements.paginate')
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <p>{{ __('messages.EM-001') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
