@php
    use App\Constants\ImportMaterialsSlipConstants;
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
                    @if($total > 0)
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-striped table-hover dtr-inline dataTable"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="dt-center w-5 ordinal-number"
                                            data-column-name="id" id="ordinal-number">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="dt-center w-20">
                                            {{__("label.import_materials_slip.field.code")}}
                                        </th>
                                        <th class="dt-center w-20">
                                            {{__("label.import_materials_slip.field.import_day")}}
                                        </th>
                                        <th class="dt-center w-20">
                                            {{__("label.import_materials_slip.field.user_import")}}
                                        </th>
                                        <th class="dt-center">
                                            {{__("label.import_materials_slip.field.status")}}
                                        </th>
                                        <th class="dt-center w-12">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($importMaterialsSlips as $key => $importMaterialsSlip)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            <td class="word-break" tabindex="0">{{$importMaterialsSlip->code }}</td>
                                            <td class="word-break text-right">{{ $importMaterialsSlip->import_day }}</td>
                                            <td class="word-break">{{ $importMaterialsSlip->user_name }}</td>
                                            <td class="word-break">{!! $importMaterialsSlip->status !!}</td>
                                            <td class="dt-center">
                                                <button class="btn btn-primary btn-sm mr-1 open-detail-modal"
                                                        data-id="{{ $importMaterialsSlip->id }}"
                                                        data-form-id="form" data-toggle="modal"
                                                        data-target="#detail-import-material-slip"
                                                        title="{{ __('label.import_materials_slip.title_detail') }}">
                                                    <i class="fa fa-info-circle"></i>
                                                </button>
                                    @if($importMaterialsSlip->getRawOriginal('status')
                                    == ImportMaterialsSlipConstants::STATUS_DRAFT)
                                                    <a class="btn btn-info btn-sm mr-1"
                                  href="{{route('admin.import_materials_slip.view_edit', $importMaterialsSlip->id)}}"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="{{ $importMaterialsSlip->id }}"
                                                        data-name="{{ $importMaterialsSlip->code }}"
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
