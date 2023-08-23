<div id="add-room" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.room.modal_title_add') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-room-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="code-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.room.field.code') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="code-add" name="code">
                                <span id="code-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.room.field.name') }} <span class="text-red">(*)</span>
                                </label>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="name-add" name="name">
                                <span id="name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="department_id-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.room.field.department') }} <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm select2" style="width: 100%;"
                                        id="department_id-add" name="department_id">
                                    <option value="">--- {{ __('label.room.choose_department') }} ---</option>
                                    @foreach($departmentsToCreateRoom as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                <span id="department_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="examination_type_id-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.room.field.examination_type') }}
                                </label>
                                <select class="form-control form-control-sm select2" style="width: 100%;"
                                        id="examination_type_id-add" name="examination_type_id">
                                    <option value="">--- {{ __('label.room.choose_examination_type') }} ---</option>
                                    @foreach($examinationTypeServices as $examinationTypeService)
                                        <option value="{{$examinationTypeService->id}}">{{$examinationTypeService->name}}</option>
                                    @endforeach
                                </select>
                                <span id="examination_type_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.room.field.location') }}
                                </label>
                                <textarea class="form-control form-control-sm" id="location-add" name="location">
                                </textarea>
                                <span id="location-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="note-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.room.field.note') }}
                                </label>
                                <textarea class="form-control form-control-sm" id="note-add" name="note">
                                </textarea>
                                <span id="note-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    <button class="btn btn-primary btn-sm add">
                        <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                    </button>
                    <button class="btn btn-default margin-left-5 reset" onclick="resetForm('#add-room-form')">
                        <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
