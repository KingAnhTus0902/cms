<div class="col-sm-12 col-md-5">
    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
        {{__("label.common.pagination.showing")}} {{$itemStart ?? '0'}}
        → {{$itemEnd ?? '0'}}/{{$total}} {{__("label.common.pagination.entries")}}
    </div>
</div>
<div class="col-sm-12 col-md-7">
    <?php $countPage = 0 ?>
    @if($total > $limit)
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination">
                @if($total > $limit)
                    <li class="paginate_button page-item previous
                     @if($page - 1 == 0) disabled @endif" id="example2_previous">
                        <a href="javascript:" aria-controls="example2" data-dt-idx="0" tabindex="0"
                           class="page-link" data-id="{{$page - 1}}">
                            {{__('label.common.pagination.previous')}}
                        </a>
                    </li>
                @endif
                @if($page - 2 > 0)
                    <li class="paginate_button page-item">
                        <a href="javascript:" aria-controls="example2" data-dt-idx="1" tabindex="0"
                           class="page-link" data-id="{{$page - 2}}">
                            {{$page - 2}}
                        </a>
                    </li>
                    @php($countPage++)
                @endif
                @if($page - 1 > 0)
                    <li class="paginate_button page-item">
                        <a href="javascript:" aria-controls="example2" data-dt-idx="2" tabindex="0"
                           class="page-link" data-id="{{$page - 1}}">
                            {{$page - 1}}
                        </a>
                    </li>
                    @php($countPage++)
                @endif
                <li class="paginate_button page-item active">
                    <a href="javascript:" aria-controls="example2" data-dt-idx="3" tabindex="0"
                       class="page-link" data-id="{{$page}}">
                        {{$page}}
                    </a>
                </li>
                @php($countPage++)

                <?php $addPage = 4 - $countPage ?>
                @for ($p = 1; $p <= $addPage; $p++)
                    @if ($page + $p <= $lastPage)
                        <li class="paginate_button page-item">
                            <a href="javascript:" aria-controls="example2" data-dt-idx="1" tabindex="0"
                               class="page-link" data-id="{{$page + $p}}">
                                {{$page + $p}}
                            </a>
                        </li>
                    @endif
                @endfor
                @if($total > $limit)
                    <li class="paginate_button page-item next
                     @if($page + 1 > $lastPage) disabled @endif " id="example2_next">
                        <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0"
                           class="page-link" data-id="{{$page + 1}}">
                            {{__('label.common.pagination.next')}}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    @endif
</div>
