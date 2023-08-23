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
                                        <th class="dt-center ordinal-number u-width10"
                                            data-column-name="id" id="ordinal-number-hospital">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class=" u-width200" tabindex="200"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending">
                                            {{__("label.hospital.field.name")}}
                                        </th>
                                        <th class=" u-width150" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            {{__("label.hospital.field.phone")}}
                                        </th>
                                        <th class=" u-width150" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            {{__("label.hospital.field.city_id")}}
                                        </th>
                                        <th class=" u-width400" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            {{__("label.hospital.field.organization_id")}}
                                        </th>
                                        <th class=" u-width100" tabindex="0"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($hospitals as $key => $hospital)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            <td class="word-break" tabindex="0">{{ $hospital->name }}</td>
                                            <td class="word-break text-right">{{ $hospital->phone }}</td>
                                            <td class="word-break">{{ $hospital->city->name }}</td>
                                            <td class="word-break">{{ $hospital->organization->name ?? ''}}</td>
                                            <td class="dt-center">
                                                @if(auth()->user()->can('View-hospital') ||
                                                    auth()->user()->can('Edit-hospital'))
                                                    <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $hospital->id }}"
                                                            data-form-id="form" data-toggle="modal"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('Delete-hospital'))
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $hospital->id }}"
                                                            data-name="{{ $hospital->name }}"
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




