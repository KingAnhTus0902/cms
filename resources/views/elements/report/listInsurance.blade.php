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
                    @if ($total > 0)
                    <div class="row">
                        <div class="col-sm-12" style="overflow-x:auto">
                            <table id="disease-table" class="table table-bordered dtr-inline table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center" rowspan="2">{{__("label.common.field.order")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.cadre_name")}}</th>
                                    <th class="text-center" colspan="2">{{__("label.report.insunrance_field.year_old")}}</th>
                                    <th class="text-center u-width200" rowspan="2">{{__("label.report.insunrance_field.medical_insurance_number")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.address")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.folks_name")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.department_name")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.reason_for_examination")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.diagnose")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.combined_data")}}</th>
                                    <th class="text-center" rowspan="2">{{__("label.report.insunrance_field.user_name")}}</th>
                                </tr>
                                <tr>
                                    <th class="text-center u-width100">{{__("label.report.insunrance_field.male")}}</th>
                                    <th class="text-center u-width100">{{__("label.report.insunrance_field.female")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $array = []; ?>
                                <!--                                    medical_examination_day-->
                                @foreach ($medicalSessions as $key => $medicalSession)
                                <?php
                                $BODYear = substr($medicalSession->cadre_birthday, 0, 4);
                                $medicalDay = substr($medicalSession->medical_examination_day, 6, 10);
                                $yearOld = intval($medicalDay) - intval($BODYear);

                                if (empty($array) || !in_array($medicalSession->medical_examination_day, $array)) {
                                    array_push($array, $medicalSession->medical_examination_day);
                                    ?>
                                    <tr>
                                        <td colspan="12" class="text-bold">{{$medicalSession-> medical_examination_day}}
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                ?>
                                <tr class="odd">
                                    <td class="text-center">{{ $itemStart + $key }}</td>
                                    <td class="text-left cut-text">{{ $medicalSession->cadre_name}}</td>

                                    {{-- Ghi số tuổi ở cột (nam) nếu là BN nam, hoặc ghi số tuổi ở cột (nữ) nếu là BN nữ
                                    --}}
                                    <td class="text-right">{{ $medicalSession-> cadre_gender == 'Nam' ? $yearOld : ''}}
                                    </td>
                                    <td class="text-right">{{ $medicalSession-> cadre_gender == 'Nữ' ? $yearOld : ''}}
                                    </td>

                                    <td class="text-left">{{ $medicalSession-> cadre_medical_insurance_number }}</td>

                                    <td class="text-left cut-text">{{$medicalSession-> cadre_address }}</td>
                                    <td class="text-left cut-text">{{ $medicalSession-> folk_name }}</td>

                                    {{-- Khám C/Khoa --}}
                                    <td class="text-left cut-text"> {{$medicalSession-> department_name}}</td>

                                    {{-- Triệu chứng --}}
                                    <td class="text-left cut-text">{{$medicalSession-> reason_for_examination}}</td>

                                    {{-- Chẩn đoán --}}
                                    <td class="text-left cut-text">{{$medicalSession-> diagnose}}</td>

                                    {{-- Phương pháp điều trị --}}
                                    <td class="text-left cut-text">{{$medicalSession-> combined_data}}</td>

                                    {{-- Y, BS Khám bệnh --}}
                                    <td class="text-left cut-text">{{$medicalSession-> user_name}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
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
