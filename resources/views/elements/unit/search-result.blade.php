<span hidden id="hidden-sort-column">{{ $sort_column }}</span>
<span hidden id="hidden-sort-type">{{ $sort_type }}</span>
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
                                <table id="example2" class="th-center table table-striped table-hover dtr-inline dataTable"
                                    aria-describedby="example2_info">
                                    <thead>
                                        <tr>
                                            <th class="dt-center u-width45 ordinal-number" id="ordinal-number-unit">
                                                {{ __('label.common.field.ordinal_number') }}
                                            </th>
                                            <th class="dt-center u-width100" data-column-name="code">
                                                {{ __('label.unit.field.code') }}
                                            </th>
                                            <th class="dt-center u-width215" data-column-name="name">
                                                {{ __('label.unit.field.name') }}
                                            </th>
                                            <th class="dt-center u-width350" data-column-name="name">
                                                {{ __('label.unit.field.note') }}
                                            </th>
                                            <th class="dt-center u-width100" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                {{ __('label.common.field.action') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($units as $key => $unit)
                                            <tr class="odd">
                                                <td class="dt-center">{{ $itemStart + $key }}</td>
                                                <td class="word-break" tabindex="0">{{ $unit->code }}</td>
                                                <td class="word-break">{{ $unit->name }}</td>
                                                <td class="word-break">
                                                    {!! \App\Helpers\TextFormatHelper::textFormat($unit->note) !!}
                                                </td>
                                                <td class="dt-center">
                                                    @if(auth()->user()->can('View-unit') || auth()->user()->can('Edit-unit'))
                                                        <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $unit->id }}" data-form-id="form"
                                                            data-toggle="modal"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    @endif
                                                    @if(auth()->user()->can('Delete-unit'))
                                                        <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $unit->id }}"
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
