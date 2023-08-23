<div id="change-room">
    <div class="row">
        <div class="col-12">
            <div class="card m-2">
                <div class="card-body">
                    <div class="row mb-20">
                        <div class="col-auto d-flex align-items-center">
                            <h4 class="m-0 h4-fw">{{ __('label.examination.re_examination') }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-group-sm">
                                <div class="input-group">
                                    <div class="input-group date" id="cal-re_examination_date"
                                         data-target-input="nearest">
                                        <input type="text" class="datetimepicker-input form-control" value="{{$medical_session->re_examination_date}}" {{$isDisable}}
                                               id="re_examination_date-add" name="re_examination_date" placeholder="Ngày/tháng/năm" data-target="#cal-re_examination_date">
                                        <div class="input-group-append"
                                             data-target="#cal-re_examination_date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <p id="re_examination_date-add-error" class="error validate-error"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
