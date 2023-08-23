$(document).ready(function () {
    //Date picker
    $("#cal-import_day").datetimepicker({
        format: "DD/MM/YYYY",
    });

    getImportMaterialsSlip();

    $(document).on("click", "#search-import_materials_slip", function () {
        appendKeyWordSearch();
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        let page = 1;
        getImportMaterialsSlip(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data("id");
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        getImportMaterialsSlip(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".open-detail-modal", function () {
        let id = $(this).data('id');
        let api = API_DETAIL;
        api = api.replace(":id", id);
        getData(api, id, appendDataDetail);
    });

    $(document).on("click", ".delete-btn", function () {
        let name = $(this).data("name");
        swal({
            title: `Bạn có chắc chắn muốn xóa phiếu nhập kho "${name}" ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["Hủy", "OK"],
        }).then((willDelete) => {
            if (willDelete) {
                let api = API_DELETE;
                let id = $(this).data("id");
                let data = { id: id };
                createOrUpdate(api, data, nextDeleteImportMaterialsSlip);
            }
        });
    });

    $(document).on("click", ".sorting", function () {
        let sortColumn = $(this).data("column-name");
        let sortType = sort($(this));
        let keyword = getKeyWordSearch();
        let page = $("li.page-item.active ").find("a.page-link").data("id");
        getImportMaterialsSlip(keyword, page, sortColumn, sortType);
    });
    $(".select2").select2();

    // Import
    $(document).on("click", "#btn-check-import", function () {
        $("#is-preview").val(1);
        $("#import-material-slip-form").submit();
    });

    $(document).on("click", ".btn-import", function () {
        let saveStatus =
            $(this).attr("id") === "btn-draft-save"
                ? STATUS_DRAFT_SAVE
                : STATUS_REAL_SAVE;
        $("#status").val(saveStatus);
        $("#is-preview").val(0);
        $("#import-material-slip-form").submit();
    });

    $(document).on("submit", "#import-material-slip-form", function (e) {
        e.preventDefault();
        if ($("#is-preview").val() == 1) {
            let api = API_VALID_IMPORT;
            let data = new FormData(this);
            hideMessageValidate("#import-material-slip-form");
            createOrUpdateWithFile(api, data, nextImportMaterialsSlipBefore);
        } else {
            let api = API_IMPORT;
            let data = new FormData(this);
            hideMessageValidate("#import-material-slip-form");
            createOrUpdateWithFile(api, data, nextImportMaterialsSlip);
        }
    });

    $(document).on("hide.bs.modal", "#import-material-slip", function () {
        $("#import-material-slip-form")[0].reset();
        hideMessageValidate("#import-material-slip-form");
        $("#valid-error").html("");
        $("#import-data-content").html("");
        $("#btn-check-import").removeClass("d-none");
        $(".btn-import").addClass("d-none");
    });

    $(document).on("change", "#file", function () {
        hideMessageValidate("#import-material-slip-form");
        $("#valid-error").html("");
        $("#import-data-content").html("");
        $("#btn-check-import").removeClass("d-none");
        $(".btn-import").addClass("d-none");
    });
});

function nextImportMaterialsSlip(response) {
    $("#import-material-slip").modal("hide");
    toastAlert(response.message, "", "success");
    searchImportMaterialsSlip();
}

function nextImportMaterialsSlipBefore(response) {
    if (response.code === HTTP_BAD_REQUEST) {
        showMessageValidate("import", response.errors);
    } else if (response.errors && Object.keys(response.errors).length > 0) {
        showImportMessageValidate(response.errors);
    } else {
        hideMessageValidate("#import-material-slip-form");
        $("#valid-error").html("");
        $("#import-data-content").html(response);
        $("#btn-check-import").addClass("d-none");
        $(".btn-import").removeClass("d-none");
    }
}

function showImportMessageValidate(errors) {
    let errorHtml = `<hr><div class="text-danger text-center text-bold">
        Dữ liệu import lỗi</div><div class="text-danger row">`;
    let index = 0;
    for (let row in errors) {
        if (index == 20) {
            break;
        }
        errorHtml += `
            <div class="col-md-4">
                <b>- Hàng ${row}:</b> <br> ${errors[row].join("<br>")}
            </div>
        `;
        index++;
    }
    errorHtml += `</div>`;
    errorHtml +=
        Object.keys(errors).length > 20
            ? `<div class="text-danger text-bold">Vẫn còn lỗi. Vui lòng kiểm tra lại dữ liệu trong file.</div>`
            : "";

    $("#valid-error").html(errorHtml);
}

function getImportMaterialsSlip(keyword = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextGetImportMaterialsSlip);
}
function searchImportMaterialsSlip() {
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getImportMaterialsSlip(keyword, page, sortColumn, sortType);
}

function nextGetImportMaterialsSlip(data) {
    $('#import-materials-slip-list').html(data);
}

function appendDataDetail(data) {
    $('#content-detail-material-slip').html(data);
}

function nextDeleteImportMaterialsSlip(data) {
    if (data.code === HTTP_SUCCESS) {
        toastAlert(data.message, "", "success");
        searchImportMaterialsSlip();
    } else {
        toastAlert(data.message, "", "error");
    }
}
function getKeyWordSearch() {
    let keywordSearchImportDay = $("#input-search-import_day-hidden").val();
    let keywordSearchStatus = $("#input-search-status-hidden").val();
    let keywordSearchUserName = $("#input-search-user_name-hidden").val();
    return {
        import_day: keywordSearchImportDay,
        status: keywordSearchStatus,
        user_name: keywordSearchUserName,
    };
}

function appendKeyWordSearch() {
    let keywordSearchImportDay = $("#input-search-import_day").val();
    let keywordSearchStatus = $("#input-search-status").val();
    let keywordSearchUserName = $("#input-search-user_name").val();
    $("#input-search-import_day-hidden").val(keywordSearchImportDay);
    $("#input-search-status-hidden").val(keywordSearchStatus);
    $("#input-search-user_name-hidden").val(keywordSearchUserName);
}

function resetFormImportMaterialsSlip(element) {
    resetForm(element);
    $("#input-search-status").val("").trigger("change");
}
