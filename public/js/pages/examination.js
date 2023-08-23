let OLD_RE_EXAMINATION_DATE = $('#re_examination_date-add').val();
$(document).ready(function () {
    // DateTimePicker
    $("#cal-re_examination_date").datetimepicker({
        format: "DD/MM/YYYY",
        locale: 'vi',
        language: 'vi',
        useCurrent: false,
    });

    if ($('#user_id').val() !== '') {
        $('.designated_service').addClass('active');
        $('.update').addClass('hidden');
    } else {
        $('.designated_service').removeClass('active');
        $('.update').removeClass('hidden');
    }

    $(document).on("click", ".edit_save", function () {
        let api = API_CREATE_OR_UPDATE;
        let data = $("#save-examination-form").serialize();
        hideMessageValidate('#save-examination-form');
        createOrUpdate(api, data, nextUpdateExamination);
    });

    $(document).on("click", ".update", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            status: 2
        };
        var api = API_START_MEDICAL_SESSION;
        hideMessageValidate('#save-examination-form');
        createOrUpdate(api, data, nextUpdateExamination);
    });

    $(document).on("click", "#checkbox-change-room", function () {
        if ($(this).is(":checked")) {
            $("#select-change-room").removeAttr('disabled');
            $("#button-change-room").removeAttr('disabled');
        } else {
            $("#select-change-room").prop("disabled", true);
            $("#button-change-room").prop("disabled", true);
        }
    });

    $(document).on("click", "#button-change-room", function () {
        let idMedicalSession = $("#medical-session-id").val();
        let idRoom = $("#select-change-room").val();
        if (!idRoom) {
            toastAlert("Bạn cần chọn phòng khám", "", "warning");
            return;
        }
        let data = {
            id_room           : idRoom,
            id_medical_session: idMedicalSession
        }
        let api = API_CHANGE_ROOM_OF_MEDICAL_SESSION;
        createOrUpdate(api, data, nextChangeRoom);
    });

    $('#re_examination_date-add').on('change', function(e) {
        e.stopPropagation();
        let reExaminationDate = $("#re_examination_date-add").val();
        let isValidDate = moment(reExaminationDate, "D/M/YYYY", true).isValid();
        if (reExaminationDate) {
            if (!isValidDate) {
                $(this).val(OLD_RE_EXAMINATION_DATE);
                return;
            }
        } else {
            $('#re_examination_date-add-error').text('')

        }
        reExamination(reExaminationDate);
    });

    $('#cal-re_examination_date').on("change.datetimepicker", ({}) => {
        let reExaminationDate = $("#re_examination_date-add").val();
        reExamination(reExaminationDate);
    })

    $(document).on("click", ".cancel-btn", function () {
        hideMessageValidateDiv('#validate_div');
        hideMessageValidateDiv('#validate_div_1');
        hideMessageValidateDiv('#validate_div_2');
        let api = API_CANCEL;
        let id = $(this).data('id');
        let data = {id: id};
        createOrUpdate(api, data, nextCancel);
    });

    $(document).on("click", ".complete-btn", function () {
        let api = API_COMPLETE;
        hideMessageValidateDiv('#validate_div');
        hideMessageValidateDiv('#validate_div_1');
        hideMessageValidateDiv('#validate_div_2');
        let id = $(this).data('id');
        let main_disease_code = $('#main_disease_code').val();
        let diagnose = $('#main_diagnose').val();
        let conclude = $('#main_conclude').val();
        let data = {id: id, main_disease_code: main_disease_code,diagnose:diagnose ,conclude:conclude};
        createOrUpdate(api, data, nextComplete);
    });

    $(document).on("click", ".waiting_result-btn", function () {

        hideMessageValidateDiv('#validate_div');
        hideMessageValidateDiv('#validate_div_1');
        hideMessageValidateDiv('#validate_div_2');
        let api = API_WAITING_RESULT;
        let id = $(this).data('id');
        let diagnose = $('#main_diagnose').val();
        let data = {id: id, diagnose:diagnose};
        createOrUpdate(api, data, nextWaitingResult);
    });
    $(document).on("click", ".transfer-btn", function () {
        let api = API_TRANSFER;
        hideMessageValidateDiv('#validate_div');
        hideMessageValidateDiv('#validate_div_1');
        hideMessageValidateDiv('#validate_div_2');
        let id = $(this).data('id');
        let main_disease_code = $('#main_disease_code').val();
        let diagnose = $('#main_diagnose').val();
        let conclude = $('#main_conclude').val();
        let data = {id: id, main_disease_code: main_disease_code,diagnose:diagnose ,conclude:conclude};
        createOrUpdate(api, data, nextTransfer);
    });
})


function nextUpdateExamination(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        hideMessageValidate('#save-examination-form');
        toastAlert(data.message, "", "success");
        $("#cadres-information").load(location.href + " #cadres-information>*","");
        if (data.type === 'update') {
            $('.designated_service').addClass('active');
            $('.update').addClass('hidden');
        }
    }
}

