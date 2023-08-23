$(document).on("click", ".open-add-modal", function (e) {
    resetForm($(this).data('target'));
    hideMessageValidate($(this).data('target'))
});
$('.number-validate').keypress(function(event) {
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$('.daterangepicker-input').daterangepicker({
    locale: {
        format: 'DD/MM/YYYY'
    }
});

// DateTimePicker
$(".datetimepicker-div").datetimepicker({
    format: "DD/MM/YYYY",
    locale: 'vi',
    language: 'vi',
    useCurrent: false,
});

$(document).on('keypress', '.number-integer-validate', function (e) {
    if(!(/[0-9]/.test(String.fromCharCode(e.which)))){
        e.preventDefault();
    }
});

$('.string-validate').keypress(function(e) {
    if (!(/[0-9a-zA-Z]/.test(String.fromCharCode(e.which)))) {
        e.preventDefault();
    }
});

//Hide div datetimepicker-widget when click outside
$(document).mouseup(function(e) {
    let containerDatetimepicker = $(`.bootstrap-datetimepicker-widget`);
    let buttonClickDatetimepicker = containerDatetimepicker.next('.input-group-append');
    // if the target of the click isn't the container nor a descendant of the container
    if (!containerDatetimepicker.is(e.target) && containerDatetimepicker.has(e.target).length === 0 && buttonClickDatetimepicker.has(e.target).length === 0) {
        containerDatetimepicker.hide();
        buttonClickDatetimepicker.click();
    }
});

$(document).ready(function () {
    $('.select2').select2();
    $(window).resize(function() {
        $('.select2').select2();
    });
});

$('input.datetimepicker-input').on('change', function() {
    resetDateTimePicker($(this).parent());
});

function errorFunction(request) {
    let message = request?.responseJSON?.message ?? '';
    switch (request.status) {
        case 403:
            message = message ?? "Bạn không có quyền thực hiện hành động này.";
            break;
        case 404:
            message = "Không tìm thấy dữ liệu.";
            break;
        case 400:
            if (request.responseJSON.message !== undefined) {
                message = request.responseJSON.message;
            } else message = "Có lỗi xảy ra. Vui lòng thử lại sau ít phút";
            break;
        case HTTP_NOT_IMPLEMENTED:
            message = message ?? "Không thể thực hiện yêu cầu này";
            break;
        default:
            message = "Có lỗi xảy ra. Vui lòng thử lại sau ít phút";
    }
    toastAlert(message, "", "error");
}

/**
 *  action for call api with GET method like list, search, detail,...
 * @param api
 * @param data
 * @param nextAction
 */
function getData(api, data, nextAction) {
    $.ajax({
        url: api,
        type: 'GET',
        data: {
            data
        },
        beforeSend: function() {
            $('.loading').show();
        },
        complete: function(){
            $('.loading').hide();
        },
        success: function (response) {
            nextAction(response);
        },
        error: function (request, error) {
            errorFunction(request);
        }
    });
}

/**
 * action for call api with POST method like create, update, delete,...
 * @param api
 * @param data
 * @param nextAction
 */
function createOrUpdate(api, data, nextAction) {
    $.ajax({
        url: api,
        type: 'POST',
        data: data,
        beforeSend: function() {
            $('.loading').show();
        },
        complete: function(){
            $('.loading').hide();
        },
        success: function (response) {
            nextAction(response);
        },
        error: function (request, error) {
            errorFunction(request)
        }
    });
}


/**
 * action for call api with POST method like create, update, delete,...with file
 * @param api
 * @param data
 * @param nextAction
 */
function createOrUpdateWithFile(api, data, nextAction) {
    $.ajax({
        url: api,
        type: 'POST',
        data: data,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $('.loading').show();
        },
        complete: function(){
            $('.loading').hide();
        },
        success: function (response) {
            nextAction(response);
        },
        error: function (request, error) {
            errorFunction(request)
        }
    });
}

function resetForm(form = '', option = '') {
    const ignoreInput = ['designated_service_amount-add', 'role_id'];
    $("#input-search-type_id").val('').trigger('change');
    $("#input-search-city_id").val('').trigger('change');
    $("#input-search-department").val('').trigger('change');
    $('#department_id, #room_id').val('').trigger('change');
    $(form).find(':input').each(function () {
        if (ignoreInput.includes($(this).attr('id'))) {
            return;
        }

        if ($(this).hasClass('select2')) {
            $(this).val('').trigger('change');
        }

        if ($(this).is('select')) {
            $(this).prop("selectedIndex", 0);
        } else {
            switch (this.type) {
                case 'password':
                case 'text':
                case 'textarea':
                case 'file':
                case 'select-one':
                case 'select-multiple':
                case 'date':
                case 'number':
                case 'tel':
                case 'email':
                    $(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
                    if (form == '#add-material') {
                        let inputName = $(this).attr('name');
                        $(":radio[name=" + inputName + "]").first().prop("checked", true);
                    }
                    break;
            }
        }
    });
    hideMessageValidate(form);
}

function showMessageValidate(type, errors) {
    for (let key in errors){
        if(errors.hasOwnProperty(key)){
            $(`#${key}-${type}-error`).text(errors[key]);
        }
    }
}
function hideMessageValidate(form) {
    $(form).find('.validate-error').text('');
}

function sort (element) {
    let sortType = '';
    if (element.hasClass('sorting_asc')) {
        element.removeClass('sorting_asc');
        element.addClass('sorting_desc');
        sortType = 'desc';
    } else if (element.hasClass('sorting_desc')) {
        element.removeClass('sorting_desc');
        element.addClass('sorting_asc');
        sortType = 'asc';
    } else {
        element.addClass('sorting_asc');
        sortType = 'asc';
    }
    return sortType;
}

function showImage(input, divImage) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(divImage).attr('src', e.target.result).width(200).height(200);
        };

        reader.readAsDataURL(input.files[0]);
        $(divImage).show();
    } else {
        $(divImage).hide();
    }
}

