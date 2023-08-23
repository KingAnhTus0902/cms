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
                                                id="ordinal-number-health-insurance-card">
                                                {{ __('label.common.field.ordinal_number') }}
                                            </th>
                                            <th class="dt-center w-15">
                                                {{ __('label.health_insurance_card_head.field.code') }}
                                            </th>
                                            <th class="dt-center w-15">
                                                {{ __('label.health_insurance_card_head.field.discount_right_line') }}
                                            </th>
                                            <th class="dt-center w-20">
                                            {{ __('label.health_insurance_card_head.field.discount_opposite_line') }}
                                            </th>
                                            <th class="dt-center w-10"
                                                aria-label="CSS grade: activate to sort column ascending">
                                                {{ __('label.common.field.action') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($healthInsuranceCards as $key => $healthInsuranceCard)
                                            <tr class="odd">
                                                <td class="dt-center">{{ $itemStart + $key }}</td>
                                                <td class="word-break text-right">
                                                    {{ $healthInsuranceCard->code }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ $healthInsuranceCard->discount_right_line }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ $healthInsuranceCard->discount_opposite_line }}
                                                </td>
                                                <td class="dt-center">
                                                    @if(auth()->user()->can('Edit-health-insurance-card-head'))
                                                        <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $healthInsuranceCard->id }}" data-form-id="form"
                                                            data-toggle="modal"
                                                            data-target="#edit-health-insurance-card"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
