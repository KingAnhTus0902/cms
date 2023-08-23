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
                                <table id="disease-table" class="table table-striped table-hover dtr-inline">
                                    <thead>
                                    <tr>
                                    <th class="text-center w-5 ordinal-number"
                                            data-column-name="id" id="ordinal-number">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="text-center w-10">
                                            {{__("label.medical_session.field.code")}}
                                        </th>
                                        <th class="text-center w-15">
                                            {{__("label.medical_session.field.cadres_name")}}
                                        </th>
                                        <th class="text-center w-10 no-wrap">
                                            {{__("label.cadres.search_medical_insurance_number")}}
                                        </th>
                                        <th class="text-center w-10">
                                            {{__("label.medical_session.field.cadres_address")}}
                                        </th>
                                        <th class="text-center w-8 no-wrap">
                                            {{__("label.medical_session.field.medical_examination_day")}}
                                        </th>
                                        <th class="text-center w-10 no-wrap">
                                            {{__("label.medical_session.field.payment_status")}}
                                        </th>
                                        <th class="text-center w-10 no-wrap">
                                            {{__("label.medical_session.field.examination_status")}}
                                        </th>
                                        <th class="text-center">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($medicalSessions as $key => $medicalSession)
                                        <tr class="odd">
                                            <td class="text-center">{{ $itemStart + $key }}</td>
                                            <td class="word-break text-right">
                                                <a href="{{ route('admin.medical_session.examination', [
                                                    'id' => $medicalSession->id
                                                ]) }}">{{$medicalSession->code}}</a>
                                            </td>
                                            <td class="word-break">{{$medicalSession->cadre_name}}</td>
                                            <td class="text-left">{{$medicalSession->cadre_medical_insurance_number}}</td>
                                            <td class="word-break">{{$medicalSession->cadre_city_id}}</td>
                                            <td class="text-right">{{$medicalSession->medical_examination_day}}</td>
                                            <td class="no-wrap">{!! $medicalSession->payment_status !!}</td>
                                            <td class="no-wrap">{!! $medicalSession->status !!}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.payment.detail', $medicalSession->id) }}">
                                                    <button class="btn btn-info btn-sm mr-3"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                            </td>
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
