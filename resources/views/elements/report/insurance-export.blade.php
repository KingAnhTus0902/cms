<style>
    .cut-text{
        max-width: 300px;
        word-wrap: break-word;
    }
</style>
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
                            <table id="disease-table" class="table table-bordered dtr-inline table-striped">
                                <thead>
                                <tr></tr>
                                <tr>
                                    <th></th>
                                    <th colspan="6">Tên cơ sở khám, chữa bệnh:&ensp;{{$hospital->name}} </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="5">Mã cơ sở y tế:&ensp;&ensp;{{$hospital->code}} </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="12">SỔ KHÁM BỆNH</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="12">Từ ngày: {{ $time[0] }} Đến ngày: {{ $time[1] }}</th>
                                </tr>
                                <tr></tr>

                                <tr>
                                    <th></th>
                                    <th class="text-center" rowspan="2">{{__("label.common.field.order")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.cadre_name")}}</th>
                                    <th style="width: 100px;" class="text-center" colspan="2">{{__("label.report.insunrance_field.year_old")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.medical_insurance_number")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.address")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.folks_name")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.department_name")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.reason_for_examination")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.diagnose")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.combined_data")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.user_name")}}</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th style="width: 50px;" class="text-center">{{__("label.report.insunrance_field.male")}}</th>
                                    <th style="width: 50px;" class="text-center">{{__("label.report.insunrance_field.female")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $array=[]?>
                                @foreach ($medicalSessions as $key => $medicalSession)
                                <?php
                                $BODYear = substr($medicalSession->cadre_birthday, 0, 4);
                                $medicalDay = substr($medicalSession->medical_examination_day, 6, 10);
                                $yearOld = intval($medicalDay) - intval($BODYear);

                                if (empty($array) || !in_array($medicalSession->medical_examination_day, $array)) {
                                    array_push($array, $medicalSession->medical_examination_day);
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td colspan="12" class="text-bold">{{$medicalSession-> medical_examination_day}}
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr class="odd">
                                    <td></td>
                                    <td class="text-center">{{ $key +1}}</td>
                                    <td>{{ $medicalSession->cadre_name}}</td>

                                    {{-- Ghi số tuổi ở cột (nam) nếu là BN nam, hoặc ghi số tuổi ở cột (nữ) nếu là BN
                                    nữ--}}
                                    <td>{{ $medicalSession-> cadre_gender == 'Nam' ? $yearOld : ''}}
                                    </td>
                                    <td>{{ $medicalSession-> cadre_gender == 'Nữ' ? $yearOld : ''}}
                                    </td>
                                    <td>{{ $medicalSession-> cadre_medical_insurance_number }}</td>
                                    <td class="cut-text">{{$medicalSession-> cadre_address }}</td>
                                    <td>{{$medicalSession-> folk_name }}</td>
                                    {{-- Khám C/Khoa --}}
                                    <td> {{$medicalSession-> department_name}}</td>

                                    {{-- Triệu chứng --}}
                                    <td>{{$medicalSession-> reason_for_examination}}</td>

                                    {{-- Chẩn đoán --}}
                                    <td>{{$medicalSession-> diagnose}}</td>

                                    {{-- Phương pháp điều trị --}}
                                    <td class="cut-text">{{$medicalSession-> combined_data}}</td>

                                    {{-- Y, BS Khám bệnh --}}
                                    <td>{{$medicalSession-> user_name}}</td>
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
                                    <th></th>
                                    <td></td>
                                    <td>Trưởng khoa dược</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2">Giám đốc</td>
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
                                    <td colspan="2">(Ký, họ tên , đóng dấu)</td>
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
