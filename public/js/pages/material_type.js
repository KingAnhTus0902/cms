$(document).ready(function () {
    getMaterialType();
    $(document).on("click", "#search-material_type", function () {
        var checkSearch = true;
        appendKeyWordSearch();
        searchMaterialType(checkSearch);
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = getKeyWordSearch();
        getMaterialType(keyword, page);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        let data = $("#add-material_type-form").serialize();
        hideMessageValidate('#add-material_type-form');
        createOrUpdate(api, data, nextAddMaterialType);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-material_type-form');
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            code: $('#code-edit').val(),
            name: $('#name-edit').val(),
            note: $('#note-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-material_type-form');
        createOrUpdate(api, data, nextEditMaterialType);
    });

    $(document).on("click", ".delete-btn", function () {
        let name = $(this).data('name');
        swal({
            title: `Bạn có chắc chắn muốn xóa ${name} ?`,
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
                    createOrUpdate(api, data, nextDeleteMaterialType);
                }
            });
    });
})

function getMaterialType(keyword = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextGetMaterialType);
}
function searchMaterialType(checkSearch = null) {
    let sortType = '';
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    if ($("#ordinal-number-material_type").hasClass("sorting_desc")) {
        sortType = 'desc';
    }
    let sortColumn = $("#ordinal-number-material_type").data('column-name');
    if (checkSearch) { page = 1 }
    getMaterialType(keyword, page, sortColumn, sortType);
}


function nextGetMaterialType(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-material_type').modal('show');
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key])
        }
    }
}


function nextAddMaterialType(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-material_type').modal('hide');
        $('#add-material_type-form')[0].reset();
        hideMessageValidate('#add-material_type-form');
        toastAlert(data.message, "", "success");
        searchMaterialType();
    }
}

function nextEditMaterialType(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-material_type').modal('hide');
        hideMessageValidate('#edit-material_type-form');
        toastAlert(data.message, "", "success");
        searchMaterialType();
    }
}

function nextDeleteMaterialType(data) {
    toastAlert(data.message, "", "success");
    searchMaterialType();
}

function getKeyWordSearch () {
    let keywordSearchCode = $("#input-search-code-hidden").val();
    let keywordSearchName = $("#input-search-name-hidden").val();
    return {
        code: keywordSearchCode,
        name: keywordSearchName,
    }
}

function appendKeyWordSearch () {
    let keywordName = $('#input-search-name').val();
    let keywordCode = $('#input-search-code').val();
    $("#input-search-name-hidden").val(keywordName);
    $("#input-search-code-hidden").val(keywordCode);
}
