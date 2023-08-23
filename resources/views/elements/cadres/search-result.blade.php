@php
    use App\Constants\CadresConstants;
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
                    @if($total > 0)
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table id="example2" class="th-center table table-striped table-hover dtr-inline dataTable"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="dt-center u-width10"
                                            data-column-name="id" id="ordinal-number-cadres">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="dt-center u-width150" tabindex="0"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending">
                                            {{__("label.cadres.field.name")}}
                                        </th>
                                        <th class="dt-center u-width100" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            {{__("label.cadres.field.phone")}}
                                        </th>
                                        <th class="dt-center u-width100" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            {{__("label.cadres.field.identity_card_number")}}
                                        </th>
                                        <th class="dt-center u-width100" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            {{__("label.cadres.search_medical_insurance_number")}}
                                        </th>
                                        <th class="dt-center u-width100" tabindex="0"
                                            aria-controls="example2" rowspan="1"
                                            colspan="1" aria-label="Engine version: activate to sort column ascending">
                                            {{__("label.cadres.field.city_id")}}
                                        </th>
                                        <th class="dt-center u-width100" tabindex="0"
                                            aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cadreses as $key => $cadres)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            <td class="word-break">{{ $cadres->name }}</td>
                                            <td class="word-break text-right">{{ $cadres->phone }}</td>
                                            <td class="word-break text-right">{{ $cadres->identity_card_number }}</td>
                                            <td class="word-break text-left">{{ $cadres->medical_insurance_number }}</td>
                                            <td class="word-break">{{ $cadres->city->name ?? '' }}</td>
                                            <td class="dt-center text-nowrap">
                                                @if (\App\Helpers\RoleHelper::getByRole([ADMIN]))
                                                    @php
                                                        $status = ($cadres->status == DEACTIVE)
                                                            ? 'fa-lock'
                                                            : 'fa-unlock';
                                                        $value = ($cadres->status == DEACTIVE)
                                                            ? 1
                                                            : 0;
                                                        $title = ($cadres->status == DEACTIVE)
                                                            ? 'label.common.button.active'
                                                            : 'label.common.button.deactive';
                                                    @endphp
                                                    <button class="btn mr-2 btn-default btn-sm change-status-btn"
                                                            data-value="{{ $value }}"
                                                            data-url="{{ route('admin.change.status.cadres', $cadres->id) }}"
                                                            title="{{ __($title) }}">
                                                        <i class="fas {{ $status }}"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('View-cadres') ||
                                                    auth()->user()->can('Edit-cadres'))
                                                    <button class="btn mr-2 btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $cadres->id }}"
                                                            data-form-id="form" data-toggle="modal"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('Reset-pass-cadres'))
                                                    <button class="btn mr-2 btn-primary btn-sm open-reset-modal"
                                                            data-id="{{ $cadres->id }}"
                                                            data-form-id="form" data-toggle="modal"
                                                            data-target="#reset-cadres"
                                                            title="{{ __('label.common.button.reset_password') }}">
                                                        <i class="fa fa-key"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('Delete-cadres'))
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $cadres->id }}"
                                                            data-name="{{ $cadres->name }}"
                                                            title="{{ __('label.common.button.delete_title') }}"><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                @endif
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
