$(document).ready(function () {
    const tableSelector = $('#table-material');
    const type = $('#type-import-materials-slip').val();
    let num = type === 'add' ? 1 : tableSelector.find('tr').length - 1;
    $(document).on('click', '.add-material', function () {
        let lastRow = tableSelector.find('tr:last');
        let html = '<tr class="odd">'
            + `<td class="dt-center order-material"></td>`
            + `<td>`
            + `<input type="text" class="form-control material-name-input form-control-sm" autocomplete="off" name="material[${num}][name]" id="material-name-${num}">`
            + `<div class="suggest-parent-dropdown">`
            + `<div class="material-list-suggest suggestion-dropdown"></div>`
            + `</div>`
            + `<input type="hidden" class="form-control material-id-input" name="material[${num}][material_id]" id="material-id-${num}">`
            + `<span id="material.${num}.name-error" class="error validate-error validate-error-material_name"></span>`
            + `<span id="material.${num}.material_id-error" class="error validate-error"></span>`
            + `</td>`
            + `<td>`
            + `<input type="text" class="form-control material-code-input form-control-sm" id="material-code-${num}" disabled>`
            + `</td>`
            + `<td>`
            + `<input type="number" class="form-control form-control-sm number-integer-validate" name="material[${num}][amount]" id="material-amount-${num}">`
            + `<span id="material.${num}.amount-error" class="error validate-error"></span>`
            + `</td>`
            + `<td>`
            + `<input type="number" class="form-control form-control-sm number-integer-validate" name="material[${num}][unit_price]" id="material-unit_price-${num}">`
            + `<span id="material.${num}.unit_price-error" class="error validate-error"></span>`
            + `</td>`
            + `<td>`
            + `<div class="input-group input-group-sm">`
            + `<div class="input-group date datetimepicker-div" id="cal-mfg_date-${num}" data-target-input="nearest">`
            + `<input type="text" class="datetimepicker-input form-control form-control-sm" name="material[${num}][mfg_date]" id="material-mfg_date-${num}" placeholder="Ngày/tháng/năm" data-target="#cal-mfg_date-${num}" onchange="resetDateTimePicker($(this).parent())">`
            + `<div class="input-group-append" data-target="#cal-mfg_date-${num}" data-toggle="datetimepicker"><div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div></div>`
            + `</div>`
            + `<span id="material.${num}.mfg_date-error" class="error validate-error"></span>`
            + `</div>`
            + `</td>`
            + `<td>`
            + `<div class="input-group input-group-sm">`
            + `<div class="input-group date datetimepicker-div" id="cal-exp_date-${num}" data-target-input="nearest">`
            + `<input type="text" class="datetimepicker-input form-control form-control-sm" name="material[${num}][exp_date]" id="material-exp_date-${num}" placeholder="Ngày/tháng/năm" data-target="#cal-exp_date-${num}" onchange="resetDateTimePicker($(this).parent())">`
            + `<div class="input-group-append" data-target="#cal-exp_date-${num}" data-toggle="datetimepicker"><div class="input-group-text form-control-sm"><i class="fa fa-calendar"></i></div></div>`
            + `</div>`
            + `<span id="material.${num}.exp_date-error" class="error validate-error"></span>`
            + `</div>`
            + `</td>`
            + `<td>`
            + `<input type="text" class="form-control form-control-sm" name="material[${num}][supplier]" id="material-supplier-${num}">`
            + `<span id="material.${num}.supplier-error" class="error validate-error"></span>`
            + `</td>`
            + `<td>`
            + `<input type="text" class="form-control form-control-sm" name="material[${num}][batch_name]" id="material-batch_name-${num}">`
            + `<span id="material.${num}.batch_name-error" class="error validate-error"></span>`
            + `</td>`
            + '<td class="dt-center">'
            + '<a class="btn btn-default btn-sm add-material mr-1"><i class="fas fa-plus"></i></a>'
            + '<a class="btn btn-default btn-sm remove-material"><i class="far fa-trash-alt"></i></a>'
            + '</td>'
            + '</tr>'
        $(html).insertAfter(lastRow);
        updateOrderRow();
        num = Number(num) + 1;
        $(".datetimepicker-div").datetimepicker({
            format: "DD/MM/YYYY",
            locale: 'vi',
            language: 'vi',
            useCurrent: false,
        });
    });

    $(document).on('click', '.remove-material', function () {
        let thisRow = $(this).closest('tr');
        let countRow = tableSelector.find('tr').length;
        if(countRow > 2) {
            thisRow.remove();
        }
        updateOrderRow();
    });

    $(document).on('click', ".open-add-material-modal", function () {
        resetMaterialElement('#add-material');
        $('input:radio[name=type]:first-child').prop('checked', true);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE_MATERIAL;
        let data = $("#add-material-form").serialize();
        hideMessageValidate('#add-material-form');
        createOrUpdate(api, data, nextAddMaterial);
    });

    $(document).on("keyup", ".material-name-input", function () {
        let query = $(this).val();
        let materialListSuggest = $(this).parent().find('.material-list-suggest');
        let validateError = $(this).parent().find('.validate-error');
        $(this).closest('td').next().find('.material-code-input').val("");
        $(this).closest('td').find('.material-id-input').val("");
        if (query !== "") {
            $.ajax({
                url: API_SUGGEST_MATERIAL,
                type: 'GET',
                data: {
                    query: query
                },
                beforeSend: () => {
                    $('.loading').hide()
                },
                success: function (response) {
                    if (response.length > 0) {
                        validateError.empty();
                        const html = response.map(v => (
                            `<div class="suggestion-option material-suggest" data-id="${v.id}">
                                <span class="suggestion-item">
                                    Tên: ${v.name}
                                    </br>
                                    Mã thuốc/vật tư: ${v.code}
                                    </br>
                                    Hàm lượng: ${v.content ?? ""}
                                </span>
                            </div>
                            `
                        )).join('');
                        materialListSuggest.fadeIn().html(html);
                    } else {
                        materialListSuggest.empty();
                    }
                    materialListSuggest.fadeIn();
                }
            });
        } else {
            validateError.empty();
            materialListSuggest.hide();
        }
    });

    $(document).on('click', 'div.material-suggest', function () {
        let id = $(this).data('id');
        let api = API_DETAIL_MATERIAL;
        api = api.replace(":id", id);
        getDataMaterialSuggest(api, id, appendDataSuggest, $(this));
    });

    $(document).on("click", ".save-real-import-material-slip, .save-draft-import-material-slip", function () {
        let typeSave = $(this).data('type') ?? "save";
        let api = (type === 'add') ? API_CREATE_IMPORT_MATERIALS_SLIP : API_EDIT_IMPORT_MATERIALS_SLIP;
        let data = $("#import-materials-slip-form").serialize() + `&type=${typeSave}`;
        hideMessageValidate('#import-materials-slip-form');
        createOrUpdate(api, data, nextSaveImportMaterialsSlip);
    });


    function nextAddMaterial(data) {
        if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
            showMessageValidate('add', data.errors);
        } else {
            $('#add-material').modal('hide');
            $('#add-material-form')[0].reset();
            hideMessageValidate('#add-material-form');
            toastAlert(data.message, "", "success");
        }
    }

    function nextSaveImportMaterialsSlip(data) {
        if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
            showMessageValidateCustom(data.errors);
        } else if (data.code == HTTP_SUCCESS) {
            if (data.status) {
                $('.save-draft-import-material-slip, .save-real-import-material-slip').attr('disabled', 'disabled');
                setTimeout(function () {
                    window.location.href = API_LIST_IMPORT_MATERIALS_SLIP;
                }, 1000);
                toastAlert(data.message_save_real, "", "success");
            } else {
                toastAlert(data.message_save_draft, "", "success");
                if (data.import_materials_slip_id) {
                    $('.save-draft-import-material-slip, .save-real-import-material-slip, .btn-danger').attr('disabled', 'disabled');
                    let route = API_VIEW_EDIT_IMPORT_MATERIALS_SLIP
                    route = route.replace(":id", data.import_materials_slip_id);
                    setTimeout(function () {
                        window.location.href = route;
                    }, 1000);
                }
            }
        } else {
            toastAlert(data.message, "", "error");
        }
    }


    function updateOrderRow() {
        let numberRow = $(".order-material");
        numberRow.text('');
        numberRow.each(function (i){
            $(this).text(i+1);
        });
    }

    function appendDataSuggest(data, element) {
        let item = data.data;
        let elementMaterialName = element.closest('td').find('.material-name-input');
        let elementMaterialId   = element.closest('td').find('.material-id-input');
        let elementMaterialCode = element.closest('td').next().find('.material-code-input');
        elementMaterialName.val(item.name)
        elementMaterialId.val(item.id)
        elementMaterialCode.val(item.code)
        element.closest('td').find('.material-list-suggest').hide();
    }

    function getDataMaterialSuggest(api, data, nextAction, element) {
        $.ajax({
            url: api,
            type: 'GET',
            data: {
                data
            },
            beforeSend: function() {
                $('.loading').show();
            },
            complete: function(){
                $('.loading').hide();
            },
            success: function (response) {
                nextAction(response, element);
            },
            error: function (request, error) {
                errorFunction(request);
            }
        });
    }

    function showMessageValidateCustom(errors) {
        for (let key in errors){
            if(errors.hasOwnProperty(key)){
                let selector = formatKeyValidate(key);
                $(`#${selector}-error`).text(errors[key]);
            }
        }
        $('.validate-error-material_name').each(function () {
            if (!$(this).is(":empty")) {
                $(this).next().empty();
            }
        });
    }
    function formatKeyValidate(key) {
        let regex = /^material/;
        if (!regex.test(key)) {
            return key;
        }
        let searchRegExp = /\./g;
        key = key.replace(searchRegExp, '\\\.');
        return key;
    }

});

