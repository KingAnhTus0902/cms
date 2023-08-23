let CONTENT = '#content-list';
let ADD_EXAMINATION_TYPE_FORM = '#add-examination_type-form';
let EDIT_EXAMINATION_TYPE_FORM = '#edit-examination_type-form';

$.clinicGet({
    url: API_LIST,
    data: { keyword: '', page: 1},
    options: (response) => $(CONTENT).html(response.html)
});

$.clinicSave({
    selector: '.add',
    url: API_CREATE,
    method: 'POST',
    data: ADD_EXAMINATION_TYPE_FORM,
    options: (response) => responseAfterCreate(response, ADD_EXAMINATION_TYPE_FORM, '#add-examination_type', 'add')
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
    data: EDIT_EXAMINATION_TYPE_FORM,
    options: (response) => responseAfterCreate(response, EDIT_EXAMINATION_TYPE_FORM, '#edit-examination_type', 'edit')
});

$.clinicDelete({
    selector: '.delete-btn',
    token: API_TOKEN,
    target: '.container-fluid',
    swal_confirm: 'Bạn có chắc chắn muốn xóa loại khám này ?',
    swal_success: FAIL_MESSAGE,
    options: () => getListData()
});

$.clinicPaginate({
    selector: '.page-link',
    options: (data) => getListData(data)
})

$.clinicSearch({
    selector: '#search',
    options: () => getListData(1, true)
})

$.clinicKeyup({
    selector: '#input-search',
    options: () => getListData()
})

$.clinicOnReady({
    options: () => {}
});

function getListData(page, search) {
    $.clinicGet({
        url: API_LIST,
        data: {
            keyword: search ? $('#keyword-search').val() : $('#input-keyword-search-hidden').val(),
            page: page ?? $('li.paginate_button.page-item.active a').attr("data-id")
        },
        options: (response) => $(CONTENT).html(response.html)
    });
    if (search) {
        $('#input-keyword-search-hidden').val($('#keyword-search').val());
    }
}

function responseAfterCreate(response, form, modal, type)
{
    var search = false,
    page = $('li.paginate_button.page-item.active a').attr("data-id");
    $(form).find('.validate-error').text('');
    if (response.code === HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate(type, response.errors);
    } else {
        $(modal).modal('hide');
        $(form)[0].reset();
        toastAlert(response.success, "", "success");
        getListData(page, search);
    }
}

function appendDataEdit(data) {
    let item = data.data;
    let type = 'edit';
    $(EDIT_EXAMINATION_TYPE_FORM).find('.validate-error').text('');
    for (let key in item) {
        const el = $(`#${key}-${type}`);
        if (!el.is('option') && !el.is(':radio')) {
            el.val(item[key]);
        }
        if (key === 'type') $("option[value='" + parseInt(item[key]) + "']").prop('selected', true);
    }
}