const ACTIVE = 1;
const DEACTIVE = 0;

STATUS = {
    [DEACTIVE]: 'Hủy kích hoạt',
    [ACTIVE]: 'Kích hoạt',
}

$(document).ready(function () {
    getCadres();
    getSelectData("add", 1);
    // DateTimePicker
    $("#cal-medical_insurance_start_date-add, #cal-medical_insurance_start_date-edit, #cad-insurance_five_consecutive_years-add, #cad-insurance_five_consecutive_years-edit").datetimepicker({
        format: "DD/MM/YYYY",
        locale: 'vi',
        language: 'vi',
        useCurrent: false,
    });

    $(document).on("click", "#search-cadres", function () {
        let search = true
        appendKeyWordSearch();
        searchCadres(search);
    });

    $(document).on("click", "#search-cadres-clear", function () {
        $('#input-search-phone-cadres').val('');
        $('#input-search-name-cadres').val('');
        $('#input-search-medical_insurance_number').val('');
        $('#input-search-identity_card_number').val('');
        $('#input-search-phone-cadres-hidden').val('');
        $('#input-search-name-cadres-hidden').val('');
        $('#input-search-medical_insurance_number-hidden').val('');
        $('#input-search-identity_card_number-hidden').val('');
    });

    $(document).on("keyup", "#input-search-cadres", function (e) {
        if (e.keyCode === 13) {
            searchCadres();
        }
    });

    $(document).on("click", ".open-add-modal", function (e) {
        $("#type").val('add');
        resetFormAddCadres('#add-cadres-form');
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let code = $("#input-search-phone-cadres-hidden").val();
        let name = $("#input-search-name-cadres-hidden").val();
        getCadres(code, name, page);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        let type = $("#type").val();
        let medicalInsuranceAddress = $(`#medical_insurance_address-${type}`).val();
        let serializeArrayData = $("#add-cadres-form").serializeArray();
        serializeArrayData.push({ name: "medical_insurance_address", value: medicalInsuranceAddress });
        let data = jQuery.param(serializeArrayData);
        hideMessageValidate('#add-cadres-form');
        createOrUpdate(api, data, nextAddCadres);
    });

    $(document).on("click", ".open-edit-modal", function () {
        $("#type").val("edit");
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        hideMessageValidate('#edit-cadres-form')
        $('.edit').data('id', id);
        getData(api, id, appendDataEdit);
    });
    $(document).on("click", ".open-reset-modal", function () {
        let id = $(this).data('id');
        hideMessageValidate('#reset-cadres-form')
        $('#old_password-reset').val('');
        $('#password-reset').val('');
        $('#confirm_password-reset').val('');
        $('.reset-password').data('id', id);
    });

    $(document).on("click", ".edit", function () {
        let id = $(this).data('id');
        let med_number = $('#medical_insurance_number-edit').val();
        let data = {
            id: id,
            code: $('#code-edit').val(),
            name: $('#name-edit').val(),
            identity_card_number: $('#identity_card_number-edit').val(),
            medical_insurance_number: med_number,
            medical_insurance_symbol_code: $('#medical_insurance_symbol_code-edit').val(),
            medical_insurance_live_code: $('#medical_insurance_live_code-edit').val(),
            medical_insurance_start_date: $('#medical_insurance_start_date-edit').val(),
            medical_insurance_end_date: $('#medical_insurance_end_date-edit').val(),
            medical_insurance_address: $('#medical_insurance_address-edit').val(),
            is_long_date: med_number.length ? ($('#is_long_date-edit').is(":checked") ? 1 : 0) : '',
            insurance_five_consecutive_years: $('#insurance_five_consecutive_years-edit').val(),
            hospital_code: med_number.length ? $('#hospital_code-edit').val() : '',
            birthday: $('#birthday-edit').val(),
            gender: $('#gender-edit').val(),
            folk_id: $('#folk_id-edit').val(),
            city_id: $('#city_id-edit').val(),
            district_id: $('#district_id-edit').val(),
            phone: $('#phone-edit').val(),
            job: $('#job-edit').val(),
            email: $('#email-edit').val(),
            address: $('#address-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-cadres-form');
        createOrUpdate(api, data, nextEditCadres);
    });

    $(document).on("click", ".reset-password", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            old_password: $('#old_password-reset').val(),
            password: $('#password-reset').val(),
            confirm_password: $('#confirm_password-reset').val(),
        };
        var api = API_RESET_PASSWORD;
        hideMessageValidate('#reset-cadres-form');
        createOrUpdate(api, data, nextResetCadres);
    });

    $(document).on("click", ".delete-btn", function () {
        swal({
            title: `Bạn chắc chắn muốn xoá cán bộ ${$(this).data('name')}?`,
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
                    createOrUpdate(api, data, nextDeleteCadres);
                }
            });
    });

    $(document).on("keyup", "#medical_insurance_number-add", function () {
        let medical_insurance_number = $('#medical_insurance_number-add').val().trim();
        if (medical_insurance_number.length > 0) {
            $('#medical_insurance_start_date-add').removeAttr('disabled');
            $('#medical_insurance_end_date-add').removeAttr('disabled');
            $('#is_long_date-add').removeAttr('disabled');
            $('#hospital_code-add').val(DEFAULT_HOSPITAL_CODE).removeAttr('disabled');
            $('#medical_insurance_symbol_code-add').removeAttr('disabled', 'disabled');
            $('#medical_insurance_live_code-add').removeAttr('disabled', 'disabled');
            autoFillHospital('add', DEFAULT_HOSPITAL_CODE);
        } else {
            setDefaultInsurance('add');
        }
    });

    $(document).on("keyup", "#medical_insurance_number-edit", function () {
        let medical_insurance_number = $('#medical_insurance_number-edit').val().trim();
        if (medical_insurance_number.length > 0) {
            $('#medical_insurance_start_date-edit').removeAttr('disabled');
            $('#medical_insurance_end_date-edit').removeAttr('disabled');
            $('#is_long_date-edit').removeAttr('disabled');
            $('#hospital_code-edit').val(DEFAULT_HOSPITAL_CODE).removeAttr('disabled');
            $('#medical_insurance_symbol_code-edit').removeAttr('disabled', 'disabled');
            $('#medical_insurance_live_code-edit').removeAttr('disabled', 'disabled');
            autoFillHospital('edit', DEFAULT_HOSPITAL_CODE);
        } else {
            setDefaultInsurance('edit');
        }
    });

    $(document).on("click", "#is_long_date-add, #is_long_date-edit", function () {
        let type = $("#type").val();
        if ($(this).is(":checked")) {
            $(`#insurance_five_consecutive_years-${type}`).removeAttr('disabled');
        } else {
            $(`#insurance_five_consecutive_years-${type}`).val('').attr('disabled', 'disabled');
        }
    });

    $('#name-add, #name-edit').on('keyup', function() {
        let inputName = $(this).val();
        $(this).val(formatFullName(inputName));
    });
})

