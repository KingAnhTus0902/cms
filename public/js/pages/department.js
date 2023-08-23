$(document).ready(function () {
    getDepartment();

    $(document).on("click", "#search-department", function () {
        appendKeyWordSearch();
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        let page = 1;
        getDepartment(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        getDepartment(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        let data = $("#add-department-form").serialize();
        hideMessageValidate('#add-department-form');
        createOrUpdate(api, data, nextAddDepartment);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-department-form');
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
            user_head_id: $('#user_head_id-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-department-form');
        createOrUpdate(api, data, nextEditDepartment);
    });

    $(document).on("click", ".delete-btn", function () {
        let name = $(this).data('name');
        swal({
            title: `Bạn có chắc chắn muốn xóa khoa "${name}" ?`,
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
                    createOrUpdate(api, data, nextDeleteDepartment);
                }
            });
    });
})

$(document).on("click", ".sorting", function () {
    let sortColumn = $(this).data('column-name');
    let sortType = sort($(this));
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getDepartment(keyword, page, sortColumn, sortType);
});

function getDepartment(keyword = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextGetDepartment);
}
function searchDepartment() {
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getDepartment(keyword, page, sortColumn, sortType);
}


function nextGetDepartment(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-department').modal('show');
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key])
        }
    }
}


function nextAddDepartment(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-department').modal('hide');
        $('#add-department-form')[0].reset();
        hideMessageValidate('#add-department-form');
        toastAlert(data.message, "", "success");
        searchDepartment();
    }
}

function nextEditDepartment(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-department').modal('hide');
        hideMessageValidate('#edit-department-form');
        toastAlert(data.message, "", "success");
        searchDepartment();
    }
}

function nextDeleteDepartment(data) {
    toastAlert(data.message, "", "success");
    searchDepartment();
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
    let keywordSearchCode = $("#input-search-code").val();
    let keywordSearchName = $("#input-search-name").val();
    $("#input-search-code-hidden").val(keywordSearchCode);
    $("#input-search-name-hidden").val(keywordSearchName);
}

