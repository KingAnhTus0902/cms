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
                                <div style="width: 100% !important; overflow-x:auto">
                                    <table id="disease-table" class="table table-bordered dtr-inline table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">{{__("label.common.field.order")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.code")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.active_ingredient_name")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.name")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.method")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.dosage_form")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.content")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.amount")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.unit_id")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.service_unit_price")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.total_price")}}</th>
                                                <th class="text-center">{{__("label.report.distributed_material_field.created_at")}}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">(1)</th>
                                                <th class="text-center">(2)</th>
                                                <th class="text-center">(3)</th>
                                                <th class="text-center">(4)</th>
                                                <th class="text-center">(5)</th>
                                                <th class="text-center">(6)</th>
                                                <th class="text-center">(7)</th>
                                                <th class="text-center">(8)</th>
                                                <th class="text-center">(9)</th>
                                                <th class="text-center">(10)</th>
                                                <th class="text-center">(11)</th>
                                                 <th class="text-center">(12)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $array = []; ?>
                                            @foreach ($medicineOfMedicalSession as $key => $medicineOfMedicalSession)
                                            <?php
                                                if (empty($array) || !in_array($medicineOfMedicalSession->materials_type_name, $array)) {
                                                    array_push($array, $medicineOfMedicalSession->materials_type_name);
                                                        $keyType = array_search($medicineOfMedicalSession->materials_type_name, $listMaterialType) + 1;
                                                    ?>
                                                    <tr>
                                                        <td colspan="12" class="text-bold">{{ $keyType . '. ' . $medicineOfMedicalSession-> materials_type_name}}</td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                            <tr class="">
                                                <td class="text-right">{{ $medicineOfMedicalSession->number }}</td>
                                                <td class="text-center">{{ $medicineOfMedicalSession->insurance_code }}</td>
                                                <td class="text-left">{{ $medicineOfMedicalSession->active_ingredient_name }}</td>
                                                <td class="text-left">{{ $medicineOfMedicalSession->materials_name }}</td>
                                                <td class="text-right">{{ $medicineOfMedicalSession->method }}</td>
                                                <td class="text-left">{{ $medicineOfMedicalSession->dosage_form }}</td>
                                                <td class="text-right">{{ $medicineOfMedicalSession->content }}</td>
                                                <td class="text-right">{{ $medicineOfMedicalSession->amount }}</td>
                                                <td class="text-left">{{ $medicineOfMedicalSession->materials_unit }}</td>
                                                <td class="text-right">{{ $medicineOfMedicalSession->materials_insurance_unit_price }}</td>
                                                <td class="text-right">{{ $medicineOfMedicalSession->amount * $medicineOfMedicalSession->materials_insurance_unit_price }}</td>
                                                <td class="text-right">{{ date('d/m/Y', strtotime($medicineOfMedicalSession->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
<input hidden id="startDateSearch" value="{{$start}}">
<input hidden id="endDateSearch" value="{{$end}}">
