@php
    use App\Constants\MaterialConstants;
@endphp
<div id="add-material" class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.material.modal_title_add') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-material-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mapping_name-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.mapping_name') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="mapping_name-add"
                                    name="mapping_name">
                                <span id="mapping_name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name-add"
                                    class="col-form-label col-form-label-sm">{{ __('label.material.field.name') }} <span
                                        class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="name-add"
                                    name="name">
                                <span id="name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="radio" class="custom-radio-input" id="type_medicine" name="type"
                                    value="{{ MaterialConstants::TYPE_MEDICINE }}">
                                <label for="type_medicine">{{ __('label.material.choose_type.medicine') }}</label><br>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="radio" class="custom-radio-input" id="type_material" name="type"
                                    value="{{ MaterialConstants::TYPE_MATERIAL }}">
                                <label for="type_material">{{ __('label.material.choose_type.material') }}</label><br>
                            </div>
                        </div>
                        <span id="type-add-error" class="error validate-error"></span>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="active_ingredient_name-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.active_ingredient_name') }}
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    id="active_ingredient_name-add" name="active_ingredient_name">
                                <span id="active_ingredient_name-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="content-add"
                                    class="col-form-label col-form-label-sm">{{ __('label.material.field.content') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="content-add"
                                    name="content">
                                <span id="content-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dosage_form-add"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.dosage_form') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="dosage_form-add"
                                    name="dosage_form">
                                <span id="dosage_form-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="material_type_id-add"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.material_type_id') }}
                                </label>
                                <select name="material_type_id" class="form-control form-control-sm material-add-select2"
                                    style="width: 100%;"
                                    id="material_type_id-add">
                                    <option value="">--- {{ __('label.material.choose_material_type') }} ---</option>
                                    @foreach ($materialTypes as $materialType)
                                        <option value="{{ $materialType->id }}">{{ $materialType->name }}</option>
                                    @endforeach
                                </select>
                                <span id="material_type_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unit_id-add"
                                    class="col-form-label col-form-label-sm">{{ __('label.material.field.unit_id') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select name="unit_id" class="form-control form-control-sm material-add-select2" style="width: 100%;"
                                    id="unit_id-add">
                                    <option value="">--- {{ __('label.material.choose_unit_id') }} ---</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                <span id="unit_id-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ingredients-add"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.ingredients') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="ingredients-add"
                                    name="ingredients">
                                <span id="ingredients-add-error" class="error validate-error"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="use_insurance-add" name="use_insurance" value="1"
                                        class="use_insurance_checkbox">
                                    <label for="use_insurance-add" style="font-size: .875rem;">
                                        {{ __('label.material.field.use_insurance') }}
                                    </label>
                                </div>
                                <span id="use_insurance-add-error" class="error validate-error"></span>
                            </div>
                        </div>


                        <div class="col-md-6 insurance_code_input">
                            <div class="form-group">
                                <label for="insurance_code-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.insurance_code') }}
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    id="insurance_code-add" name="insurance_code">
                                <span id="insurance_code-add-error" class="error validate-error"></span>
                            </div>
                        </div>


                        <div class="col-md-6 insurance_unit_price_input">
                            <div class="form-group">
                                <label for="insurance_unit_price-add"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.insurance_unit_price') }}
                                </label>
                                <input type="number" class="form-control form-control-sm price-validate"
                                    id="insurance_unit_price-add" name="insurance_unit_price">
                                <span id="insurance_unit_price-add-error" class="error validate-error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service_unit_price-add"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.service_unit_price') }}
                                </label>
                                <input type="number" class="form-control form-control-sm price-validate"
                                    id="service_unit_price-add" name="service_unit_price">
                                <span id="service_unit_price-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="disease_type-add" class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.disease_type') }}
                                </label>
                                <input type="text" class="form-control form-control-sm" id="disease_type-add"
                                    name="disease_type">
                                <span id="disease_type-add-error" class="error validate-error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-sm">
                                <label for="method-add">
                                    {{ __('label.material.field.method') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <select class="form-control form-control-sm"
                                        id="method-add" name="method">
                                <option value="">--- {{ __('label.material.choose_method') }} ---</option>
                                    @foreach (MaterialConstants::METHOD as $key => $method)
                                        <option value="{{ $key }}"> {{ $method }}</option>
                                    @endforeach
                                </select>
                                <p id="method-add-error" class="error validate-error"></p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="usage-add"
                                    class="col-form-label col-form-label-sm">
                                    {{ __('label.material.field.usage') }}
                                    <span class="text-red">(*)</span>
                                </label>
                                <textarea class="form-control form-control-sm"
                                    rows="5" id="usage-add" name="usage">
                                </textarea>
                                <span id="usage-add-error" class="error validate-error"></span>
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
                    <button class="btn btn-default margin-left-5 reset"
                         onclick="resetMaterialElement('#add-material')">
                        <i class="fas fa-sync-alt"></i> {{ __('label.common.button.reset') }}
                    </button>
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal"
                        onclick="resetMaterialElement('#add-material')">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

