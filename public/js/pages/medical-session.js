$(document).ready(function () {

    loadPageMedicalSession();

    if (MESSAGE_ERROR) {
        toastAlert(MESSAGE_ERROR, "", "error");
    }

    // DateTimePicker
    $("#cal-medical_insurance_start_date-add, #cal-medical_insurance_start_date-edit, #cadre_insurance_five_consecutive_years-add, #cadre_insurance_five_consecutive_years-edit").datetimepicker({
        format: "DD/MM/YYYY",
        locale: 'vi',
        language: 'vi',
        useCurrent: false,
    });

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

    $(document).on("click", ".add-medical-card", function () {
        let api = API_CREATE_MEDICAL_SESSION;
        let data = $("#add-medical-session-form").serialize();
        hideMessageValidate('#add-medical-session-form');
        createOrUpdate(api, data, nextAddMedicalSession);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        $("#type").val("edit");
        $('#cadre-list-suggest-edit').css('width', '100%');
        $(`#cadre-list-suggest-edit`).hide();
        let api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-medical-session-form');
        hideMessageValidate('#edit-cadres-form');
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit-cadres", function () {
        let api = API_UPDATE_CADRES;
        let type = $("#type").val();
        let medicalInsuranceAddress = $(`#medical_insurance_address-${type}`).val();
        let medicalSessionId = $(`#id_medical_session_hidden-${type}`).val();
        let serializeArrayData = $("#edit-cadres-form").serializeArray();
        serializeArrayData.push({ name: "medical_insurance_address", value: medicalInsuranceAddress });
        serializeArrayData.push({ name: "medical_session_id", value: medicalSessionId });
        let data = jQuery.param(serializeArrayData);
        hideMessageValidate('#edit-cadres-form');
        createOrUpdate(api, data, nextEditMedicalSession);
    });

    $(document).on("click", ".edit-medical-card", function () {
        let data = $("#edit-medical-session-form").serialize();
        let api = API_UPDATE_MEDICAL_SESSION;
        hideMessageValidate('#edit-cadres-form');
        createOrUpdate(api, data, nextEditMedicalSession);
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
                    createOrUpdate(api, data, nextDeleteMedicalSession);
                }
            });
    });

    $(document).on("click", ".sorting", function () {
        let sortColumn = $(this).data('column-name');
        let sortType = sort($(this));
        let keyword = getKeyWordSearch();
        let page = $("li.page-item.active ").find("a.page-link").data('id');
        getMedicalSession(keyword, page, sortColumn, sortType);
    });

    $(document).on("keyup", "#medical_insurance_number-add", function () {
        let medical_insurance_number = $('#medical_insurance_number-add').val().trim();
        if (medical_insurance_number.length > 0) {
            $('#medical_insurance_start_date-add').removeAttr('disabled');
            $('#medical_insurance_end_date-add').removeAttr('disabled');
            $('#is_long_date-add').removeAttr('disabled');
            $('#hospital_code-add').val(DEFAULT_HOSPITAL_CODE).removeAttr('disabled');;
            $('#medical_insurance_symbol_code-add').removeAttr('disabled', 'disabled');
            $('#medical_insurance_live_code-add').removeAttr('disabled', 'disabled');
            autoFillHospital('add', DEFAULT_HOSPITAL_CODE);
        } else {
            setDefaultInsurance('add');
        }
    });

    $('#medical_insurance_number-add, #medical_insurance_number-edit').on('input', function() {
        let medical_insurance_number = $(this).val().trim();
        if (medical_insurance_number.length > 15) {
            $(this).val(medical_insurance_number.slice(0, 15));
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

    $("#city_id-add, #city_id-edit").on('change', function() {
        let type = $("#type").val();
        getDistrictByCityId(type);
    })

    $("#department_id-add, #department_id-edit").on('change', function() {
        let type = $("#type").val();
        getRoomByDepartment(type);
    })

    $(document).on("click", ".add-cadres", function () {
        let api = API_CREATE_CADRES;
        let type = $("#type").val();
        let medicalInsuranceAddress = $(`#medical_insurance_address-${type}`).val();
        let serializeArrayData = $("#add-cadres-form").serializeArray();
        serializeArrayData.push({ name: "medical_insurance_address", value: medicalInsuranceAddress });
        let data = jQuery.param(serializeArrayData);
        hideMessageValidate('#add-cadres-form');
        createOrUpdate(api, data, nextAddCadres);
    });

    $("#name-add, #name-edit").on("input", function() {
        let query = $(this).val();
        let formattedName = formatFullName(query);
        $(this).val(formattedName);
        query = formattedName;
        let type = $("#type").val();
        if(query !== "") {
            $.ajax({
                url: API_SUGGEST_CADRES,
                type: 'GET',
                data: {
                    query: query
                },
                beforeSend: () => {
                    $('.loading').hide()
                },
                success: function (response) {
                    if (response.length > 0) {
                        const html = response.map(v => (
                            `<div class="suggestion-option" data-id="${v.id}">
                                <span class="suggestion-item">
                                    Họ tên: ${v.name}</br>
                                    Năm sinh: ${v.birthday ?? ""}
                                </span>
                            </div>
                            `
                        )).join('');
                        $(`#cadre-list-suggest-${type}`).fadeIn().html(html);
                    } else {
                        $(`#cadre-list-suggest-${type}`).hide();
                    }
                }
            });
        } else {
            $(`#cadre-list-suggest-${type}`).hide();
        }
    });

    $("#name-add, #name-edit").keydown(function(e) {
        if (e.key === "Tab") {
            let type = $("#type").val();
            $(`#cadre-list-suggest-${type}`).hide();
        }
    });


    $('#cadre-list-suggest-add, #cadre-list-suggest-edit').on('click', '.suggestion-option', function() {
        let type = $('#type').val();
        let id = $(this).data('id');
        $(`#cadre-id-${type}`).val(id);
        let api = API_DETAIL_CADRES;
        api = api.replace(":id", id);
        getData(api, id, appendDataSuggest);
    })

    $(document).on("click", ".open-add-medical-session-modal", function (e) {
        $("#type").val('add');
        $('#cadre-list-suggest-add').css('width', '100%');
        resetFormAddCadres('#add-cadres-form');
        resetFormAddMedicalSession('#add-medical-session-form');
        hideMessageValidate($(this).data('target'))
    });

    $(document).mouseup(function(e) {
        let type = $("#type").val();
        let container = $(`#cadre-list-suggest-${type}`);
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
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
});


function loadPageMedicalSession () {
    let keyword = getKeyWordSearch();
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let page = $("#hidden-page").val();
    getMedicalSession(keyword, page, sortColumn, sortType);
}

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

function nextAddMedicalSession(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-medical-session').modal('hide');
        $('#add-medical-session-form')[0].reset();
        hideMessageValidate('#add-medical-session-form');
        toastAlert(data.message, "", "success");
        searchMedicalSession();
    }
}

function nextEditMedicalSession(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        toastAlert(data.message, "", "success");
        $('button.edit-medical-card').removeAttr('disabled');
        $('#cadre-id').val(data.id);
        searchMedicalSession();
    }
}

function nextDeleteMedicalSession(data) {
    toastAlert(data.message, "", "success");
    searchMedicalSession();
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

function resetFormSearchMedicalSession(element) {
    resetForm(element);
    $("#input-search-status").val('').trigger('change');
    $("#input-search-room").val('').trigger('change');
    $('#input-search-time').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
}

function resetFormAddMedicalSession(form = '') {
    $('#reason_for_examination-add').val("");
    $("#room_id-add").val('').trigger('change');
}

function nextAddCadres(data) {
    if (data.code === HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        toastAlert(data.message, "", "success");
        $('button.add-medical-card').removeAttr('disabled');
        $('#cadre-id-add').val(data.id);
    }
}

function getDistrictByCityId(key) {
    let city_id = $(`#city_id-${key}`).val();
    if (city_id) {
        getData(API_LIST_DISTRICT, { city_id: city_id }, function(data) {
            $(`#district_id-${key}`).html(data);
        });
    }
}

function getRoomByDepartment(key) {
    $(`#room_id-${key}`).html('');
    let department_id = $(`#department_id-${key}`).val();

    getData(API_LIST_ROOM_BY_DEPARTMENT, { department_id: department_id }, function(data) {
        $(`#room_id-${key}`).html(data);
    });
}

function resetFormAddCadres(element) {
    resetForm(element);
    $("#folk_id-add").val('1').trigger('change');
    $("#medical_insurance_live_code-add").val('').trigger('change');
    $("#city_id-add").val('').trigger('change');
    $("#district_id-add").val('').trigger('change');
    $('#medical_insurance_symbol_code-add').prop('disabled', true);
    $('#medical_insurance_live_code-add').prop('disabled', true);
    $('#hospital_code-add').prop('disabled', true);
    $('#medical_insurance_start_date-add').prop('disabled', true);
    $('#medical_insurance_end_date-add').prop('disabled', true);
    $('#is_long_date-add').prop('disabled', true);
    $('#cadre-id-add').val('');
    $('#cadre_id_check-add').val('');
    $(`${element} .input-group.date`).each(function() {
        resetDateTimePicker($(this));
    })
}

function appendDataSuggest(data) {
    let item = data.data;
    item['birthday'] = item['birthday'] ? moment(item['birthday']).format("DD/MM/YYYY") : moment().format("DD/MM/YYYY");
    item['medical_insurance_start_date'] = item['medical_insurance_start_date'] ? moment(item['medical_insurance_start_date']).format("DD/MM/YYYY") : "";
    item['medical_insurance_end_date'] = item['medical_insurance_end_date'] ? moment(item['medical_insurance_end_date']).format("DD/MM/YYYY") : "";
    item['insurance_five_consecutive_years'] = item['insurance_five_consecutive_years'] ? moment(item['insurance_five_consecutive_years']).format("DD/MM/YYYY") : "";
    let type = $("#type").val();
    $(`#cadre_id_check-${type}`).val(item.id);
    hideMessageValidate(`#${type}-cadres-form`);
    $(`button.${type}-medical-card`).removeAttr('disabled');
    $(`#cadre-list-suggest-${type}`).hide();
    getSelectDataCiTyDistrictFolk(type, item['city_id'], item['district_id'], item['folk_id']);
    for (let key in item) {
        if (key != 'city_id' && key != 'district_id' && key != 'folk_id') {
            if (item.hasOwnProperty(key)) {
                if (key == 'is_long_date') {
                    if (item[key] == 1) {
                        $(`#${key}-${type}`).prop('checked', true);
                        $(`#insurance_five_consecutive_years-${type}`).removeAttr('disabled');
                    } else {
                        $(`#${key}-${type}`).prop('checked', false);
                    }
                } else {
                    $(`#${key}-${type}`).val(item[key])
                }
            }
        }
    }

    $(`#medical_insurance_live_code-${type} option[value=${item['medical_insurance_live_code']}]`).attr('selected','selected');


    if (item['medical_insurance_number'] && item['medical_insurance_number'].length > 0) {
        $(`#medical_insurance_start_date-${type}`).removeAttr('disabled');
        $(`#medical_insurance_end_date-${type}`).removeAttr('disabled');
        $('#medical_insurance_symbol_code-add').removeAttr('disabled');
        $('#medical_insurance_live_code-add').removeAttr('disabled');
        $(`#is_long_date-${type}`).removeAttr('disabled');
        $(`#hospital_code-${type}`).removeAttr('disabled');
    } else {
        $(`#medical_insurance_start_date-${type}`).attr('disabled', 'disabled');
        $(`#medical_insurance_end_date-${type}`).attr('disabled', 'disabled');
        $('#medical_insurance_symbol_code-add').attr('disabled', 'disabled');
        $('#medical_insurance_live_code-add').attr('disabled', 'disabled');
        $(`#is_long_date-${type}`).attr('disabled', 'disabled');
        $(`#hospital_code-${type}`).attr('disabled', 'disabled');
    }
}

function appendDataEdit(data) {
    let item = data.data;
    item['insurance_five_consecutive_years'] = item['insurance_five_consecutive_years'] ? moment(item['insurance_five_consecutive_years']).format("DD/MM/YYYY") : "";
    item['birthday'] = item['birthday'] ? moment(item['birthday']).format("DD/MM/YYYY") : moment().format("DD/MM/YYYY");
    item['medical_insurance_start_date'] = item['medical_insurance_start_date'] ? moment(item['medical_insurance_start_date']).format("DD/MM/YYYY") : "";
    item['medical_insurance_end_date'] = item['medical_insurance_end_date'] ? moment(item['medical_insurance_end_date']).format("DD/MM/YYYY") : "";
    let type = 'edit';
    getSelectDataCiTyDistrictFolk(type, item['city_id'], item['district_id'], item['folk_id']);
    for (let key in item) {
        if (key != 'city_id' && key != 'district_id' && key != 'folk_id' && key != 'is_long_date') {
            if (item.hasOwnProperty(key)) {
                $(`#${key}-${type}`).val(item[key])
            }
        }
    }

    $(`#room_id-${type}`).trigger('change');
    $(`#medical_insurance_live_code-${type} option[value=${item['medical_insurance_live_code']}]`).attr('selected','selected');

    if (item['is_long_date'] == '1') {
        $(`#is_long_date-edit`).prop('checked', true);
        $('#insurance_five_consecutive_years-edit').removeAttr('disabled');
    } else {
        $(`#is_long_date-edit`).prop('checked', false);
    }

    if (item['medical_insurance_number'] && item['medical_insurance_number'].length > 0) {
        $(`#medical_insurance_start_date-${type}`).removeAttr('disabled');
        $(`#medical_insurance_end_date-${type}`).removeAttr('disabled');
        $(`#medical_insurance_symbol_code-${type}`).removeAttr('disabled');
        $(`#medical_insurance_live_code-${type}`).removeAttr('disabled');
        $(`#is_long_date-${type}`).removeAttr('disabled');
        $(`#hospital_code-${type}`).removeAttr('disabled');
    } else {
        $(`#medical_insurance_start_date-${type}`).attr('disabled', 'disabled');
        $(`#medical_insurance_end_date-${type}`).attr('disabled', 'disabled');
        $(`#medical_insurance_symbol_code-${type}`).attr('disabled', 'disabled');
        $(`#medical_insurance_live_code-${type}`).attr('disabled', 'disabled');
        $(`#is_long_date-${type}`).attr('disabled', 'disabled');
        $(`#hospital_code-${type}`).attr('disabled', 'disabled');
    }
}

function getSelectDataCiTyDistrictFolk(type, city_id, district_id, folk_id, department_id, room_id) {
    getData(API_LIST_CITY, { city_id: city_id }, function (data) {
        $(`#city_id-${type}`).html(data)
    })
    if (city_id) {
        getData(API_LIST_DISTRICT, { city_id: city_id, district_id: district_id }, function (data) {
            $(`#district_id-${type}`).html(data)
        })
    }
    getData(API_LIST_FOLK, { folk_id: folk_id }, function (data) {
        $(`#folk_id-${type}`).html(data)
    })
}

$("#hospital_code-add, #hospital_code-edit").keyup(function () {
    let type = $("#type").val();
    let hospital_code =  $(this).val();
    if (!hospital_code.trim()) {
        $(`#medical_insurance_address-${type}`).val('');
    } else {
        autoFillHospital(type, hospital_code);
    }
});
