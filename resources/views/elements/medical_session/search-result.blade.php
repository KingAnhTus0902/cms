@php
    use App\Helpers\RoleHelper;
    use \App\Helpers\CommonHelper;
@endphp
<span hidden id="hidden-sort-column">{{$sort_column}}</span>
<span hidden id="hidden-sort-type">{{$sort_type}}</span>
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
                                       class="table table-striped table-hover dtr-inline dataTable th-center"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="dt-center w-5 ordinal-number"
                                            data-column-name="id" id="ordinal-number">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="dt-center w-10">
                                            {{__("label.medical_session.field.code")}}
                                        </th>
                                        <th class="dt-center w-12">
                                            {{__("label.medical_session.field.cadres_name")}}
                                        </th>
                                        <th class="dt-center w-8">
                                            {{__("label.medical_session.field.cadres_birthday")}}
                                        </th>
                                        <th class="dt-center w-8">
                                            {{__("label.medical_session.field.cadres_gender")}}
                                        </th>
                                        @if(RoleHelper::getByRole([ADMIN, RECEPTIONIST]))
                                            <th class="dt-center w-10">
                                                {{__("label.medical_session.field.room")}}
                                            </th>
                                        @endif
                                        <th class="dt-center w-5">
                                            {{__("label.common.field.order")}}
                                        </th>
                                        <th class="dt-center w-10 no-wrap">
                                            {{__("label.medical_session.field.status")}}
                                        </th>
                                        <th class="dt-center w-10 no-wrap">
                                            {{__("label.medical_session.field.medical_examination_day")}}
                                        </th>
                                        <th class="dt-center">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($medicalSessions as $key => $medicalSession)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            @if($medicalSession->getRawOriginal('status') != \App\Constants\MedicalSessionConstants::STATUS_WAITING_PAY)
                                            <td class="dt-center">
                                                <a href="{{ route('admin.medical_session.examination', [
                                                    'id' => $medicalSession->id
                                                ]) }}">{{$medicalSession->code}}</a>
                                            </td>
                                            @else
                                                <td class="dt-center">{{$medicalSession->code}}</td>
                                            @endif
                                            <td class="word-break">{{$medicalSession->cadre_name}}</td>
                                            <td class="text-right word-break">
                                                {{CommonHelper::formatDate($medicalSession->cadre_birthday, YEAR_MONTH_DAY, YEAR)}}
                                            </td>
                                            <td class="word-break">{{$medicalSession->cadre_gender}}</td>
                                            @if(RoleHelper::getByRole([ADMIN, RECEPTIONIST]))
                                                <td class="word-break">{{$medicalSession->room_name}}</td>
                                            @endif
                                            <td class="dt-center word-break">{{$medicalSession->ordinal}}
                                            </td>
                                            <td class="no-wrap">{!! $medicalSession->status !!}</td>
                                            <td class="text-right">{{$medicalSession->medical_examination_day}}</td>
                                            <td class="dt-center">
                                                @if($medicalSession->getRawOriginal('status') == 0)
                                                    <button class="btn btn-info btn-sm open-edit-modal mr-1"
                                                            data-form-id="form" data-toggle="modal"
                                                            data-target="#edit-medical-session" type="button"
                                                        title="{{ __('label.medical_session.modal_title_edit') }}"
                                                        data-id="{{$medicalSession->id}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if($medicalSession->getRawOriginal('status') != 0)
                                                <a class="btn btn-primary btn-sm"
                                                        href="{{ route('admin.medical_session.examination', [
                                                            'id' => $medicalSession->id
                                                        ]) }}"
                                                        title="{{ __('label.common.button.examination') }}">
                                                    <i class="fas fa-stethoscope"></i>
                                                </a>@endif
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
