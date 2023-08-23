
$(document).ready(function () {
    searchHospitalTransfer ();

    $(document).on("click", "#search-hospital_transfer", function () {
        appendKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        let keyword = getKeyWordSearch();
        let page = 1;
        getHospitalTransfer(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        getHospitalTransfer(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".save-print", function () {
        let api = API_CREATE;
        let data = $("#add-hospital-transfer-form").serialize();
        hideMessageValidate('#add-hospital-transfer-form');
        createOrUpdate(api, data, nextAddHospitalTransfer);
    });

})

$(document).on("click", ".sorting", function () {
    let sortColumn = $(this).data('column-name');
    let sortType = sort($(this));
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getHospitalTransfer(keyword, page, sortColumn, sortType);
});
function getHospitalTransfer(keyword = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextGetHospitalTransfer);
}
function searchHospitalTransfer() {
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let keyword = getKeyWordSearch();
    let page = $("#hidden-page").val();
    getHospitalTransfer(keyword, page, sortColumn, sortType);
}
function nextGetHospitalTransfer(data) {
    $('#content-list').html(data);
}
function getKeyWordSearch () {
    let keywordSearchMedicalCode = $("#input-search-medical_sessions_id-hidden").val();
    let keywordSearchName = $("#input-search-cadre_name-hidden").val();
    let keywordIdentityCardNumber = $("#input-search-identity_card_number").val();
    let keywordSearchTime = $("#input-search-time-hidden").val();
    return {
        medical_id: keywordSearchMedicalCode,
        name: keywordSearchName,
        identity_card_number: keywordIdentityCardNumber,
        time: keywordSearchTime,
    }
}
function appendKeyWordSearch () {
    let keywordSearchMedicalCode =  $("#input-search-medical_sessions_id").val();
    let keywordSearchName = $("#input-search-cadre_name").val();
    let keywordIdentityCardNumber = $("#input-search-identity_card_number").val();
    let keywordSearchTime = $("#input-search-time").val();
    $("#input-search-medical_sessions_id-hidden").val(keywordSearchMedicalCode);
    $("#input-search-cadre_name-hidden").val(keywordSearchName);
    $("#input-search-identity_card_number").val(keywordIdentityCardNumber);
    $("#input-search-time-hidden").val(keywordSearchTime);
}
function resetFormSearchHospitalTransfer(element) {
    resetForm(element);
    $('#input-search-time').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
}

$.clinicPrint({
    selector: '.open-print-modal',
    options:() => {}
});



