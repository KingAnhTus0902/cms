@php
    use App\Constants\MaterialConstants;
@endphp
<div id="edit-material" class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.material.modal_title_edit') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-material-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mapping_name-edit"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.mapping_name') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="mapping_name-edit"
                                    name="mapping_name">
                                <span id="mapping_name-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name-edit"
                                    class="col-form-label col-form-label-sm">{{ __('label.material.field.name') }} <span
                                        class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="name-edit"
                                    name="name">
                                <span id="name-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="radio" class="custom-radio-input" id="type-medicine-edit" name="type"
                                    value="{{ MaterialConstants::TYPE_MEDICINE }}">
                                <label for="type-medicine-edit">
                                    {{ __('label.material.choose_type.medicine') }}
                                </label><br>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="radio" class="custom-radio-input" id="type-material-edit" name="type"
                                    value="{{ MaterialConstants::TYPE_MATERIAL }}">
                                <label for="type-material-edit">
                                    {{ __('label.material.choose_type.material') }}
                                </label><br>
                            </div>
                        </div>
                        <span id="type-edit-error" class="error validate-error"></span>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="active_ingredient_name-edit"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.active_ingredient_name') }}
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    id="active_ingredient_name-edit" name="active_ingredient_name">
                                <span id="active_ingredient_name-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="content-edit"
                                    class="col-form-label col-form-label-sm">{{ __('label.material.field.content') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="content-edit"
                                    name="content">
                                <span id="content-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dosage_form-edit"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.dosage_form') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="dosage_form-edit"
                                    name="dosage_form">
                                <span id="dosage_form-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="material_type_id-edit"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.material_type_id') }}
                                </label>
                                <select name="material_type_id" class="form-control form-control-sm material-edit-select2"
                                    style="width: 100%;"
                                    id="material_type_id-edit">
                                    <option value="">--- {{ __('label.material.choose_material_type') }} ---</option>
                                    @foreach ($materialTypes as $materialType)
                                        <option value="{{ $materialType->id }}">{{ $materialType->name }}</option>
                                    @endforeach
                                </select>
                                <span id="material_type_id-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unit_id-edit"
                                    class="col-form-label col-form-label-sm">{{ __('label.material.field.unit_id') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select name="unit_id" class="form-control form-control-sm material-edit-select2" style="width: 100%;"
                                    id="unit_id-edit">
                                    <option value="">--- {{ __('label.material.choose_unit_id') }} ---</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                <span id="unit_id-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="method-edit">
                                    {{ __('label.material.field.method') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm"
                                        id="method-edit" name="method">
                                <option value="">--- {{ __('label.material.choose_method') }} ---</option>
                                    @foreach (MaterialConstants::METHOD as $key => $method)
                                        <option value="{{ $key }}"> {{ $method }}</option>
                                    @endforeach
                                </select>
                                <p id="method-edit-error" class="error validate-error"></p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="usage-data-edit"
                                    class="col-form-label col-form-label-sm">{{ __('label.material.field.usage') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <textarea class="form-control form-control-sm" rows="5"
                                    id="usage-data-edit" name="usage">
                                </textarea>
                                <span id="usage-edit-error" class="error validate-error"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    @if(auth()->user()->can('Edit-material'))
                        <button class="btn btn-primary btn-sm edit">
                            <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                        </button>
                    @endif
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

