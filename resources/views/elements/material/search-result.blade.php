@php
    use App\Helpers\NumberFormatHelper;
@endphp
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
                                <table id="example2"
                                    class="th-center table table-striped table-hover dataTable dtr-inline"
                                    aria-describedby="example2_info">
                                    <thead>
                                        <tr>
                                            <th class="dt-center w-5 ordinal-number" data-column-name="id"
                                                id="ordinal-number-material">
                                                {{ __('label.common.field.ordinal_number') }}
                                            </th>
                                            <th class="dt-center w-12">
                                                {{ __('label.material.field.code') }}
                                            </th>
                                            <th class="dt-center w-28">
                                                {{ __('label.material.field.name') }}
                                            </th>
                                            <th class="dt-center w-15">
                                                {{ __('label.material.material_type') }}
                                            </th>
                                            <th class="dt-center w-8">
                                                {{ __('label.unit.field.name') }}
                                            </th>
                                            <th class="dt-center w-10"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                {{ __('label.common.field.action') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materials as $key => $material)
                                            <tr class="odd">
                                                <td class="text-center">{{ $itemStart + $key }}</td>
                                                <td class="word-break">
                                                    {{ $material->code }}
                                                </td>
                                                <td class="word-break">{{ $material->name }}</td>
                                                <td class="word-break">
                                                    {{ !empty($material->materialType) ? $material->materialType->name : '' }}
                                                </td>
                                                <td class="word-break">
                                                    {{ !empty($material->unit) ? $material->unit->name : '' }}</td>
                                                <td class="dt-center">
                                                    @if (auth()->user()->can('View-material')
                                                        || auth()->user()->can('Edit-material'))
                                                        <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $material->id }}" data-form-id="form"
                                                            data-toggle="modal"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    @endif
                                                    @if (auth()->user()->can('Delete-material'))
                                                        <button class="btn btn-danger btn-sm delete-btn"
                                                            title="{{ __('label.common.button.delete_title') }}"
                                                            data-id="{{ $material->id }}">
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
