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
                                <table id="example2" class="th-center table table-striped table-hover dtr-inline dataTable"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="dt-center u-width45 ordinal-number"
                                            id="ordinal-number-department">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="u-width200" tabindex="0" aria-controls="example2"
                                            rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            {{__("label.material_type.field.code")}}
                                        </th>
                                        <th class="" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Browser: activate to sort column ascending">
                                            {{__("label.material_type.field.name")}}
                                        </th>
                                        <th class="" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">
                                            {{__("label.material_type.field.note")}}
                                        </th>
                                        <th class="dt-center u-width100" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($material_types as $key => $material_type)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            <td class="dtr-control" tabindex="0">{{$material_type->code}}</td>
                                            <td class="word-break">{{$material_type->name}}</td>
                                            <td class="white-space word-break">{{$material_type->note}}</td>
                                            <td class="dt-center">
                                                @if(auth()->user()->can('View-material_type') ||
                                                    auth()->user()->can('Edit-material_type'))
                                                    <button
                                                        class="btn btn-info btn-sm mr-2 open-edit-modal"
                                                        data-id="{{ $material_type->id }}"
                                                        data-form-id="form" data-toggle="modal"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('Delete-material_type'))
                                                    <button
                                                        class="btn btn-danger btn-sm delete-btn"
                                                        data-id="{{ $material_type->id }}"
                                                        data-name="{{ $material_type->name }}"
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

