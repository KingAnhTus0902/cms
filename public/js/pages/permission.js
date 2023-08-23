let CONTENT = '#content-list'
let ADD_PERMISSION_FORM = '#add-permission-form'
let EDIT_PERMISSION_FORM = '#edit-permission-form'

// Default function
$.clinicGet({
    url: API_LIST,
    data: {
        name: '',
        type: TYPE_PERMISSION,
        page: 1
    },
    options: (response) => $(CONTENT).html(response.html)
});

$.clinicSave({
    selector: '.add',
    url: API_CREATE,
    method: 'POST',
    data: ADD_PERMISSION_FORM,
    options: (response) => responseAfterCreate(response, ADD_PERMISSION_FORM, '#add-permission', 'add')
});

$.clinicEdit({
    selector: '.open-edit-modal',
    options: (response) => {
        $(EDIT_PERMISSION_FORM).find('.validate-error').text('');
        let item = response.data;
        let type = 'edit';
        for (let key in item) {
            const el = $(`#${key}-${type}`);
            el.val(item[key]);
        }
    }
});

$.clinicSave({
    selector: '.edit',
    url: API_UPDATE,
    id: '#id-edit',
    method: 'PUT',
    data: EDIT_PERMISSION_FORM,
    options: (response) => responseAfterCreate(response, EDIT_PERMISSION_FORM, '#edit-permission', 'edit')
});

$.clinicPaginate({
    selector: '.page-link',
    options: (data) => getListData(true, data)
});

$.clinicSearch({
    selector: '#search',
    options: () => getListData(true)
})

$.clinicDelete({
    selector: '.delete-btn',
    token: API_TOKEN,
    target: '.container-fluid',
    swal_confirm: 'Bạn có chắc chắn muốn xóa quyền / chức vụ này',
    swal_success: FAIL_MESSAGE,
    options: () => getListData(false)
});

// Custom function
function getListData(isSearch, page)
{
    const fields = ['name', 'type'];
    const data = fields.reduce((inputs , field) => {
        const input = $(`#${field}-search`);
        const hidden = $(`#input-search-${field}-hidden`);
        if (isSearch) {
            hidden.val(input.val());
        }
        inputs[field] = hidden.val() ?? '';
        return inputs;
    }, {
        page: page ?? $('li.paginate_button.page-item.active').attr('id')
    });

    $.clinicGet({
        url: API_LIST,
        data: data,
        options: (response) => $(CONTENT).html(response.html)
    });
}

function responseAfterCreate(response, form, modal, type)
{
    $(form).find('.validate-error').text('');
    if (response.code === HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate(type, response.errors);
    } else {
        $(modal).modal('hide');
        $(form)[0].reset();
        $('#department_id, #room_id').val('').trigger('change');
        toastAlert(response.success, "", "success");
        getListData(false);
    }
}