function nextChangeRoom(data) {
    if (data.code == HTTP_SUCCESS) {
        swal({
            title: `Chuyển phòng khám thành công!`,
            icon: "success",
        })
            .then((isConfirm) => {
                if (isConfirm) {
                    window.location.href = API_LIST_MEDICAL_SESSION;
                }
            });
    } else {
        toastAlert(data.message, "", "error");
    }
}

function nextCancel(data) {
    if (data.code == HTTP_SUCCESS) {
        swal({
            title: `Bạn có chắc chắn hủy phiên khám này ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["Hủy", "OK"],
        })
            .then((willCancel) => {
                if (willCancel) {
                    let id = data.id;
                    var api = API_UPDATE_CANCEL;
                    api = api.replace(":id", id);
                    createOrUpdate(api, data, nextUpdateCancel);
                }
            });
    }
    else {
        toastAlert(data.message, "", "error");
    }
}
function nextComplete(data) {
    if (data.code == HTTP_SUCCESS) {
        swal({
            title: `Bạn có chắc chắn hoàn tất phiên khám này ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["Hủy", "OK"],
        })
            .then((willComplete) => {
                if (willComplete) {
                    let id = data.id;
                    var api = API_UPDATE_COMPLETE;
                    api = api.replace(":id", id);
                    createOrUpdate(api, data, nextUpdateComplete);
                }
            });
    } else if(data.code === HTTP_UNPROCESSABLE_ENTITY){
        for (let key in data.errors){
            if(data.errors.hasOwnProperty(key)){
                if (key == 'main_disease_code') {
                    $('#main_disease_name').focus();
                } else {
                    $(`[name=${key}]`).focus();
                }
                break;
            }
        }
        showMessageValidate("save", data.errors);
    }
    else {
        toastAlert(data.message, "", "error");
    }
}
function nextWaitingResult(data) {
    if (data.code == HTTP_SUCCESS) {
        window.location.href = API_LIST_MEDICAL_SESSION;
    }
    else if(data.code === HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate("save", data.errors);
    } else {
        toastAlert(data.message, "", "error");
    }
}
function nextTransfer(data) {
    if (data.code == HTTP_SUCCESS) {
        let id = data.id;
        var api = API_CREATE_TRANSFER;
        api = api.replace(":id", id);
        window.location.href = api;
    } else if(data.code === HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate("save", data.errors);
    } else {
        toastAlert(data.message, "", "error");
    }
}
function nextUpdateComplete(data){
    if (data.code == HTTP_SUCCESS) {
        toastAlert("Hoàn tất phiên khám thành công", "", "success");
        setTimeout(function() {
            window.location.href = API_LIST_MEDICAL_SESSION;
        }, 1000);
    }
    else{
        toastAlert(data.message, "", "error");
    }
}

function nextUpdateCancel(data){
    if (data.code == HTTP_SUCCESS) {
        toastAlert("Hủy phiên khám thành công", "", "success");
        setTimeout(function() {
            window.location.href = API_LIST_MEDICAL_SESSION;
        }, 1000);
    }
    else{
        toastAlert(data.message, "", "error");
    }
}
function calculateBmi() {
    var height= $('#height-edit').val();
    var weight = $('#weight-edit').val();
    var result = '';
    if (height && weight && height > 0 && weight >= 0) {
        height = height / 100;
        var result = weight / (height * height);
        $('#bmi-edit').val(result.toFixed(1));
    } else {
        $('#height-edit').val('0');
        if (!weight || weight <= 0) { $('#weight-edit').val('0'); }
        $('#bmi-edit').val(result);
    }
}
function hideMessageValidateDiv(div) {
    $(div).find('.validate-error').text('');
}

function reExamination(reExaminationDate) {
    let idMedicalSession = $("#medical-session-id").val();
    let data = {
        re_examination_date: reExaminationDate,
        id_medical_session : idMedicalSession
    }
    createOrUpdate(API_RE_EXAMINATION_OF_MEDICAL_SESSION, data, nextReExamination);
}

function nextReExamination(data) {
    if (data.code === HTTP_UNPROCESSABLE_ENTITY) {
        OLD_RE_EXAMINATION_DATE = $('#re_examination_date-add').val();
        showMessageValidate('add', data.errors);
    } else {
        if (data.statusSave) {
            $('#re_examination_date-add-error').text('')
            OLD_RE_EXAMINATION_DATE = $('#re_examination_date-add').val();
            if (!$('#re_examination_date-add').val()) {
                resetDateTimePicker($('#cal-re_examination_date'))
            }
            toastAlert(data.message, "", "success");
        } else {
            resetDateTimePicker($('#cal-re_examination_date'))
            $('#re_examination_date-add-error').text('');
        }
    }
}

