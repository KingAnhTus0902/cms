let ADD_MEDICAL_TEST_FORM = '#add-medical_test-form';

$.clinicChangeStatus({
    selector: '.change-status',
    swal_confirm: 'Bạn có chắc chắn muốn $action phiên chỉ định này ?',
    swal_success: '$action phiên chỉ đinh thành công !',
    method: 'PUT',
    options: (response) => {
        $(ADD_MEDICAL_TEST_FORM).find('div.d-none').add($('.action').find('div.d-none')).removeClass('d-none');
        $('.processing.change-status').addClass('d-none');
    }
});

$.clinicSave({
    selector: '.edit-btn',
    url: API_UPDATE,
    id: '#id-edit',
    method: 'PUT',
    action: STATUS[SAVE],
    accept_input: 'input:not([id="status_draft"]), select, textarea',
    data: ADD_MEDICAL_TEST_FORM,
    options: (response, action) => responseAfterEdit(response, ADD_MEDICAL_TEST_FORM, action)
});

$.clinicSave({
    selector: '.draft',
    url: API_UPDATE,
    id: '#id-edit',
    method: 'PUT',
    action: STATUS[DRAFT],
    accept_input: 'input:not([id="status"]), select, textarea',
    data: ADD_MEDICAL_TEST_FORM,
    options: (response, action) => responseAfterEdit(response, ADD_MEDICAL_TEST_FORM, action)
});

$.clinicOnReady({
    options: () => {
        const editor = $('#medical_test_result');
        const status = parseInt($('#current_status').val());
        const paymentStatus = parseInt($('#payment_status').val());
        editor.summernote({
            tabsize: 2,
            height: 282,
            name: 'medical_test_result',
            callbacks: {
                onImageUpload: (files) => appendListImage(files, UPLOAD_IMAGE_SUCCESS),
                onMediaDelete: (files) => appendListImage(files, DELETE_IMAGE_SUCCESS)
            }
        })
        editor.summernote(
            (status === CANCEL || (status === FINISH && paymentStatus === PAID_STATUS))
                ? 'disable'
                : 'enable'
        );
    }
});

$.clinicPrint({
    selector: '.print-btn',
});

// Custom function
function responseAfterEdit(response, form, action) {
    $(form).find('.validate-error').text('');
    if (response.code === HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', response.errors);
    } else {
        $('.print-btn').trigger('click', function () {
            toastr.success(
                action + ' phiên chỉ định thành công!',
                '',
                {
                    timeOut: 1000,
                    onHidden: function () {
                        if (action === STATUS[SAVE]) {
                            window.location.href = API_RETURN;
                        }
                    }
                }
            );
        });
    }
}

function appendListImage(files, message) {
    const fetchPromises = [];
    const image_upload = [];
    const image = $('.note-editable').find('img');
    image.each(function () {
        const src = $(this).attr('src');
        const fetchPromise = fetch(src)
            .then(response => response.blob())
            .then(blob => {
                const fileName = function (src) {
                    let path = src.replace(/\\/g, '/');
                    path = path.substring(path.lastIndexOf('/')+ 1);
                    return !path.replace(/[?#].+$/, '').includes('.')
                        ? path.replace(/[?#].+$/, '') + '.jpg'
                        : path.replace(/[?#].+$/, '');
                }
                const fileObject = new File([blob], fileName(src),{ type: blob.type });
                image_upload.push(fileObject);
            })
            .catch(error => {
                console.error('Error fetching image:', error);
            });
        fetchPromises.push(fetchPromise);
    });

    Promise.all(fetchPromises)
        .then(() => {
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    image_upload.push(files[i]);
                }
            }
            $.clinicUploadEditor({
                selector: '#medical_test_result',
                url: API_UPLOAD,
                file_image: image_upload,
                swal_success: message
            });
        })
        .catch(error => {
            console.error('Error fetching images:', error);
        });
}
