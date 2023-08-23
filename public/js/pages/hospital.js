
$(document).ready(function () {
    getHospital();

    $(document).on("click", "#search-hospital", function () {
        appendKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        let keyword = getKeyWordSearch();
        let page = 1;
        getHospital(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        getHospital(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        let data = $("#add-hospital-form").serialize();
        hideMessageValidate('#add-hospital-form');
        createOrUpdate(api, data, nextAddHospital);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-hospital-form');
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            name: $('#name-edit').val(),
            code: $('#code-edit').val(),
            city_id: $('#city_id-edit').val(),
            address: $('#address-edit').val(),
            phone: $('#phone-edit').val(),
            fax: $('#fax-edit').val(),
            email: $('#email-edit').val(),
            note: $('#note-edit').val(),
            organization_id: $('#organization_id-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-hospital-form');
        createOrUpdate(api, data, nextEditHospital);
    });

    $(document).on("click", ".delete-btn", function () {
            let name = $(this).data('name');
        swal({
            title: `Bạn có chắc chắn muốn xóa bệnh viện này ?`,
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
                    createOrUpdate(api, data, nextDeleteHospital);
                }
            });
    });
})

$(document).on("click", ".sorting", function () {
    let sortColumn = $(this).data('column-name');
    let sortType = sort($(this));
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getHospital(keyword, page, sortColumn, sortType);
});

function getHospital(keyword = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextGetHospital);
}

function searchHospital() {
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getHospital(keyword, page, sortColumn, sortType);
}


function nextGetHospital(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-hospital').modal('show');
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key])
        }
    }
}


function nextAddHospital(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-hospital').modal('hide');
        $('#add-hospital-form')[0].reset();
        hideMessageValidate('#add-hospital-form');
        toastAlert(data.message, "", "success");
        searchHospital();
    }
}

function nextEditHospital(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-hospital').modal('hide');
        hideMessageValidate('#edit-hospital-form');
        toastAlert(data.message, "", "success");
        searchHospital();
    }
}

function nextDeleteHospital(data) {
    toastAlert(data.message, "", "success");
    searchHospital();
}

function getKeyWordSearch () {
    let keywordSearchCity = $("#input-search-city_id-hidden").val();
    let keywordSearchName = $("#input-search-name-hidden").val();
    return {
        city_id: keywordSearchCity,
        name: keywordSearchName,
    }
}
function appendKeyWordSearch () {
    let keywordSearchCity =  $("#input-search-city_id").val();
    let keywordSearchName = $("#input-search-name").val();
    $("#input-search-name-hidden").val(keywordSearchName);
    $("#input-search-city_id-hidden").val(keywordSearchCity);
}

