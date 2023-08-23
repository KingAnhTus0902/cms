let SETTING_FORM = '#setting-form';
$.clinicSaveWithFile({
    selector: '.profile',
    data: SETTING_FORM,
    url: API_UPDATE,
    method: 'POST',
    options: (response) => {
        $(SETTING_FORM).find('.validate-error').text('');
        if (response.code === HTTP_UNPROCESSABLE_ENTITY) {
            showMessageValidate('edit', response.errors);
        } else {
            $('.label-default_name').text($('#default_name').val());
            $('.label-logo').attr('src', $('#preview').attr('src'))
            toastAlert(response.success, "", "success");
        }
    }
});

$.clinicUpload({
    selector: '#upload',
    file_image: '#file',
    preview_image: '#preview'
});
