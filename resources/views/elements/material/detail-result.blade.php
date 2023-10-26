@php
    use App\Helpers\NumberFormatHelper;
@endphp

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    @if ($materialBatches->isNotEmpty())
                        <div class="row mb-1">
                            <div class="col-sm-12 col-md-6">
                                <b>{{ __('label.material.detail_field.name') }}:</b>
                                {{ $materialBatches->first()->material->name ?? null }}
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <b>{{ __('label.material.detail_field.insurance_code') }}:</b>
                                {{ $materialBatches->first()->material->insurance_code ?? null }}
                            </div>
                        </div>
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
                                            <th class="dt-center w-20">
                                                {{ __('label.material.detail_field.batch_name') }}
                                            </th>
                                            <th class="dt-center w-15">
                                                {{ __('label.material.detail_field.unit_price') }}
                                            </th>
                                            <th class="dt-center w-15">
                                                {{ __('label.material.detail_field.mfg_date') }}
                                            </th>
                                            <th class="dt-center w-15">
                                                {{ __('label.material.detail_field.exp_date') }}
                                            </th>
                                            <th class="dt-center w-15">
                                                {{ __('label.material.detail_field.supplier') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materialBatches as $materialBatche)
                                            <tr class="odd">
                                                <td class="dt-center">{{ $loop->index + 1 }}</td>
                                                <td class="word-break">
                                                    {{ $materialBatche->batch_name }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ NumberFormatHelper::priceFormat($materialBatche->unit_price) }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ $materialBatche->mfg_date ? \Carbon\Carbon::parse($materialBatche->mfg_date)->format('d/m/Y') : null }}
                                                </td>
                                                <td class="word-break text-right">
                                                    {{ $materialBatche->exp_date ? \Carbon\Carbon::parse($materialBatche->exp_date)->format('d/m/Y') : null }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $materialBatche->supplier }}
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
