let CONTENT = '#content-list';
let EDIT_DEPARTMENT_SELECT = '#edit-user-form #department_id-edit-select';
let EDIT_ROLE_SELECT = '#edit-user-form #role_id';
let EDIT_ROOM_SELECT = '#edit-user-form #room_id-edit-select';
let ADD_USER_FORM = '#add-user-form';
let EDIT_USER_FORM = '#edit-user-form';
let HIDDEN_DEPARTMENT_SELECT = '#department-hidden';
let HIDDEN_ROOM_SELECT = '#room-hidden';

// Default function
$.clinicGet({
    url: API_LIST,
    data: {
        name: '',
        role_id: '',
        department_id: '',
        room_id: '',
        page: 1
    },
    options: (response) => $(CONTENT).html(response.html)
});

$.clinicSave({
    selector: '.add',
    url: API_CREATE,
    method: 'POST',
    data: ADD_USER_FORM,
    options: (response) => responseAfterCreate(response, ADD_USER_FORM, '#add-user', 'add')
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
    data: EDIT_USER_FORM,
    options: (response) => responseAfterCreate(response, EDIT_USER_FORM, '#edit-user', 'edit')
});

$.clinicDelete({
    selector: '.delete-btn',
    token: API_TOKEN,
    target: '.container-fluid',
    swal_confirm: 'Bạn có chắc chắn muốn xóa người dùng',
    swal_success: FAIL_MESSAGE,
    options: () => getListData(false)
});

$.clinicPaginate({
    selector: '.page-link',
    options: (data) => getListData(true, data)
});

$.clinicSearch({
    selector: '#search',
    options: () => getListData(true)
})

$.clinicChange({
    selector: `${ADD_USER_FORM}` + ' #department_id',
    options: (response) => appendDataSelect(response, `${ADD_USER_FORM}` + ' #room_id')
});

$.clinicChange({
    selector: EDIT_DEPARTMENT_SELECT,
    options: (response, callback) => appendDataSelect(response, EDIT_ROOM_SELECT, callback)
});

$.clinicKeyup({
    selector: '#input-search',
    options: () => getListData(true)
});

$.clinicOnReady({
    options: () => beforeRender()
});

$.clinicMaskName({
    selector: '#name-add, #name-edit'
});

// End default function

// Custom function
function getListData(isSearch, page)
{
    const fields = ['name', 'role_id', 'department_id', 'room_id'];
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
        getListData(false, sessionStorage.getItem('page'));
    }
}

function appendDataEdit(data)
{
    $(EDIT_USER_FORM).find('.validate-error').text('');
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        const el = $(`#${key}-${type}`);

        if (key === 'id' ||
            key === 'name' ||
            key === 'position' ||
            key === 'phone' ||
            key === 'email' ||
            key === 'address' ||
            key === 'certificate') {
            el.val(item[key]);
        }

        if (key === 'role_id') {
            $("#edit-user-form input[name='role_id'][value='" + parseInt(item[key]) + "']").prop('checked', true);
            toggleDepartmentAndRoom({
                'value': parseInt(item[key]),
                'form_department': $(`${EDIT_USER_FORM} ${HIDDEN_DEPARTMENT_SELECT}`),
                'form_room': $(`${EDIT_USER_FORM} ${HIDDEN_ROOM_SELECT}`),
                'department_id':  $(EDIT_DEPARTMENT_SELECT),
                'room_id': $(EDIT_ROOM_SELECT),
                'certificate_required': $(`${EDIT_USER_FORM}` + ' #certificate-required-edit'),
                'department_required': $(`${EDIT_USER_FORM}` + ' #department-required-edit'),
                'room_required': $(`${EDIT_USER_FORM}` + ' #room-required-edit'),
                'certificate': $(`${EDIT_USER_FORM}` + ' #certificate-edit'),
            });
        }

        if (key === 'department_id') {
            if (!isNaN(parseInt(item[key]))) {
                if (item['room'].length > 0) {
                    $(EDIT_DEPARTMENT_SELECT).val(parseInt(item[key])).trigger('change', JSON.stringify(item['room']));
                } else {
                    $(EDIT_DEPARTMENT_SELECT).val(parseInt(item[key])).trigger('change');
                }
            } else {
                $(EDIT_DEPARTMENT_SELECT).val('').trigger('change', '');
            }
        }
    }
}

