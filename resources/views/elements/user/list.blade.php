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
                                    <table id="user-table" class="table table-striped table-hover dtr-inline">
                                        <thead>
                                        <tr>
                                            <th class="text-center w-5">{{ __('label.common.field.ordinal_number') }}</th>
                                            <th class="text-center w-15">{{ __('label.user.name') }}</th>
                                            <th class="text-center w-10">{{ __('label.user.role_id') }}</th>
                                            <th class="text-center w-15">{{ __('label.user.department_id') }}</th>
                                            <th class="text-center text-nowrap w-15">{{ __('label.user.room_id') }}</th>
                                            <th class="text-center text-nowrap w-10">
                                                {{__('label.common.field.action')}}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key => $value)
                                            <tr>
                                                <td class="text-center">{{ $users->firstItem() + $key }}</td>
                                                <td class="word-break">{{ $value->name }}</td>
                                                <td class="word-break">{{ $value->roles?->first()->default_name }}</td>
                                                <td class="word-break">{{ $value->department?->name }}</td>
                                                <td class="word-break">
                                                    @if (!$value->room->isEmpty())
                                                        {{ $value->room->implode('name', ', ') }}
                                                    @endif
                                                </td>
                                                <td class="text-center text-nowrap">
                                                    @if((auth()->user()->can('View-user') ||
                                                        auth()->user()->can('Edit-user')) &&
                                                        (
                                                            \App\Helpers\RoleHelper::getName() == ADMIN ||
                                                            auth()->user()->id == $value->department?->user_head_id
                                                        )
                                                    )
                                                        <button class="btn btn-info btn-sm mr-2 open-edit-modal"
                                                                data-id="{{ $value->id }}"
                                                                data-form-id="form" data-toggle="modal"
                                                                data-url="{{ route('admin.users.edit', $value->id) }}"
                                                                data-target="#edit-user"
                                                        >
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    @endif
                                                    @if(auth()->user()->can('Delete-user') &&
                                                        (
                                                            \App\Helpers\RoleHelper::getName() == ADMIN ||
                                                            auth()->user()->id == $value->department?->user_head_id
                                                        )
                                                    )
                                                        <button class="btn btn-danger btn-sm delete-btn"
                                                                data-id="{{ $value->id }}"
                                                                data-url="{{ route('admin.users.destroy', $value->id) }}"
                                                                data-name="{{ $value->name }}"
                                                        >
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </td>
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
