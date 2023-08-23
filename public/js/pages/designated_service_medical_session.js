let ADD_DESIGNED_SERVICE_FORM = '#add-designated-service-medical-session-form';
let CONTENT = '#designed_service_medical_session-list';
let EDIT_DESIGNED_SERVICE_SELECT = '#edit-designated-service-medical-session-form #designated_service_id-edit';
let EDIT_DESIGNED_SERVICE_FORM = '#edit-designated-service-medical-session-form';
let MODEL_EDIT_DESIGNED_SERVICE = '#edit-designated-service-medical-session';
let MODEL_ADD_DESIGNED_SERVICE = '#add-designated-service-medical-session';

$.clinicSave({
    selector: '.add-dsms',
    url: API_CREATE_DSMS,
    method: 'POST',
    data: ADD_DESIGNED_SERVICE_FORM,
    options: (response) => responseAfterCreate(
        response,
        ADD_DESIGNED_SERVICE_FORM,
        MODEL_ADD_DESIGNED_SERVICE,
        'add'
    )
});

$.clinicSave({
    selector: '.edit-dsms',
    url: API_UPDATE_DSMS,
    id: '#id-edit',
    method: 'PUT',
    data: EDIT_DESIGNED_SERVICE_FORM,
    options: (response) => responseAfterCreate(
        response,
        EDIT_DESIGNED_SERVICE_FORM,
        MODEL_EDIT_DESIGNED_SERVICE ,
        'edit'
    )
});

$.clinicEdit({
    selector: '.open-edit-modal-ds',
    options: (response) => {
        let item = response.data;
        let type = 'edit';
        for (let key in item) {
            const el = $(`#${key}-${type}`);

            if (key === 'id' || key === 'description' || key === 'designated_service_amount') {
                el.val(item[key]);
            }

            if (key === 'designated_service_id') {
                $(EDIT_DESIGNED_SERVICE_SELECT).val(parseInt(item[key])).trigger('change');
            }
        }
    }
});

$.clinicDelete({
    selector: '.designated-service-delete',
    token: API_TOKEN,
    target: '.container-fluid',
    swal_confirm: 'Bạn có chắc chắn muốn xóa chỉ định',
    swal_success: FAIL_MESSAGE,
    options: () => getListData()
});

$.clinicPrint({
    selector: '.open-print-modal',
    options:() => {}
});

$.clinicPrint({
    selector: '.print-btn',
});

$.clinicChange({
    selector: '.diagnose',
    method: 'PUT',
    type: 'textarea',
    loading: false,
    options: (response) => {
        $('.diagnose').text(response.data);
        toastAlert("Cập nhật thành công", "", "success");
    }
});

$.clinicChange({
    selector: '.conclude',
    method: 'PUT',
    type: 'textarea',
    loading: false,
    options: (response) => {
        $('.conclude').text(response.data);
        toastAlert("Cập nhật thành công", "", "success");
    }
});

$.clinicOnReady({
    options: () => {
        $('#designated_service_id').select2({
            dropdownParent: $(ADD_DESIGNED_SERVICE_FORM)
        });
        $('#designated_service_id-edit').select2({
            dropdownParent: $(EDIT_DESIGNED_SERVICE_FORM)
        });
    }
});

// End default function

// Custom function
function responseAfterCreate(response, form, modal, type)
{
    $(form).find('.validate-error').text('');
    if (response.code === HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate(type, response.errors);
    } else {
        if (type === 'edit') {
            $(modal).modal('hide');
        } else {
            resetDesignatedServiceMedicalSessionForm(form);
        }
        toastAlert(response.success, "", "success");
        getListData();
    }
}

// Custom function
function getListData()
{
    $.clinicGet({
        url: API_LIST_DSMS,
        data: {
            page: 1, limit: 9999
        },
        options: (response) => $(CONTENT).html(response.html)
    });
}

function resetDesignatedServiceMedicalSessionForm(form = '')
{
    resetForm(form);
    $("#designated_service_amount-add").val(1);
}
// End custom function