$(document).on("click", ".sorting", function () {
    let sortColumn = $(this).data('column-name');
    let sortType = sort($(this));
    let code = $("#input-search-phone-cadres").val();
    let name = $("#input-search-name-cadres").val();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getCadres(code, name, page, sortColumn, sortType);
});


function getCadres(code = "", name = "", page = 1, sortColumn = "", sortType = "", identity_card_number = "", medical_insurance_number = "") {
    let api = API_LIST;
    let dataSearch = {
        phone: code,
        name: name,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType,
        identity_card_number: identity_card_number,
        medical_insurance_number: medical_insurance_number
    };
    getData(api, dataSearch, nextGetCadres);
}
function searchCadres(search) {
    let sortType = '';
    let code = $("#input-search-phone-cadres-hidden").val();
    let name = $("#input-search-name-cadres-hidden").val();
    let identity_card_number = $("#input-search-identity_card_number-hidden").val();
    let medical_insurance_number = $("#input-search-medical_insurance_number-hidden").val();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    if (search) {page = 1;}
    if ($("#ordinal-number-cadres").hasClass("sorting_desc")) {
        sortType = 'desc';
    }
    let sortColumn = $("#ordinal-number-cadres").data('column-name');
    getCadres(code, name, page, sortColumn, sortType, identity_card_number, medical_insurance_number);
}


