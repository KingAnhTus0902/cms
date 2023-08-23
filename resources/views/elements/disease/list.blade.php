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
                                    <table id="disease-table" class="table table-striped table-hover dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="text-center w-5">{{ __('label.common.field.ordinal_number') }}</th>
                                        <th class="text-center w-10">{{ __('label.disease.code') }}</th>
                                        <th class="text-center">{{ __('label.disease.name') }}</th>
                                        <th class="text-center">{{ __('label.disease.type') }}</th>
                                        <th class="text-center w-8">{{__('label.common.field.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($diseases as $key => $value)
                                        <tr>
                                            <td class="text-center word-break">{{ $diseases->firstItem() + $key }}</td>
                                            <td class="word-break">{{ $value->code }}</td>
                                            <td class="word-break">{{ $value->name }}</td>
                                            <td class="word-break">{{ \App\Models\Disease::$type[(int)$value->type] }}</td>
                                            <td class="text-center text-nowrap">
                                                @if(auth()->user()->can('View-disease') ||
                                                    auth()->user()->can('Edit-disease'))
                                                    <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $value->id }}"
                                                                data-form-id="form" data-toggle="modal"
                                                            data-url="{{ route('admin.diseases.edit', $value->id) }}"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('Delete-disease'))
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $value->id }}"
                                                            data-url="{{ route('admin.diseases.destroy', $value->id) }}"
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
