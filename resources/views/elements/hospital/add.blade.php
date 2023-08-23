<div id="add-hospital" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.hospital.modal_title_add') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-hospital-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="name-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.name') }} <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="name-add" name="name">
                                <span id="name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="code-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.code') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="code-add" name="code">
                                <span id="code-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city_id-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.city_id') }} <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm "
                                        id="city_id-add" name="city_id">
                                    <option value="">--- {{ __('label.hospital.field.city_id') }} ---</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <span id="city_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="phone-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.phone') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="phone-add" name="phone">
                                <span id="phone-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="organization_id-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.organization_id') }}
                                </label>
                                <select class="form-control form-control-sm "
                                        id="organization_id-add" name="organization_id">
                                    <option value="">--- {{ __('label.hospital.field.organization_id') }} ---</option>
                                    @foreach($organizations as $organization)
                                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                                        @endforeach
                                </select>
                                <span id="organization_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-sm">
                                <label for="fax-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.fax') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="fax-add" name="fax">
                                <span id="fax-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="address-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.address') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="address-add" name="address">
                                <span id="address-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.email') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="email-add" name="email">
                                <span id="email-add-error" class="error validate-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="note-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.hospital.field.note') }}
                                </label>
                                <textarea class="form-control form-control-sm" rows="2" id="note-add" name="note">
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
                    <button class="btn btn-default margin-left-5 reset" onclick="resetForm('#add-hospital')">
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
