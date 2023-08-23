let CONTENT = '#content-list';

// Default function
$.clinicGet({
    url: API_LIST,
    data: {
        specialist: $('#input-search-specialist-hidden').val(),
        room_id: $('#input-search-room_id-hidden').val(),
        status: $('#input-search-status-hidden').val(),
        medical_examination_day: $('#input-search-medical_examination_day-hidden').val(),
        page: sessionStorage.getItem('page') ?? 1
    },
    options: (response) => $(CONTENT).html(response.html)
});

$.clinicSearch({
    selector: '#search',
    options: () => getListData(true)
})

$.clinicKeyup({
    selector: '#input-search',
    options: () => getListData(true)
});

$.clinicPaginate({
    selector: '.page-link',
    options: (data) => getListData(true, data)
});

function resetFormSearchMedicalTest(element)
{
    resetForm(element);
    $("#input-search-status").val('').trigger('change');
    $('#medical_examination_day-search').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
}

function getListData(isSearch, page)
{
    const fields = ['specialist', 'room_id', 'status', 'medical_examination_day'];
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
