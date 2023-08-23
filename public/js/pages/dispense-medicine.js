$(document).ready(function () {
    //Date picker
    $('#cadre-add-birthday, #cadre-edit-birthday, #cadre-add-medical_insurance_start_date, #cadre-add-medical_insurance_end_date, #cadre-edit-medical_insurance_start_date, #cadre-edit-medical_insurance_end_date').datetimepicker({
        format: 'DD/MM/YYYY',
    });
    $('#input-search-time-hidden').val($('#input-search-time').val());
    searchMedicalSession();

    $(document).on("click", "#search-medical-session", function () {
        appendKeyWordSearch();
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        let page = 1;
        getMedicalSession(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        getMedicalSession(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".update", function () {
        let action = $(this).data('action');
        let prescription_id = $('#prescription_id').val();
        let api = API_UPDATE_PRESCRIPTION;
        let data =  {
            action: action,
            id: prescription_id
        }
        createOrUpdate(api, data, nextEditMedicalSession);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        $("#type").val("edit");
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit-cadres", function () {
        let data = $("#edit-cadres-form").serialize();
        let api = API_UPDATE_CADRES;
        hideMessageValidate('#edit-cadres-form');
        createOrUpdate(api, data, nextEditMedicalSession);
    });

    $(document).on("click", ".sorting", function () {
        let sortColumn = $(this).data('column-name');
        let sortType = sort($(this));
        let keyword = getKeyWordSearch();
        let page = $("li.page-item.active ").find("a.page-link").data('id');
        getMedicalSession(keyword, page, sortColumn, sortType);
    });
});
function getMedicalSession(keyword = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextgetMedicalSession);
}
function searchMedicalSession() {
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getMedicalSession(keyword, page, sortColumn, sortType);
}

function nextgetMedicalSession(data) {
    $('#medical-session-list').html(data);
}

function appendDataEdit(data) {
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key])
        }
    }
}


function nextEditMedicalSession(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-prescription-medicine').modal('hide');
        toastAlert(data.message, "", "success");
        searchMedicalSession();
    }
}

function getKeyWordSearch () {
    let keywordSearchTime = $("#input-search-time-hidden").val();
    let keywordSearchDepartment = $("#input-search-department-hidden").val();
    let keywordSearchRoom = $("#input-search-room-hidden").val();
    let keywordSearchStatus = $("#input-search-status-hidden").val();
    let keywordSearchMultiple = $("#input-search-multiple-hidden").val();
    return {
        time: keywordSearchTime,
        department_id: keywordSearchDepartment,
        room_id: keywordSearchRoom,
        status: keywordSearchStatus,
        multiple: keywordSearchMultiple
    }
}

function appendKeyWordSearch () {
    let keywordSearchTime = $("#input-search-time").val();
    let keywordSearchDepartment = $("#input-search-department").val();
    let keywordSearchRoom = $("#input-search-room").val();
    let keywordSearchStatus = $("#input-search-status").val();
    let keywordSearchMultiple = $("#input-search-multiple").val();
    $("#input-search-time-hidden").val(keywordSearchTime);
    $("#input-search-department-hidden").val(keywordSearchDepartment);
    $("#input-search-room-hidden").val(keywordSearchRoom);
    $("#input-search-status-hidden").val(keywordSearchStatus);
    $("#input-search-multiple-hidden").val(keywordSearchMultiple);
}

function appendDataEdit(data) {
    $('#detail-prescription').html(data);
}

function resetFormMedicalSession(element) {
    resetForm(element);
    $("#input-search-status").val(1).trigger('change');
    $("#input-search-room").val('').trigger('change');
    $('#input-search-time').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
}
