<div id="change-room">
    <div class="row">
        <div class="col-12">
            <div class="card m-2">
                <div class="card-body">
                    <div class="row mb-20">
                        <div class="col-auto d-flex align-items-center">
                            <h4 class="m-0 h4-fw">{{ __('label.examination.move_room') }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-group-sm">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <input type="checkbox" id="checkbox-change-room" {{$isDisable ?? ""}}>
                                        </span>
                                    </div>
                                    <select class="form-control" id="select-change-room" disabled>
                                        <option value=""> --- {{ __('label.examination.room') }} ---</option>
                                        @foreach($rooms as $room)
                                            @if($room->id != $current_room->id)
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <button class="ml-1 btn moveall btn-outline-secondary" id="button-change-room"
                                             title="{{ __('label.examination.move_room') }}" disabled>
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
