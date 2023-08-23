let CONTENT = '#content-list';
let PAYMENT_FORM = "#save-payment-status";

$.clinicGet({
    url: API_LIST,
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
})

function resetFilter(element) {
    resetForm(element);
    $("#input-search-payment-status").val('1').trigger('change');
    $('#input-search-time').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
}
