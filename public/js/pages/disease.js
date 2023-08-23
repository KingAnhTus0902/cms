let CONTENT = '#content-list';
let ADD_DISEASE_FORM = '#add-disease-form';
let EDIT_DISEASE_FORM = '#edit-disease-form';

$.clinicGet({
    url: API_LIST,
    data: { name: '', code: '', page: 1},
    options: (response) => $(CONTENT).html(response.html)
});

$.clinicSave({
    selector: '.add',
    url: API_CREATE,
    method: 'POST',
    data: ADD_DISEASE_FORM,
    options: (response) => responseAfterCreate(response, ADD_DISEASE_FORM, '#add-disease', 'add')
});

$.clinicEdit({
    selector: '.open-edit-modal',
    options: (response) => appendDataEdit(response)
});

$.clinicSave({
    selector: '.edit',
    url: API_UPDATE,
    id: '#id-edit',
    method: 'PUT',
    data: EDIT_DISEASE_FORM,
    options: (response) => responseAfterCreate(response, EDIT_DISEASE_FORM, '#edit-disease', 'edit')
});

$.clinicDelete({
    selector: '.delete-btn',
    token: API_TOKEN,
    target: '.container-fluid',
    swal_confirm: 'Bạn có chắc chắn muốn xóa bệnh',
    swal_success: FAIL_MESSAGE,
    options: () => getListData(true)
});

$.clinicPaginate({
    selector: '.page-link',
    options: (data) => getListData(true, data)
})

$.clinicSearch({
    selector: '#search',
    options: () => getListData(true)
})

$.clinicKeyup({
    selector: '#input-search',
    options: () => getListData(true)
})

$.clinicOnReady({
    options: () => beforeRender()
});

function getListData(isSearch, page)
{
    const fields = ['name', 'code'];
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
        toastAlert(response.success, "", "success");
        getListData(false, sessionStorage.getItem('page'));
    }
}

function appendDataEdit(data)
{
    $('#edit-disease').modal('show');
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${key}-${type}`).val(item[key])
        }
    }
    $("#type-edit").trigger('change');

}

function beforeRender()
{
    // Active select 2
    $('.select2').select2();
}
