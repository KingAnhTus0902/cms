@php
    use App\Helpers\TextFormatHelper;
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
                                <table id="example2" class="table table-striped table-hover dtr-inline dataTable"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th class="dt-center w-5 ordinal-number"
                                            data-column-name="id" id="ordinal-number">
                                            {{__("label.common.field.ordinal_number")}}
                                        </th>
                                        <th class="dt-center w-12 sorting
                                         @if($sort_column == 'code') sorting_{{$sort_type}}
                                          @endif" data-column-name="code">
                                            {{__("label.room.field.code")}}
                                        </th>
                                        <th class="dt-center w-15 sorting
                                        @if($sort_column == 'name') sorting_{{$sort_type}}
                                        @endif" data-column-name="name">
                                            {{__("label.room.field.name")}}
                                        </th>
                                        <th class="dt-center w-12">
                                            {{__("label.room.field.examination_type")}}
                                        </th>
                                        <th class="dt-center w-15 sorting
                                        @if($sort_column == 'departments') sorting_{{$sort_type}}
                                        @endif" data-column-name="departments">
                                            {{__("label.room.field.department")}}
                                        </th>
                                        <th class="dt-center w-15 sorting
                                        @if($sort_column == 'location') sorting_{{$sort_type}}
                                        @endif" data-column-name="location">
                                            {{__("label.room.field.location")}}
                                        </th>
                                        <th class="dt-center">
                                            {{__("label.room.field.note")}}
                                        </th>
                                        <th class="dt-center w-10">
                                            {{__("label.common.field.action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($rooms as $key => $room)
                                        <tr class="odd">
                                            <td class="dt-center">{{ $itemStart + $key }}</td>
                                            <td class="word-break" tabindex="0">{{$room->code}}</td>
                                            <td class="word-break">{{$room->name}}</td>
                                            <td class="word-break">{{$room->examinationType->name ?? ""}}</td>
                                            <td class="word-break">{{$room->departments_name}}</td>
                                            <td class="word-break">{!! TextFormatHelper::textFormat($room->location) !!}</td>
                                            <td class="word-break">{!! TextFormatHelper::textFormat($room->note) !!}</td>
                                            <td class="dt-center">
                                                @if(auth()->user()->can('View-room') || auth()->user()->can('Edit-room'))
                                                    <button class="btn btn-info btn-sm open-edit-modal"
                                                            data-id="{{ $room->id }}"
                                                            title="{{ __('label.common.button.edit_title') }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @endif
                                                @if(auth()->user()->can('Delete-room'))
                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $room->id }}"
                                                            data-name="{{ $room->name }}"
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