function appendDataSelect(data, selector, callback)
{
    $(selector).empty().trigger('change');
    Promise.resolve().then(() => {
        const response = JSON.parse(callback ? callback : JSON.stringify([{}]));
        let option;
        let options = [];

        data.rooms.forEach((v) => {
            let isSelected = false;
            response.forEach((room) => {
                if (room && room.id === v.id) {
                    isSelected = true;
                }
                option = new Option(v.name, v.id, false, isSelected);
            });
            options.push(option);
        });
        $(selector).append(options);
    }).then(() => {
        $(selector).trigger('change');
    });
}

function beforeRender()
{
    // Active select 2

    $('#department_id, #room_id').select2({
        dropdownParent: $('#add-user-form')
    });

    $('#department_id-edit-select, #room_id-edit-select').select2({
        dropdownParent: $('#edit-user-form')
    });

    $('#room_id, #room_id-edit-select').select2({
        multiple: true,
    });

    // Show department and room by roles
    $(document).on('change', 'input[type=radio]', function () {
        const form = $(this).closest('form').attr('id');
        const department_name = (form === 'edit-user-form') ? ' #department_id-edit-select' : ' #department_id';
        const room_name = (form === 'edit-user-form') ? ' #room_id-edit-select' : ' #room_id';
        const certificate_required = (form === 'edit-user-form')
            ? ' #certificate-required-edit'
            : ' #certificate-required';
        const department_required = (form === 'edit-user-form')
            ? ' #department-required-edit'
            : ' #department-required';
        const room_required = (form === 'edit-user-form')
            ? ' #room-required-edit'
            : ' #room-required';
        const certificate = (form === 'edit-user-form') ? ' #certificate-edit' : ' #certificate-add';
        toggleDepartmentAndRoom({
            'value': $(this).val(),
            'form_department': $(`#${form} ${HIDDEN_DEPARTMENT_SELECT}`),
            'form_room': $(`#${form} ${HIDDEN_ROOM_SELECT}`),
            'department_id': $(`#${form}` + department_name),
            'department_required': $(`#${form}` + department_required),
            'room_required': $(`#${form}` + room_required),
            'certificate_required': $(`#${form}` + certificate_required),
            'room_id': $(`#${form}` + room_name),
            'certificate': $(`#${form}` + certificate),
        });
    });
}

function toggleDepartmentAndRoom(options)
{
    if (options.value == EXAMINATION_DOCTOR || options.value == REFERRING_DOCTOR) {
        options.form_department.removeClass('d-none');
        options.form_room.removeClass('d-none');
        options.department_required.removeClass('d-none');
        options.room_required.removeClass('d-none');
        options.certificate_required.removeClass('d-none');
        options.department_id.first().attr('name', 'department_id');
        options.room_id.first().attr('name', 'room_id[]');
        options.certificate.attr('name', 'certificate');
    } else if (options.value == RECEPTIONIST) {
        options.form_department.addClass('d-none');
        options.form_room.addClass('d-none');
        options.department_required.removeClass('d-none');
        options.room_required.removeClass('d-none');
        options.certificate_required.addClass('d-none');
        options.certificate.removeAttr('name');
        options.department_id.first().removeAttr('name');
        options.room_id.first().removeAttr('name');
    } else if (options.value == PHARMACIST) {
        options.form_department.removeClass('d-none');
        options.form_room.removeClass('d-none');
        options.department_required.addClass('d-none');
        options.room_required.addClass('d-none');
        options.certificate_required.removeClass('d-none');
        options.certificate.attr('name', 'certificate');
    }
}
// End custom function

