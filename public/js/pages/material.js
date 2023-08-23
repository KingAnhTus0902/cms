$(document).ready(function () {
    getMaterial();

    $(document).on("click", "#search-material", function () {
        appendKeyWordSearch();
        let keyword = $("#input-search-hidden").val();
        let page = 1;
        let material_type = $("#select-material-type-hidden").val();
        getMaterial(keyword, page, material_type);
    });

    $(document).on("keyup", "#input-search-material", function (e) {
        let keyword = $("#input-search-hidden").val();
        let page = $("li.page-item.active ").find("a.page-link").data('id');
        if (e.keyCode === 13) {
            getMaterial(keyword, page);
        }
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = $("#input-search-hidden").val();
        let material_type = $("#select-material-type-hidden").val();
        getMaterial(keyword, page, material_type);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        let data = $("#add-material-form").serialize();
        hideMessageValidate('#add-material-form');
        createOrUpdate(api, data, nextAddMaterial);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-material-form');
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            name: $('#name-edit').val(),
            mapping_name: $('#mapping_name-edit').val(),
            type: $('#edit-material-form').find('input[name=type]:checked').val(),
            active_ingredient_name: $('#active_ingredient_name-edit').val(),
            content: $('#content-edit').val(),
            dosage_form: $('#dosage_form-edit').val(),
            material_type_id: $('#material_type_id-edit').val(),
            ingredients: $('#ingredients-edit').val(),
            unit_id: $('#unit_id-edit').val(),
            service_unit_price: $('#service_unit_price-edit').val(),
            use_insurance: $('#use_insurance-edit').val(),
            insurance_code: $('#insurance_code-edit').val(),
            insurance_unit_price: $('#insurance_unit_price-edit').val(),
            disease_type: $('#disease_type-edit').val(),
            method: $('#method-edit').val(),
            usage: $('#usage-data-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-material-form');
        createOrUpdate(api, data, nextEditMaterial);
    });

    $(document).on("click", ".delete-btn", function () {
        swal({
            title: `Bạn có chắc chắn muốn xóa vật tư này ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["Hủy", "OK"],
        })
            .then((willDelete) => {
                if (willDelete) {
                    let api = API_DELETE;
                    let id = $(this).data('id');
                    let data = {id: id};
                    createOrUpdate(api, data, nextDeleteMaterial);
                }
            });
    });

    
    $(".material-add-select2").select2({
        dropdownParent: $("#add-material")
    });
    $(".material-edit-select2").select2({
        dropdownParent: $("#edit-material")
    });
    $(document).on('click', ".open-add-modal", function () {
        resetMaterialElement('#add-material');
        $(":radio[name=type]").first().prop("checked", true);
    });

    $(document).on('click', '.detail-material', function () {
        let id = $(this).data('id');
        let api = API_DETAIL_AMOUNT;
        api = api.replace(":id", id);
        getData(api, id, appendDataDetail);
    });

    function appendDataDetail(data) {
        $('#detail-material').find('.modal-body').html(data);
        $('#detail-material').modal("show")
    }
})


function getMaterial(keyword = "", page = 1, material_type) {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        material_type: material_type
    };
    getData(api, dataSearch, nextGetMaterial);
}

function searchMaterial() {
    let keyword = $("#input-search-hidden").val();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    let material_type = $("#select-material-type-hidden").val();
    getMaterial(keyword, page, material_type);
}


function nextGetMaterial(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-material').modal('show');
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            if (key === 'use_insurance' && item[key] == 1) {
                $(`#${key}-${type}`).prop('checked', true);
                $('.insurance_code_input').show();
                $('.insurance_unit_price_input').show();
            }
            else if (key === 'use_insurance' && item[key] == 0) {
                $(`#${key}-${type}`).prop('checked', false);
                $('.insurance_code_input').hide();
                $('.insurance_unit_price_input').hide();
            }
            else if ($(`#${key}-${type}`).is('select')) {
                $(`#${key}-${type}`).val(item[key]).trigger('change');
            }
            else if ($(`input[name=${key}]`).is(':radio')) {
                $('input[name=' + key + ']').filter(function() {
                    return this.value == item[key];
                }).prop('checked', true)
            }
            else {
                $(`#${key}-${type}`).val(item[key]);
            }
        }
    }
    $('#usage-data-edit').val(item['usage']);
}


function nextAddMaterial(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-material').modal('hide');
        $('#add-material-form')[0].reset();
        hideMessageValidate('#add-material-form');
        toastAlert(data.message, "", "success");
        searchMaterial();
    }
}

function nextEditMaterial(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-material').modal('hide');
        hideMessageValidate('#edit-material-form');
        toastAlert(data.message, "", "success");
        searchMaterial();
    }
}

function nextDeleteMaterial(data) {
    toastAlert(data.message, "", "success");
    searchMaterial();
}

function resetMaterialFormSearch(form = '')
{
    $("#select-material").val('').trigger('change');
    resetForm(form);
}

$('.price-validate').keypress(function(e) {
    if(!(/[0-9]/.test(String.fromCharCode(e.which)))){
        e.preventDefault();
    }
});

function appendKeyWordSearch () {
    let keywordSearch = $("#input-search-material").val();
    let selectMaterialValue = $("#select-material").val();
    $("#input-search-hidden").val(keywordSearch);
    $("#select-material-type-hidden").val(selectMaterialValue);
}
