 <div id="add-unit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">
                     <i class="fas fa-edit"></i>
                     {{ __('label.unit.modal_title_add') }}
                 </h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form id="add-unit-form">
                     {{ csrf_field() }}
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group form-group-sm">
                                 <label for="code" class="col-form-label col-form-label-sm">
                                     {{ __('label.unit.field.code') }} <span class="text-red">(*)</span>
                                 </label>
                                 <input type="text" class="form-control form-control-sm" id="code-add"
                                     name="code">
                                 <span id="code-add-error" class="error validate-error"></span>
                             </div>
                         </div>
                         <div class="col-md-8">
                             <div class="form-group">
                                 <label for="name" class="col-form-label col-form-label-sm">
                                     {{ __('label.unit.field.name') }} <span class="text-red">(*)</span>
                                 </label>
                                 </label>
                                 <input type="text" class="form-control form-control-sm" id="name-add"
                                     name="name">
                                 <span id="name-add-error" class="error validate-error"></span>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="note-add" class="col-form-label col-form-label-sm">
                                     {{ __('label.unit.field.note') }}
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
                     <button class="btn btn-default margin-left-5 reset" onclick="resetForm('#add-unit')">
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
