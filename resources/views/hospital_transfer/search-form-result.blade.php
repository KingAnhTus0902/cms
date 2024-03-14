@php
    use App\Constants\MedicalSessionConstants;
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
                                        <th class="dt-center ordinal-number u-width10"
                                            data-column-name="id" id="ordinal-number-hospital">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="dt-center ordinal-number u-width150"
                                            data-column-name="id" id="ordinal-number-hospital">
                                            {{__("label.hospital_transfer.field.medical_sessions_id")}}
                                        </th>
                                        <th class=" u-width200" tabindex="200"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending">
                                            {{__("label.hospital_transfer.field.cadre_name")}}
                                        </th>
                                        <th class="u-width200" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            {{__("label.hospital_transfer.field.hospital_id")}}
                                        </th>
                                        <th class=" u-width150" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            {{__("label.hospital_transfer.field.identity_card_number")}}
                                        </th>
                                        <th class="u-dt-center w-10" tabindex="0"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($hospitalTransfers as $key => $hospitalTransfer)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            <td class="dt-center">
                                                {{ $hospitalTransfer->medicalSession->code ?? ''}}</td>
                                            <td class="word-break">
                                                {{ $hospitalTransfer->medicalSession->cadre_name ?? ''}}</td>
                                            <td class="word-break">{{ $hospitalTransfer->hospital->name ?? ''}}</td>
                                            <td class="text-right word-break">
                                                {{ $hospitalTransfer->medicalSession->cadre_identity_card_number ?? ''}}
                                            </td>
                                            <td class="dt-center no-wrap">
                                                @if ($hospitalTransfer->medicalSession->getRawOriginal('payment_status') !== MedicalSessionConstants::PAID_STATUS
                                                      && auth()->user()->can('Edit-hospital-tranfer'))
                                                    <a class="btn btn-info btn-sm mr-3 open-edit-modal"
                                                       href="{{
                                                            route('admin.detail.hospital_transfer',
                                                            $hospitalTransfer->id)
                                                        }}">
                                                        <i class="fa fa-edit"></i></a>
                                                @endif
                                                @if(auth()->user()->can('Print-hospital-tranfer'))
                                                        <a style="border: 2px solid #FF6600;" class="btn btn-default btn-sm open-print-modal"
                                                           data-url="{{
                                                            route('admin.print.hospital_transfer',
                                                            $hospitalTransfer->id)
                                                        }}">
                                                            <i style="color: #FF6600; " class="fa fa-print"></i></a>
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





