<span hidden id="hidden-sort-column">{{$sort_column}}</span>
<span hidden id="hidden-sort-type">{{$sort_type}}</span>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    @if($total > 0)
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-striped table-hover dtr-inline dataTable"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="dt-center ordinal-number w-5"
                                            id="ordinal-number-department">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="dt-center w-10 sorting
                                         @if($sort_column == 'code') sorting_{{$sort_type}}
                                          @endif" data-column-name="code">
                                            {{__("label.department.field.code")}}
                                        </th>
                                        <th class="dt-center w-15 sorting
                                        @if($sort_column == 'name') sorting_{{$sort_type}}
                                        @endif" data-column-name="name">
                                            {{__("label.department.field.name")}}
                                        </th>
                                        <th class="dt-center w-15">
                                            {{__("label.department.field.user_head_id")}}
                                        </th>
                                        <th class="dt-center w-15">
                                            {{__("label.common.field.phone")}}
                                        </th>
                                        <th class="dt-center">
                                            {{__("label.department.field.location")}}
                                        </th>
                                        <th class="dt-center w-10">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($departments as $key => $department)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            <td class="word-break" tabindex="0">{{$department->code}}</td>
                                            <td class="word-break">{{$department->name}}</td>
                                            <td class="word-break">
                                                {{$department->userHead ? $department->userHead->name : ""}}
                                            </td>
                                            <td class="word-break text-right">
                                                {{$department->userHead ? $department->userHead->phone : ""}}
                                            </td>
                                            <td class="word-break">{{$department->location}}</td>
                                            <td class="dt-center">
                                                @if(auth()->user()->can('View-department') ||
                                                    auth()->user()->can('Edit-department'))
                                                    <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $department->id }}"
                                                            data-form-id="form" data-toggle="modal"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('Delete-department'))
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $department->id }}"
                                                            data-name="{{ $department->name }}"
                                                            title="{{ __('label.common.button.delete_title') }}"><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            @include('elements.paginate')
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
