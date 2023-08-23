; (function ($) {
    // Default settings:
    let defaults = {
        selector: '',
        action: '',
        url: '',
        token: '',
        data: '',
        options: null,
        method: 'POST',
        search: '#input-search',
        swal_success: null,
        swal_confirm: null,
        type: 'select',
        preview_image: '#preview',
        file_image: '#file',
        accept_input: 'input, select, textarea',
        loading: true
    }
    // Loading
    let loading = $('.loading')

    _ajaxSetup();

    $.extend({
        clinicOnReady: (options) => {
            const settings = extendSettings(options)
            $(function () {
                settings.options()
            });
        },

        clinicGet: (options) => {
            const settings = extendSettings(options)
            $.ajax({
                url: settings.url,
                type: 'GET',
                data: settings.data,
                beforeSend: () => isLoading(settings.loading),
                success: (response) => {
                    settings.options(response);
                },
                error: () => {
                    swalFunc('error');
                }
            });
        },

        clinicSave: function (options) {
            const settings = extendSettings(options)
            $(document).on('click', settings.selector, function () {
                $.ajax({
                    url: getIndexFromUrl(settings),
                    type: settings.method,
                    data: $(settings.data).find(settings.accept_input).serialize(),
                    beforeSend: () => isLoading(settings.loading),
                    success: (response) => {
                        settings.options(response, settings.action);
                    },
                    error: (err) => {
                        swalFunc('error', err.responseJSON.message)
                    }
                });
            })
        },

        clinicEdit: (options) => {
            const settings = extendSettings(options)
            $(document).on('click', settings.selector, function () {
                $.ajax({
                    url: $(this).data('url'),
                    type: 'GET',
                    beforeSend: () => isLoading(settings.loading),
                    success: (response) => {
                        settings.options(response);
                    },
                    error: () => {
                        swalFunc('error');
                    }
                });
            });
        },

        clinicDelete: (options) => {
            const settings = extendSettings(options);
            $(document).on('click', settings.selector, function () {
                const thisRow = $(this).parents('tr')
                const extra = $(this).data('name') ? ' "' + $(this).data('name') + '" ?' : ' ?';
                swal(({
                    title: settings.swal_confirm + extra,
                    icon: 'warning',
                    dangerMode: true,
                    buttons: ['Hủy', 'OK'],
                })).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            data: {
                                _method: 'DELETE',
                                _token: settings.token,
                            },
                            beforeSend: () => isLoading(settings.loading),
                            success: (response) => {
                                if (response.error) {
                                    swalFunc('error');
                                } else {
                                    swalFunc('success', settings.swal_success)
                                    thisRow.remove()
                                }
                                settings.options(response);
                            },
                            error: (xhr) => {
                                swalFunc('error');
                                console.log(xhr)
                            },
                        })
                    }
                });
            })
        },

        clinicPaginate: (options) => {
            const settings = extendSettings(options)
            let page = sessionStorage.getItem('page') || DEFAULT_PAGE;
            $(document).on('click', settings.selector, function () {
                page = $(this).data('id');
                sessionStorage.setItem('page', page);
                settings.options(page);
            });
        },

        clinicSearch: (options) => {
            const settings = extendSettings(options)
            $(document).on('click', settings.selector, function () {
                settings.options();
            });
        },

        clinicKeyup: (options) => {
            const settings = extendSettings(options)
            $(document).on('keyup', settings.selector, function (e) {
                if (e.keyCode === 13) {
                    settings.options();
                }
            });
        },

        clinicChange: (options) => {
            const settings = extendSettings(options);
            $(settings.selector).on('change', function (event, callback) {
                let data = $(this).val();
                if (settings.type === 'select') {
                    data = $(this).find(":selected").val();
                }
                $.ajax({
                    url: $(this).data('url'),
                    type: settings.method,
                    data: {
                        data: data
                    },
                    beforeSend: () => isLoading(settings.loading),
                    success: (response) => {
                        settings.options(response, callback)
                    },
                    error: (xhr) => {
                        console.log(xhr)
                    }
                });
            });
        },

        clinicPrint: (options) => {
            const settings = extendSettings(options);
            $(document).on('click', settings.selector, function (event, callback) {
                $.ajax({
                    url: $(this).data('url'),
                    type: 'GET',
                    beforeSend: () => isLoading(settings.loading),
                    success: (response) => {
                        let doc = window.frames['printIframe'];
                        if (!doc) {
                            $('<iframe>').hide().attr('name', 'printIframe').appendTo(document.body);
                            doc = window.frames['printIframe'];
                        }
                        doc.document.body.innerHTML = response;

                        let images = doc.document.getElementsByTagName('img');

                        if (images.length > 0) {
                            let loadedImages = 0;

                            const checkAllImagesLoaded = () => {
                                loadedImages++;
                                if (loadedImages === images.length) {
                                    setTimeout(function () {
                                        doc.print();
                                    }, 1000)
                                }
                            };
                            for (let i = 0; i < images.length; i++) {
                                images[i].addEventListener('load', checkAllImagesLoaded);

                                if (images[i].complete) {
                                    checkAllImagesLoaded();
                                }
                            }
                        } else {
                            doc.print();
                        }

                        if (callback && typeof callback === 'function') {
                            doc.onafterprint = function () {
                                callback();
                            }
                        }
                    },
                    error: (xhr) => {
                        console.log(xhr)
                    }
                });
            });
        },

        clinicToggle: (options) => {
            const settings = extendSettings(options);
            $(settings.selector).on('click', function () {
                $(this).toggleClass(settings.icon);
                if ($(this).prev().attr('type') === 'password') {
                    $(this).prev().attr('type', 'text')
                } else {
                    $(this).prev().attr('type', 'password')
                }
            });
        },

        clinicUpload: (options) => {
            const settings = extendSettings(options);
            $(settings.selector).on('click', function () {
                $(settings.file_image).click();
            });
            $(settings.file_image).on('change', function (e) {
                let i = 0;
                for (i; i < e.originalEvent.target.files.length; i++) {
                    const file = e.originalEvent.target.files[i],
                        reader = new FileReader();
                    reader.onloadend = function () {
                        $(settings.preview_image).attr('src', reader.result).css({
                            width: 200,
                            height: 200
                        }).animate({opacity: 1}, 700);
                    }
                    reader.readAsDataURL(file);
                    $(settings.preview_image).css('display', 'block');
                    $(settings.selector).val('Chọn ảnh khác');
                }
            });
        },

        clinicUploadEditor: (options) => {
            const settings = extendSettings(options);
            const formData = new FormData();
            for (let i = 0; i < settings.file_image.length; i++) {
                formData.append('file[]', settings.file_image[i]);
            }
            $.ajax({
                url: settings.url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Insert the uploaded image to the editor
                    $('.note-editable').find('img').remove();
                    for (let i = 0; i < response.data.length; i++) {
                        $(settings.selector).summernote('editor.insertImage', response.data[i].location);
                    }
                    if (settings.update_content === undefined || settings.update_content) {
                        setTimeout(function () {
                            $.ajax({
                                url: settings.url,
                                method: 'POST',
                                data: {
                                    code: $(settings.selector).summernote('code')
                                },
                                success: function (response) {
                                    if (response !== null) {
                                        toastAlert(settings.swal_success, "", "success");
                                    }
                                },
                                error: function (err) {
                                    console.error(err);
                                }
                            });
                        }, 500);
                    } else {
                        toastAlert(settings.swal_success, "", "success");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + ': ' + errorThrown);
                }
            });
        },

        clinicSaveWithFile: (options) => {
            const settings = extendSettings(options);
            $(document).on('click', settings.selector, function () {
                let formData = new FormData($(settings.data)[0]);
                $.ajax({
                    url: getIndexFromUrl(settings),
                    type: settings.method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: () => isLoading(settings.loading),
                    success: (response) => {
                        settings.options(response);
                    },
                    error: () => {
                        swalFunc('error')
                    }
                });
            })
        },

        clinicChangeStatus: (options) => {
            const settings = extendSettings(options);
            $(document).on('click', settings.selector, function () {
                const status = $(this).data('value');
                swal(({
                    title: settings.swal_confirm.replace('$action', toLowserCase(STATUS[status])),
                    icon: 'warning',
                    dangerMode: true,
                    buttons: ['Hủy', 'OK'],
                })).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: $(this).data('url'),
                            type: settings.method,
                            data: {
                                status: $(this).data('value')
                            },
                            beforeSend: () => isLoading(settings.loading),
                            success: (response) => {
                                if (status === CANCEL) {
                                    toastr.success(
                                        settings.swal_success.replace('$action', STATUS[status]),
                                        '',
                                        {
                                            timeOut: 1000,
                                            onHidden: function () {
                                                window.location.href = API_RETURN;
                                            }
                                        }
                                    );
                                }
                                settings.options(response);
                            },
                            error: () => {
                                swalFunc('error')
                            }
                        });
                    }
                });
            });
        },

        clinicPermission: (options) => {
            const settings = extendSettings(options);
            $(settings.selector).on('select2:open select2:unselecting', function () {
                const originalRole = [String(ADMIN)].concat($(this).val());
                $(settings.selector).on('select2:select select2:unselect', function (e) {
                    e.stopPropagation();
                    swal(({
                        title: settings.swal_confirm,
                        icon: 'warning',
                        dangerMode: true,
                        buttons: ['Hủy', 'OK'],
                    })).then((willSet) => {
                        if (willSet) {
                            $.ajax({
                                url: $(this).data('url'),
                                type: settings.method,
                                data: {
                                    'role_id': $(this).val()
                                },
                                success: (response) => {
                                    if (response.success) {
                                        swalFunc('success', settings.swal_success)
                                    }
                                },
                                error: () => {
                                    swalFunc('error')
                                }
                            });
                        } else {
                            $(this).val(originalRole).trigger('change')
                        }
                    });
                });
            });
        },

        clinicMaskName: (options) => {
            const settings = extendSettings(options);
            $(document).on('keyup', settings.selector, function () {
                let inputValue = $(this).val();
                $(this).val(formatFullName(inputValue));
            })
        },
    })

    function swalFunc(type, message)
    {
        return message ? toastAlert(message, '', type) :
            toastAlert('Có lỗi xảy ra. Vui lòng thử lại sau ít phút', '', type)
    }

    function extendSettings(options)
    {
        return $.extend({}, defaults, options);
    }

    function _ajaxSetup()
    {
        $.ajaxSetup({
            complete: () => {
                loading.hide()
            },
        })
    }

    function isLoading(isLoad)
    {
        if (isLoad) {
            loading.show()
        }
    }

    function getIndexFromUrl(setting)
    {
        return $(setting.id).val() !== undefined && setting.url.includes(':id')
            ? setting.url.replace(':id', $(setting.id).val())
            : setting.url;
    }

    function toLowserCase(string)
    {
        return string.charAt(0).toLowerCase() + string.slice(1)
    }

})(jQuery)
