<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="width: 100% !important; overflow-x:auto">
                                <table id="disease-table" class="table table-bordered dtr-inline table-striped">
                                    <thead>
                                        <tr></tr>
                                        <tr>
                                            <th></th>
                                            <th colspan="6">Tên cơ sở khám, chữa bệnh:&ensp;&ensp;{{$hospital->name}} </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th colspan="2">Mẫu số: 20/BHYT</th>
                                        </tr>
                                        <tr>
                                            <th colspan="1"></th>
                                            <th colspan="5">Mã cơ sở y tế:&ensp;&ensp;{{$hospital->code}}</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th colspan="12">THỐNG KÊ THUỐC THANH TOÁN BHYT</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th colspan="12">Từ ngày: {{ $time[0] }} Đến ngày: {{ $time[1] }}</th>
                                        </tr>
                                        <tr></tr>

                                        <tr>
                                            <th></th>
                                            <th class="text-center">{{__("label.common.field.order")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.code")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.active_ingredient_name")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.name")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.method")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.dosage_form")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.content")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.unit_id")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.amount")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.service_unit_price")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.total_price")}}</th>
                                            <th class="text-center">{{__("label.report.distributed_material_field.created_at")}}</th>
                                        </tr>
                                        <tr>
                                            <th></th>
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
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="12" class="text-bold"><strong>{{ count($array) . '. ' . $medicineOfMedicalSession-> materials_type_name }}</strong></td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                            <tr class="">
                                                <td></td>
                                                <td class="text-center text-right">{{ $medicineOfMedicalSession->number }}</td>
                                                <td class="text-center">{{ $medicineOfMedicalSession->insurance_code }}</td>
                                                <td class="text-center text-left">{{ $medicineOfMedicalSession->active_ingredient_name }}</td>
                                                <td class="text-center text-left">{{ $medicineOfMedicalSession->materials_name }}</td>
                                                <td class="text-center text-right">{{ $medicineOfMedicalSession->method }}</td>
                                                <td class="text-center text-left">{{ $medicineOfMedicalSession->dosage_form }}</td>
                                                <td class="text-center text-right">{{ $medicineOfMedicalSession->content }}</td>
                                                <td class="text-center text-right">{{ $medicineOfMedicalSession->amount }}</td>
                                                <td class="text-center text-left">{{ $medicineOfMedicalSession->materials_unit }}</td>
                                                <td class="text-center text-right">{{ $medicineOfMedicalSession->materials_insurance_unit_price }}</td>
                                                <td class="text-center text-right">{{ $medicineOfMedicalSession->amount * $medicineOfMedicalSession->materials_insurance_unit_price }}</td>
                                                <td class="text-center text-right">{{ date('d/m/Y', strtotime($medicineOfMedicalSession->created_at)) }}</td>
                                            </tr>
                                        @endforeach


                                        <tr></tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th colspan="2">........, ngày ....... tháng ......... năm.....</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Người lập biểu mẫu</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Trưởng khoa dược</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Giám đốc</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>(Ký, họ tên)</td>
                                            <td></td>
                                            <th></th>
                                            <td></td>
                                            <td>(Ký, họ tên)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>(Ký, họ tên , đóng dấu)</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
