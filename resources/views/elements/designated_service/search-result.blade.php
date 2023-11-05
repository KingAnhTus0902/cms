@php
    use App\Constants\DesignatedServiceConstants;
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
                                <table id="example2"
                                       class="th-center table table-striped table-hover dtr-inline dataTable"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class=" u-width45 ordinal-number"
                                            data-column-name="id" id="ordinal-number-designated_service">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="u-width200" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            {{__("label.designated_service.field.name")}}
                                        </th>
                                        <th class="u-width200" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            {{__("label.designated_service.field.specialist")}}
                                        </th>
                                        <th class="u-width150" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            {{__("label.designated_service.field.service_unit_price")}}
                                        </th>
                                        <th class="u-width100" tabindex="0"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($designated_services as $key => $designated_service)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            <td class="word-break">{{ $designated_service->name }}</td>
                                            <td class="word-break">
                                                {{
                                                    DesignatedServiceConstants::SPECIALIST[
                                                        $designated_service->specialist
                                                    ] ?? ''
                                                }}
                                            </td>

                                            <td class="word-break text-right">
                                                {{ \App\Helpers\NumberFormatHelper::
                                                    priceFormat($designated_service->service_unit_price) }}
                                            </td>
                                            <td class="dt-center">
                                                @if(auth()->user()->can('View-designated_service') ||
                                                    auth()->user()->can('Edit-designated_service'))
                                                    <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $designated_service->id }}"
                                                            data-form-id="form" data-toggle="modal"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('Delete-designated_service'))
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $designated_service->id }}"
                                                            data-name="{{ $designated_service->name }}"
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
