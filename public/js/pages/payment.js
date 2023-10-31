let CONTENT = '#content-list';
let PAYMENT_FORM = "#save-payment-status";

$.clinicGet({
    url: API_LIST,
    data: {
        data: {
            keyword: {
                time: $('#input-search-time-hidden').val(),
                payment_status: $('#input-search-status-hidden').val(),
                multiple: $('#input-search-multiple-hidden').val(),
            },
            page: sessionStorage.getItem('page') ?? 1
        }
    },
    options: (response) => $(CONTENT).html(response.html)
});

$.clinicEdit({
    selector: '.open-edit-modal',
    options: (response) => appendDataEdit(response)
});

$.clinicPaginate({
    selector: '.page-link',
    options: (data) => getListData(data)
})

$.clinicSearch({
    selector: '#search',
    options: () => getListData()
})

$.clinicKeyup({
    selector: '#input-search',
    options: () => getListData()
})

$.clinicOnReady({
    options: () => {}
});

$.clinicEdit({
    selector: '#open-edit-modal-cadre',
    options: (response) => appendDataEditCadre(response)
});

function getListData(page) {
    $.clinicGet({
        url: API_LIST,
        data: {
            data: {
                keyword: {
                    multiple: $('#input-search-multiple').val() ?? '',
                    payment_status: $('#input-search-payment-status').val() ?? '',
                    time: $('#input-search-time').val() ?? '',
                },
                page: page ?? $('li.paginate_button.page-item.active').attr('id')
            }
        },
        options: (response) => $(CONTENT).html(response.html)
    });
}

$(document).ready(function () {
    $('#input-search-time').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });

    // DateTimePicker
    $("#cal-medical_insurance_start_date-edit").datetimepicker({
        format: "DD/MM/YYYY",
        locale: 'vi',
        language: 'vi',
        useCurrent: false,
    });

    $(document).on("click", "#is_long_date-edit", function () {
        if ($(this).is(":checked")) {
            $(`#insurance_five_consecutive_years-edit`).removeAttr('disabled');
        } else {
            $(`#insurance_five_consecutive_years-edit`).val('').attr('disabled', 'disabled');
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

    $("#hospital_code-edit").keyup(function () {
        let hospital_code =  $(this).val();
        if (!hospital_code.trim()) {
            $(`#medical_insurance_address-edit`).val('');
        } else {
            autoFillHospital('edit', hospital_code);
        }
    });

    $("#city_id-edit").on('change', function() {
        let city_id = $(`#city_id-edit`).val();
        if (city_id) {
            getData(API_LIST_DISTRICT, { city_id: city_id }, function(data) {
                $(`#district_id-edit`).html(data);
            });
        }
    })

    $("#name-edit").keyup(function () {
        let query = $(this).val();
        let formattedName = formatFullName(query);
        $(this).val(formattedName);
    })

    $(document).on("click", ".edit-cadres", function () {
        let api = API_UPDATE_CADRES;
        let medicalInsuranceAddress = $(`#medical_insurance_address-edit`).val();
        let medicalSessionId = $(`#id_medical_session_hidden-edit`).val();
        let serializeArrayData = $("#edit-cadres-form").serializeArray();
        serializeArrayData.push({ name: "medical_insurance_address", value: medicalInsuranceAddress });
        serializeArrayData.push({ name: "medical_session_id", value: medicalSessionId });
        let data = jQuery.param(serializeArrayData);
        hideMessageValidate('#edit-cadres-form');
        createOrUpdate(api, data, nextEditCadre);
    });

    $(document).on("click", "#cadre_is_long_date", function () {
        var routes = $(this).attr('routes');
        data = $(PAYMENT_FORM).serializeArray();
        data.push({name:'not_change_payment_status',value:true});
        $.ajax({
            url: routes,
            type: 'PUT',
            data: data,
            beforeSend: () => {
                $('.loading').hide()
            },
            success: function (response) {
                toastAlert('Cập nhật thành công', '', 'success');
                $(CONTENT).html(response.html);
            }
        });
    });
})

function resetFilter(element) {
    resetForm(element);
    $('#input-search-time').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
}

function getPrintData(response) {
    const frameName = 'printIframe';
    let doc = window.frames[frameName];
    if (!doc) {
        $('<iframe>').hide().attr('name', frameName).appendTo(document.body);
        doc = window.frames[frameName];
    }
    doc.document.body.innerHTML = response;
    doc.window.print();
}

function saveAndPrint() {
    var printRotes = $('.open-print-modal').attr('data-url')
    $.clinicGet({
        url: printRotes,
        options: (response) => getPrintData(response)
    });
}

function save(element, print_insurance, result) {
    var action = element;
    var routes = $(action).attr('routes');
        $.clinicSave({
            selector: action,
            url: routes,
            method: 'PUT',
            data: PAYMENT_FORM,
            options: (response) => $(CONTENT).html(response.html)
        });
        $(document).one("ajaxComplete", function (event, xhr, settings) {
            if (xhr.status == 200) {
                if (!result) {
                    toastAlert('Cập nhật thành công', '', 'success');
                }
            } else {
                toastAlert('Có lỗi xảy ra. Vui lòng thử lại sau ít phút', '', 'error');
            }
        });
}

function appendDataEditCadre(response) {
    hideMessageValidate('#edit-cadres-form');
    $('#edit-cadre').modal('show');
    let item = response.data;
    item['birthday'] = item['birthday'] ? moment(item['birthday']).format("DD/MM/YYYY") : moment().format("DD/MM/YYYY");
    item['medical_insurance_start_date'] = item['medical_insurance_start_date'] ? moment(item['medical_insurance_start_date']).format("DD/MM/YYYY") : "";
    item['medical_insurance_end_date'] = item['medical_insurance_end_date'] ? moment(item['medical_insurance_end_date']).format("DD/MM/YYYY") : "";
    item['insurance_five_consecutive_years'] = item['insurance_five_consecutive_years'] ? moment(item['insurance_five_consecutive_years']).format("DD/MM/YYYY") : "";
    let type = 'edit';
    getSelectDataCiTyDistrictFolk(type, item['city_id'], item['district_id'], item['folk_id']);
    for (let key in item) {
        if (key != 'city_id' && key != 'district_id' && key != 'folk_id' && key != 'is_long_date') {
            if (item.hasOwnProperty(key)) {
                $(`#${key}-${type}`).val(item[key])
            }
        }
    }

    $(`#medical_insurance_live_code-${type} option[value=${item['medical_insurance_live_code']}]`).attr('selected','selected');

    if (item['is_long_date'] == '1') {
        $(`#is_long_date-edit`).attr('checked','checked');
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

function getSelectDataCiTyDistrictFolk(type, city_id, district_id, folk_id) {
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

function nextEditCadre (data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-cadre').modal('hide');
        hideMessageValidate('#edit-cadres-form');
        $('#edit-cadres-form')[0].reset();
        toastAlert(data.message, "", "success");
        window.location.reload();
    }
}