function developing() {
    swal("Hiện tại hệ thống đang phát triển. Quý khách vui lòng thử lại sau", "", "warning");
}

function setDefaultInsurance(type) {
    $(`#medical_insurance_start_date-${type}`).val('').attr('disabled', 'disabled');
    $(`#medical_insurance_end_date-${type}`).val('').attr('disabled', 'disabled');
    $(`#medical_insurance_symbol_code-${type}`).val('').attr('disabled', 'disabled');
    $(`#medical_insurance_live_code-${type}`).val('').attr('disabled', 'disabled');
    $(`#medical_insurance_address-${type}`).val('').attr('disabled', 'disabled');
    $(`#hospital_code-${type}`).val('').attr('disabled', 'disabled');
    $(`#is_long_date-${type}`).prop('checked', false).attr('disabled', 'disabled');
    $(`#insurance_five_consecutive_years-${type}`).val('').attr('disabled', 'disabled');
}

//Common Material js
function resetMaterialElement(form = '')
{
    $("#material_type_id-add").val('').trigger('change');
    $("#unit_id-add").val('').trigger('change');
    $("#method-add").val('').trigger('change');
    $('.insurance_code_input').hide();
    $('.insurance_unit_price_input').hide();
    resetForm(form);
}

$('.insurance_code_input').hide();
$('.insurance_unit_price_input').hide();
$('.use_insurance_checkbox').change(function(){
    if ($(this).is(':checked')) {
        $(this).val(1);
        $('.insurance_code_input').show();
        $('.insurance_unit_price_input').show();
    } else {
        $(this).val(0);
        $('.insurance_code_input').hide();
        $('.insurance_unit_price_input').hide();
    }
});

// Toast popup alert
function toastAlert(title, body, type)
{
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr[type](title)
}

// Format name
function formatFullName(inputVal) {
    // Xóa các khoảng trắng dư thừa ở đầu chuỗi
    inputVal = inputVal.trimStart();

    // Chuyển đổi chuỗi thành viết thường và chia thành mảng các từ
    var words = inputVal.toLowerCase().split(/\s+/);

    // Chuyển đổi chữ cái đầu tiên của từng từ thành chữ hoa
    for (let i = 0; i < words.length; i++) {
        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
    }

    // Ghép lại thành chuỗi mới với dấu cách giữa các từ
    return words.join(" ");
}

// Reset datetimepicker
function resetDateTimePicker(element) {
    element.data("datetimepicker").destroy();
    element.datetimepicker({
        format: "DD/MM/YYYY",
        locale: 'vi',
        language: 'vi',
        useCurrent: false,
    });
}
//End common Material js

// append image for editor when create or update data
function appendListImageAddUpdate(files, element, type, message)
{
    const fetchPromises = [];
    const image_upload = [];
    const image = $('.note-editable').find('img');
    let apiUpload = API_UPLOAD;

    if (type == 'edit') {
        apiUpload = API_UPLOAD_EDIT;
        let id = $('.open-edit-modal').data('id');
        apiUpload = apiUpload.replace(":id", id);
    }
    // const URL =
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
                selector: element,
                url: apiUpload,
                file_image: image_upload,
                update_content: type == 'edit' ? true : false,
                swal_success: message
            });
        })
        .catch(error => {
            console.error('Error fetching images:', error);
        });
}

function autoFillHospital(type, hospital_code)
{
    $.ajax({
        url: API_SUGGEST_HOSPITAL,
        type: 'GET',
        data: {
            hospital_code: hospital_code,
        },
        beforeSend: () => {
            $('.loading').hide()
        },
        success: function (response) {
            if (response !== null && response.name !== '') {
                $(`#medical_insurance_address-${type}`).val(response.name);
            }
        }
    });
}
