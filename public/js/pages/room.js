$(document).ready(function () {
    getRoom();

    $(document).on("click", "#search-room", function () {
        appendKeyWordSearch();
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        let page = 1;
        getRoom(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        getRoom(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        let data = $("#add-room-form").serialize();
        hideMessageValidate('#add-room-form');
        createOrUpdate(api, data, nextAddRoom);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-room-form');
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            code: $('#code-edit').val(),
            name: $('#name-edit').val(),
            location: $('#location-edit').val(),
            department_id: $('#department_id-edit').val(),
            examination_type_id: $('#examination_type_id-edit').val(),
            note: $('#note-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-room-form');
        createOrUpdate(api, data, nextEditRoom);
    });

    $(document).on("click", ".delete-btn", function () {
        let name = $(this).data('name');
        swal({
            title: `Bạn có chắc chắn muốn xóa phòng khám "${name}" ?`,
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
                    createOrUpdate(api, data, nextDeleteRoom);
                }
            });
    });

    $(document).on("click", ".sorting", function () {
        let sortColumn = $(this).data('column-name');
        let sortType = sort($(this));
        let keyword = getKeyWordSearch();
        let page = $("li.page-item.active ").find("a.page-link").data('id');
        getRoom(keyword, page, sortColumn, sortType);
    });
});

function getRoom(keyword = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextGetRoom);
}
function searchRoom() {
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getRoom(keyword, page, sortColumn, sortType);
}

function nextGetRoom(data) {
    $('#room-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-room').modal('show');
    let item = data.data;
    let type = 'edit';
    if (!data.isAdmin) {
        $('#department_id-edit').find('option').remove().end().append(`<option value="${data.departmentOfRoom.id}">${data.departmentOfRoom.name}</option>`);
        if (!data.canEdit) {
            $("#edit-room-form :input").prop("disabled", true);
            $("button.edit").prop("disabled", true);
        } else {
            $("#edit-room-form :input").prop("disabled", false);
            $("button.edit").prop("disabled", false);
        }
    }
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key])
        }
    }
    $("#department_id-edit, #examination_type_id-edit").trigger('change');
}


function nextAddRoom(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-room').modal('hide');
        $('#add-room-form')[0].reset();
        hideMessageValidate('#add-room-form');
        toastAlert(data.message, "", "success");
        searchRoom();
    }
}

function nextEditRoom(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-room').modal('hide');
        hideMessageValidate('#edit-room-form');
        toastAlert(data.message, "", "success");
        searchRoom();
    }
}

function nextDeleteRoom(data) {
    toastAlert(data.message, "", "success");
    searchRoom();
}
function getKeyWordSearch () {
    let keywordSearchCode = $("#input-search-code-hidden").val();
    let keywordSearchName = $("#input-search-name-hidden").val();
    let keywordSearchLocation = $("#input-search-location-hidden").val();
    let keywordSearchDepartment = $("#input-search-department-hidden").val();
    return {
        code: keywordSearchCode,
        name: keywordSearchName,
        location: keywordSearchLocation,
        department_id: keywordSearchDepartment
    }
}

function appendKeyWordSearch () {
    let keywordSearchCode = $("#input-search-code").val();
    let keywordSearchName = $("#input-search-name").val();
    let keywordSearchLocation = $("#input-search-location").val();
    let keywordSearchDepartment = $("#input-search-department").val();
    $("#input-search-code-hidden").val(keywordSearchCode);
    $("#input-search-name-hidden").val(keywordSearchName);
    $("#input-search-location-hidden").val(keywordSearchLocation);
    $("#input-search-department-hidden").val(keywordSearchDepartment);
}
