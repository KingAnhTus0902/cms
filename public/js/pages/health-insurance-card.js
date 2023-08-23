$(document).ready(function () {
    getHealthInsuranceCard();

    $(document).on("click", "#search-health-insurance-card", function () {
        appendKeyWordSearch();
        let keyword = $("#input-search-hidden").val();
        let page = 1;
        let code = $("#select-health-insurance-card-type-hidden").val();
        getHealthInsuranceCard(keyword, page, code);
    });

    $(document).on("keyup", "#input-search-health-insurance-card", function (e) {
        let keyword = $("#input-search-hidden").val();
        let page = $("li.page-item.active ").find("a.page-link").data('id');
        if (e.keyCode === 13) {
            getHealthInsuranceCard(keyword, page);
        }
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = $("#input-search-hidden").val();
        let code = $("#select-health-insurance-card-type-hidden").val();
        getHealthInsuranceCard(keyword, page, code);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        let data = $("#add-health-insurance-card-form").serialize();
        hideMessageValidate('#add-health-insurance-card-form');
        createOrUpdate(api, data, nextAddHealthInsuranceCard);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-health-insurance-card-form');
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            discount_right_line: $('#discount_right_line-edit').val(),
            discount_opposite_line: $('#discount_opposite_line-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-health-insurance-card-form');
        createOrUpdate(api, data, nextEditHealthInsuranceCard);
    });

    $(document).on("click", ".delete-btn", function () {
        swal({
            title: `Bạn có chắc chắn muốn xóa đầu thẻ BHYT này ?`,
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
                    createOrUpdate(api, data, nextDeleteHealthInsuranceCard);
                }
            });
    });

    $(document).on('click', ".open-add-modal", function () {
        resetHealthInsuranceCardElement('#add-health-insurance-card');
    });

})

function getHealthInsuranceCard(keyword = "", page = 1, code) {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        code: code
    };
    getData(api, dataSearch, nextGetHealthInsuranceCard);
}

function searchHealthInsuranceCard() {
    let keyword = $("#input-search-hidden").val();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    let code = $("#select-health-insurance-card-type-hidden").val();
    getHealthInsuranceCard(keyword, page, code);
}


function nextGetHealthInsuranceCard(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    let item = data.data;
    let type = 'edit';
    let labelCode = 'Mã ký hiệu: ';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            if ($(`#${key}-${type}`).is('label')) {
                let code = labelCode + item[key];
                $(`#${key}-${type}`).text(code);
            }
            else {
                $(`#${key}-${type}`).val(item[key]);
            }
        }
    }
}


function nextAddHealthInsuranceCard(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-health-insurance-card').modal('hide');
        $('#add-health-insurance-card-form')[0].reset();
        hideMessageValidate('#add-health-insurance-card-form');
        toastAlert(data.message, "", "success");
        searchHealthInsuranceCard();
    }
}

function nextEditHealthInsuranceCard(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-health-insurance-card').modal('hide');
        hideMessageValidate('#edit-health-insurance-card-form');
        toastAlert(data.message, "", "success");
        searchHealthInsuranceCard();
    }
}

function nextDeleteHealthInsuranceCard(data) {
    toastAlert(data.message, "", "success");
    searchHealthInsuranceCard();
}

function resetHealthInsuranceCardElement(form = '')
{
    $("#select-health-insurance-card").val('').trigger('change');
    resetForm(form);
}

function resetHealthInsuranceCardFormSearch(form = '')
{
    $("#select-health-insurance-card").val('').trigger('change');
    resetForm(form);
}

$('.number-validate').keypress(function(event) {
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

function appendKeyWordSearch () {
    let keywordSearch = $("#input-search-health-insurance-card").val();
    let selectHealthInsuranceCardValue = $("#select-health-insurance-card").val();
    $("#input-search-hidden").val(keywordSearch);
    $("#select-health-insurance-card-type-hidden").val(selectHealthInsuranceCardValue);
}
