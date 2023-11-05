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
                                <table id="disease-table" class="table table-striped table-hover dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="text-center">{{ __('label.common.field.ordinal_number') }}</th>
                                        <th class="text-center">{{ __('label.examination_type.name') }}</th>
                                        <th class="text-center">
                                            {{ __('label.examination_type.service_unit_price') }}
                                        </th>
                                        @if(auth()->user()->can('View-disease') ||
                                            auth()->user()->can('Delete-disease'))
                                            <th class="text-center w-8">{{__('label.common.field.action')}}</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($examinationTypes as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ $examinationTypes->firstItem() + $key }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td class="text-right">{{ \App\Helpers\NumberFormatHelper::
                                                    priceFormat($value->service_unit_price) }}</td>
                                            @if(auth()->user()->can('View-disease') ||
                                                auth()->user()->can('Delete-disease'))
                                                <td class="text-center text-nowrap">
                                                    @if(auth()->user()->can('View-disease'))
                                                        <button class="btn btn-info btn-sm open-edit-modal"
                                                                data-id="{{ $value->id }}"
                                                                    data-form-id="form" data-toggle="modal"
                                                    data-url="{{ route('admin.examination_type.edit', $value->id) }}"
                                                                data-target="#edit-examination_type"
                                                        >
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    @endif
                                                    @if(auth()->user()->can('Delete-disease'))
                                                        <button class="btn btn-danger btn-sm delete-btn"
                                                                data-id="{{ $value->id }}"
                                                    data-url="{{ route('admin.examination_type.destroy', $value->id) }}"
                                                                data-name="{{ $value->name }}"
                                                        >
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
