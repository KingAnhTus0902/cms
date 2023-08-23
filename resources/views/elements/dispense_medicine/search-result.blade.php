@php
    use App\Helpers\CommonHelper;
@endphp
<span hidden id="hidden-sort-column">{{$sort_column}}</span>
<span hidden id="hidden-sort-type">{{$sort_type}}</span>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        @if($total > 0)
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2"
                                           class="th-center table table-striped table-hover dtr-inline dataTable"
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
                                                {{__("label.medical_session.field.cadres_phone")}}
                                            </th>
                                            <th class="dt-center w-8">
                                                {{__("label.medical_session.field.cadres_birthday")}}
                                            </th>
                                            <th class="dt-center w-8">
                                                {{__("label.medical_session.field.cadres_gender")}}
                                            </th>
                                            <th class="dt-center w-10">
                                                {{__("label.medical_session.field.room")}}
                                            </th>
                                            <th class="dt-center w-10 no-wrap">
                                                {{__("label.medical_session.field.status")}}
                                            </th>
                                            <th class="dt-center w-10 no-wrap">
                                                {{__("label.medical_session.field.medical_examination_day")}}
                                            </th>
                                            <th class="dt-center w-8">
                                                {{__("label.common.field.action")}}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($medicalSessions as $key => $medicalSession)
                                            <tr class="odd">
                                                <td class="dt-center">{{ $itemStart + $key }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('admin.medical_session.examination', [
                                                        'id' => $medicalSession->id
                                                    ]) }}">{{$medicalSession->code}}</a>
                                                </td>
                                                <td class="word-break">{{$medicalSession->cadre_name}}</td>
                                                <td class="text-right word-break">{{$medicalSession->cadre_phone}}</td>
                                                <td class="text-right word-break">{{$medicalSession->cadre_birthday ? CommonHelper::formatDate(
                                                            $medicalSession->cadre_birthday,
                                                            YEAR_MONTH_DAY,
                                                            YEAR, ): ''}}</td>
                                                <td class="word-break">{{$medicalSession->cadre_gender}}</td>
                                                <td class="word-break">{{$medicalSession->room_name}}</td>
                                                <td class="no-wrap">{!! $medicalSession->prescription->status_label ?? '' !!}</td>
                                                <td class="text-right">{{ $medicalSession->medical_examination_day }}</td>
                                                <td class="dt-center">
                                                    <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-form-id="form" data-toggle="modal"
                                                            data-target="#edit-prescription-medicine" type="button"
                                                        title="{{ __('label.dispense_medicine.modal_title_edit') }}"
                                                        data-id="{{$medicalSession->id}}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
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
</div>
