<div id="edit-department" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.department.modal_title_edit') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-department-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <input type="hidden" class="form-control form-control-sm" id="id-edit" value="">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="code-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.department.field.code') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                       id="code-edit" name="code">
                                <span id="code-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.department.field.name') }} <span class="text-red">(*)</span>
                                </label>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="name-edit" name="name">
                                <span id="name-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="user_head_id-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.department.field.user_head_id') }}
                                </label>
                                <select class="form-control form-control-sm"
                                        id="user_head_id-edit" name="user_head_id">
                                    <option value="">--- {{ __('label.department.choose_user_head') }} ---</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                    @endforeach
                                </select>
                                <span id="department_id-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="location-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.department.field.location') }}
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                       id="location-edit" name="location">
                                <span id="location-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note-edit" class="col-form-label col-form-label-sm">
                                    {{ __('label.department.field.note') }}
                                </label>
                                <textarea class="form-control form-control-sm" id="note-edit" name="note">
                                </textarea>
                                <span id="note-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    @if( auth()->user()->can('Edit-department'))
                        <button class="btn btn-primary btn-sm edit">
                            <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                        </button>
                    @endif
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel"
                            data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

