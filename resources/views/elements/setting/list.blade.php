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
                                        <th class="text-center">{{ __('label.setting.name') }}</th>
                                        <th class="text-center">{{ __('label.setting.code') }}</th>
                                        <th class="text-center">{{ __('label.setting.value') }}</th> 
                                        <th class="text-center w-8">{{__('label.common.field.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ $settings->firstItem() + $key }}</td>
                                            <td class="text-center">{{ $value->name }}</td>
                                            <td class="text-center">{{ $value->code }}</td>
                                            <td class="text-center">{{ $value->value }}</td>
                                            <td class="text-center text-nowrap">
                                                <button class="btn btn-info btn-sm mr-2 open-edit-modal"
                                                        data-id="{{ $value->id }}"
                                                        data-form-id="form" data-toggle="modal"
                                                        data-url="{{ route('admin.setting.edit', $value->id) }}"
                                                        data-target="#edit-setting">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="{{ $value->id }}"
                                                        data-url="{{ route('admin.setting.destroy', $value->id) }}"
                                                        data-name="{{ $value->name }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
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
