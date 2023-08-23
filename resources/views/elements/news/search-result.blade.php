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
                            <table id="example2" class="th-center table table-striped table-hover dtr-inline dataTable"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr>
                                    <th class="dt-center u-width10 ordinal-number"
                                        data-column-name="id" id="ordinal-number-news">
                                        {{__("label.common.field.ordinal_number")}}
                                    </th>
                                    <th class="dt-center w-30" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        {{__("label.news.field.title")}}
                                    </th>
                                    <th class="dt-center u-width110" tabindex="0"
                                        aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        {{__("label.news.field.category")}}
                                    </th>
                                    <th class="dt-center" tabindex="0"
                                        aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">
                                        {{__("label.news.field.short_description")}}
                                    </th>
                                    <th class="dt-center u-width100" tabindex="0"
                                        aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">
                                        {{__("label.common.field.action")}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($news as $key => $newsItem)
                                <tr class="odd">
                                    <td class="dt-center">{{ $itemStart + $key }}</td>
                                    <td class="word-break" tabindex="0">
                                        {{ mb_strimwidth($newsItem->title, 0, 100, "...") }}
                                    </td>
                                    <td>
                                        {{ $newsItem->categoryNews->name ?? ''}}
                                    </td>
                                    <td class="word-break" >
                                    {!!
                \App\Helpers\TextFormatHelper::textFormat(mb_strimwidth($newsItem->short_description, 0, 180, "..."))
                                    !!}
                                    </td>
                                    <td class="dt-center">
                                        @if (auth()->user()->can('View-new') || auth()->user()->can('Edit-new'))
                                            <button class="btn btn-info btn-sm open-edit-modal"
                                                    data-id="{{ $newsItem->id }}"
                                                    data-form-id="form" data-toggle="modal"
                                                    title="{{ __('label.common.button.edit_title') }}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        @endif

                                        @if (auth()->user()->can('Delete-new'))
                                            <button class="btn btn-danger btn-sm delete-btn"
                                                    data-id="{{ $newsItem->id }}"
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