function nextGetCadres(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-cadres').modal('show');
    let item = data.data;
    item['birthday'] = item['birthday'] ? moment(item['birthday']).format("DD/MM/YYYY") : moment().format("DD/MM/YYYY");
    item['medical_insurance_start_date'] = item['medical_insurance_start_date'] ? moment(item['medical_insurance_start_date']).format("DD/MM/YYYY") : "";
    item['medical_insurance_end_date'] = item['medical_insurance_end_date'] ? moment(item['medical_insurance_end_date']).format("DD/MM/YYYY") : "";
    item['insurance_five_consecutive_years'] = item['insurance_five_consecutive_years'] ? moment(item['insurance_five_consecutive_years']).format("DD/MM/YYYY") : "";
    let type = 'edit';
    let cityId = item['city_id'];
    let districtId = item['district_id'];
    let folkId = item['folk_id'];
    getSelectData('edit', cityId, districtId, folkId);
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key])
        }
    }

    $(`#medical_insurance_live_code-edit option[value=${item['medical_insurance_live_code']}]`).attr('selected','selected');

    if (item['is_long_date'] && item['is_long_date'] == 1) {
        $(`#is_long_date-edit`).prop('checked', true);
        $(`#insurance_five_consecutive_years-edit`).removeAttr('disabled', 'disabled');
    } else {
        $(`#is_long_date-edit`).prop('checked', false);
    }

    if (item['medical_insurance_number'] && item['medical_insurance_number'].length > 0) {
        $('#medical_insurance_start_date-edit').removeAttr('disabled');
        $('#medical_insurance_end_date-edit').removeAttr('disabled');
        $('#is_long_date-edit').removeAttr('disabled');
        $('#hospital_code-edit').removeAttr('disabled');
    } else {
        $('#medical_insurance_start_date-edit').attr('disabled', 'disabled');
        $('#medical_insurance_end_date-edit').attr('disabled', 'disabled');
        $('#is_long_date-edit').attr('disabled', 'disabled');
        $('#hospital_code-edit').attr('disabled', 'disabled');
    }
}


function nextAddCadres(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-cadres').modal('hide');
        $('#add-cadres-form')[0].reset();
        $('#district_id-add').html('');
        hideMessageValidate('#add-cadres-form');
        toastAlert(data.message, "", "success");
        searchCadres();
    }
}

function nextEditCadres(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-cadres').modal('hide');
        hideMessageValidate('#edit-cadres-form');
        $('#district_id-edit').html('');
        toastAlert(data.message, "", "success");
        searchCadres();
    }
}

function nextResetCadres(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('reset', data.errors);
    } else {
        $('#reset-cadres').modal('hide');
        hideMessageValidate('#reset-cadres-form');
        toastAlert(data.message, "", "success");
        searchCadres();
    }
}

function nextDeleteCadres(data) {
    toastAlert(data.message, "", "success");
    searchCadres();
}

$('#city_id-add').on('change', function() {
    getDistrictByCityId('add');
})

$('#city_id-edit').on('change', function() {
    getDistrictByCityId('edit');
})

function getDistrictByCityId(key) {
    $(`#district_id-${key}`).html('');
    let city_id = $(`#city_id-${key}`).val();

    getData(API_LIST_DISTRICT, { city_id: city_id }, function(data) {
        $(`#district_id-${key}`).html(data)
    });
}

function getSelectData(type, city_id, district_id, folk_id) {
    getData(API_LIST_CITY, { city_id: city_id }, function (data) {
        $(`#city_id-${type}`).html(data)
    })
    getData(API_LIST_DISTRICT, { city_id: city_id, district_id: district_id }, function (data) {
        $(`#district_id-${type}`).html(data)
    })
    getData(API_LIST_FOLK, { folk_id: folk_id }, function (data) {
        $(`#folk_id-${type}`).html(data)
    })
}
function appendKeyWordSearch () {
    let keywordPhone = $('#input-search-phone-cadres').val();
    let keywordName = $('#input-search-name-cadres').val();
    let keywordMedicalInsurance = $('#input-search-medical_insurance_number').val();
    let keywordIdentity = $('#input-search-identity_card_number').val();

    $("#input-search-phone-cadres-hidden").val(keywordPhone);
    $("#input-search-name-cadres-hidden").val(keywordName);
    $("#input-search-medical_insurance_number-hidden").val(keywordMedicalInsurance);
    $("#input-search-identity_card_number-hidden").val(keywordIdentity);
}

function resetFormAddCadres(element) {
    resetForm(element);
    setDefaultInsurance('add');
    $(`${element} .input-group.date`).each(function() {
        resetDateTimePicker($(this));
    })
}


$("#hospital_code-add, #hospital_code-edit").keyup(function () {
    let type = $("#type").val();
    let hospital_code =  $(this).val();
    if (hospital_code !== "") {
        autoFillHospital(type, hospital_code);
    }
});

$("#hospital_code-add, #hospital_code-edit").on('input', function () {
    let type = $("#type").val();
    let hospitalCode =  $(this).val();
    if (hospitalCode == null || hospitalCode.trim() === '') {
        $(`#medical_insurance_address-${type}`).val('');
    }
});

$.clinicChangeStatus({
    selector: '.change-status-btn',
    swal_confirm: 'Bạn có chắc chắn muốn $action tài khoản này ?',
    swal_success: '$action tài khoản thành công !',
    options: (response) => {
        if (response) {
            toastAlert(response.success, "", "success");
            getCadres();
        }
    }
})
