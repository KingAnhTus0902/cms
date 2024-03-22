@php
    use App\Helpers\CommonHelper;
    use App\Helpers\RoleHelper;
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
                                <div class="table-responsive">
                                    <table id="medical_test-table"
                                           class="table table-striped table-hover dtr-inline"
                                    >
                                        <thead>
                                        <tr>
                                            <th class="text-center w-5">
                                                {{ __('label.common.field.ordinal_number') }}
                                            </th>
                                            <th class="text-center w-10 no-wrap">
                                                {{ __('label.medical_test.medical_examination_day') }}
                                            </th>
                                            <th class="text-center text-nowrap w-15">
                                                {{ __('label.medical_test.name') }}
                                            </th>
                                            <th class="text-center w-15">{{ __('label.medical_test.cadre') }}</th>
                                            <th class="text-center w-15">{{ __('label.medical_test.birthday') }}</th>
                                            <th class="text-center w-10">{{ __('label.medical_test.gender') }}</th>
                                            @if (RoleHelper::getName() === ADMIN)
                                                <th class="text-center w-15">{{ __('label.medical_test.room') }}</th>
                                            @endif
                                            <th class="text-center text-nowrap w-15">
                                                {{ __('label.medical_test.status') }}
                                            </th>
                                            <th class="text-center text-nowrap w-10">
                                                {{__('label.common.field.action')}}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($designatedServiceMedicalSession as $key => $value)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.medical_tests.view', $value->id) }}">
                                                        {{ $designatedServiceMedicalSession->firstItem() + $key }}
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    {{ $value->medicalSession?->medical_examination_day }}
                                                </td>
                                                <td class="word-break">
                                                    {{ $value->designated_service_name }}
                                                </td>
                                                <td class="word-break">{{ $value->medicalSession?->cadre_name }}</td>
                                                <td class="text-right word-break">
                                                    {{ $value->medicalSession?->cadre_birthday
                                                        ? CommonHelper::formatDate(
                                                            $value->medicalSession->cadre_birthday,
                                                            YEAR_MONTH_DAY,
                                                            YEAR,
                                                        )
                                                        : ''
                                                    }}
                                                </td>
                                                <td class="word-break">
                                                    {{
                                                        $value->medicalSession?->cadre_gender
                                                    }}
                                                </td>
                                                @if (RoleHelper::getName() === ADMIN)
                                                    <td class="word-break">{{ $value->room?->name }}</td>
                                                @endif
                                                <td class="no-wrap">{!! $value->format_status !!}</td>
                                                <td class="text-center text-nowrap">
                                                    @if(auth()->user()->can('View-medical-test'))
                                                        @if($value->status != \App\Constants\DesignatedOfMedicalSessionsConstants::WAITING_PAYMENT)
                                                        <a class="btn btn-info btn-sm mr-2"
                                                            data-id="{{ $value->id }}"
                                                            href="{{ route('admin.medical_tests.view', $value->id) }}"
                                                        >
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @endif
                                                    @endif

                                                </td>
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

