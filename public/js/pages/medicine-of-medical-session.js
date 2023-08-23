$(document).ready(function () {
    getmedicineOfMedicalSession();

    $(document).on("click", ".add", function () {
        let api = API_CREATE_MEDICINE_OF_MEDICAL_SESSION;
        let data = $("#add-medicine-of-medical-session-form").serialize();
        hideMessageValidate('#add-medicine-of-medical-session-form');
        createOrUpdate(api, data, nextSaveMedicineOfMedicalSession);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        $("#type-medicine-of-medical-session").val("edit");
        $(`#material-list-suggest-edit`).hide();
        var api = API_DETAIL_MEDICINE_OF_MEDICAL_SESSION;
        api = api.replace(":id", id);
        $('.edit-medicine-of-medical-session').data('id', id);
        hideMessageValidate('#edit-medicine-of-medical-session-form');
        getData(api, id, appendDataEdit);
    });

    $(document).on("click", ".edit-medicine-of-medical-session", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            materials_name: $('#materials_name-edit').val(),
            materials_amount: $('#materials_amount-edit').val(),
            materials_usage: $('#materials_usage-edit').val(),
            advice: $('#advice-edit').val(),
            material_id: $('#material-id-hidden-edit').val(),
            medical_session_id: $('#medical_session_id-hidden-edit').val(),
        };
        var api = API_UPDATE_MEDICINE_OF_MEDICAL_SESSION;
        hideMessageValidate('#edit-medicine-of-medical-session-form');
        createOrUpdate(api, data, nextSaveMedicineOfMedicalSession);
    });

    $(document).on("click", ".delete-btn", function () {
        swal({
            title: `Bạn có chắc chắn muốn xóa thuốc này ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["Hủy", "OK"],
        })
            .then((willDelete) => {
                if (willDelete) {
                    let api = API_DELETE_MEDICINE_OF_MEDICAL_SESSION;
                    let id = $(this).data('id');
                    let data = { id: id };
                    createOrUpdate(api, data, nextDeleteMedicineOfMedicalSession);
                }
            });
    });

    $(document).on('click', ".open-add-modal", function () {
        $("#type-medicine-of-medical-session").val('add');
        hideMessageValidate($(this).data('target'));
        resetMedicineOfMedicalSessionElement('#add-medicine-of-medical-session');
        $("#materials_amount-add").val(1);
    });

    $(document).mouseup(function(e) {
        let type = $("#type-medicine-of-medical-session").val();
        let container = $(`#material-list-suggest-${type}`);
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });
})


function getmedicineOfMedicalSession() {
    let api = API_LIST_MEDICINE_OF_MEDICAL_SESSION;
    let medical_session_id = $("#medical_session_id-hidden-add").val();
    let dataSearch = {
        medical_session_id: medical_session_id,
    };
    getData(api, dataSearch, nextGetMedicineOfMedicalSession);
}

function searchMedicineOfMedicalSession() {
    getmedicineOfMedicalSession();
}


function nextGetMedicineOfMedicalSession(data) {
    $('#content-medicine-of-medical-session').html(data);
}

function appendDataEdit(data) {
    let item = data.data;
    let type = $('#type-medicine-of-medical-session').val();
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key]);
        }
    }
}


function nextSaveMedicineOfMedicalSession(data) {
    let type = $('#type-medicine-of-medical-session').val();
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate(`${type}`, data.errors);
    } else {
        if (type === 'add') {
            resetMedicineOfMedicalSessionElement('#add-medicine-of-medical-session');
        }
        if (type === 'edit') {
            $(`#edit-medicine-of-medical-session`).modal('hide');
        }
        hideMessageValidate(`#${type}-medicine-of-medical-session-form`);
        toastAlert(data.message, "", "success");
        searchMedicineOfMedicalSession();
    }
}

function nextDeleteMedicineOfMedicalSession(data) {
    toastAlert(data.message, "", "success");
    searchMedicineOfMedicalSession();
}

function resetMedicineOfMedicalSessionElement(form = '') {
    resetForm(form);
    $("#materials_amount-add").val(1);
}

$('.number-validate').keypress(function (e) {
    if (!(/[0-9]/.test(String.fromCharCode(e.which)))) {
        e.preventDefault();
    }
});

$("#materials_name-add, #materials_name-edit").keyup(function () {
    $('#material-list-suggest-edit').css('width', '100%');
    $('#material-list-suggest-add').css('width', '100%');
    const query = $(this).val();
    const type = $('#type-medicine-of-medical-session').val();
    const materialListSuggest = $(`#material-list-suggest-${type}`);
    if (query !== "") {
        $.ajax({
            url: API_SUGGEST_MATERIAL,
            type: 'GET',
            data: {
                query: query,
                forPrescription:true,
            },
            beforeSend: () => {
                $('.loading').hide()
            },
            success: function (response) {
                if (response.length > 0) {
                    const html = response.map(v => (
                        `<div class="suggestion-option" data-id="${v.id}">
                            <span class="suggestion-item">
                                ${v.name}
                            </span>
                        </div>
                        `
                    )).join('');
                    materialListSuggest.fadeIn().html(html);
                }
            }
        });
    } else {
        materialListSuggest.hide();
    }
});


$('#material-list-suggest-add, #material-list-suggest-edit').on('click', '.suggestion-option', function() {
    let id = $(this).data('id');
    let type = $('#type-medicine-of-medical-session').val();
    $(`#material-id-${type}`).val(id);
    let api = API_DETAIL_MATERIAL;
    api = api.replace(":id", id);
    getData(api, id, appendDataSuggest);
});


function appendDataSuggest(data) {
    let item = data.data;
    let type = $('#type-medicine-of-medical-session').val();
    $(`#materials_name-${type}`).val(item['name']);
    $(`#material-id-hidden-${type}`).val(item['id']);
    $(`#materials_usage-${type}`).val(item['usage']);
    $(`#material-list-suggest-${type}`).hide();
}
