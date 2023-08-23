$(document).ready(function () {
    getUnit();

    $(document).on("click", "#search-unit", function () {
        appendKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        let keyword = getKeyWordSearch();
        let page = 1;
        getUnit(keyword, page, sortColumn, sortType);
    });

    $(document).on("keyup", "#input-search-unit", function (e) {
        let keyword = $("#input-search-unit").val();
        let page = $("li.page-item.active ").find("a.page-link").data('id');
        if (e.keyCode === 13) {
            getUnit(keyword, page);
        }
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        getUnit(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        let data = $("#add-unit-form").serialize();
        hideMessageValidate('#add-unit-form');
        createOrUpdate(api, data, nextAddUnit);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-unit-form');
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            code: $('#code-edit').val(),
            name: $('#name-edit').val(),
            location: $('#location-edit').val(),
            note: $('#note-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-unit-form');
        createOrUpdate(api, data, nextEditUnit);
    });

    $(document).on("click", ".delete-btn", function () {
        swal({
            title: `Bạn có chắc chắn muốn xóa đơn vị này ?`,
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
                    createOrUpdate(api, data, nextDeleteUnit);
                }
            });
    });
})


function getUnit(keyword = "", page = 1) {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page
    };
    getData(api, dataSearch, nextGetUnit);
}

function searchUnit() {
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getUnit(keyword, page, sortColumn, sortType);
}



function nextGetUnit(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-unit').modal('show');
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key])
        }
    }
}


function nextAddUnit(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-unit').modal('hide');
        $('#add-unit-form')[0].reset();
        hideMessageValidate('#add-unit-form');
        toastAlert(data.message, "", "success");
        searchUnit();
    }
}

function nextEditUnit(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-unit').modal('hide');
        hideMessageValidate('#edit-unit-form');
        toastAlert(data.message, "", "success");
        searchUnit();
    }
}

function nextDeleteUnit(data) {
    toastAlert(data.message, "", "success");
    searchUnit();
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
    let keyword = $("#input-search-code").val();
    let keywordName = $("#input-search-name").val();
    $("#input-search-code-hidden").val(keyword);
    $("#input-search-name-hidden").val(keywordName);
}


