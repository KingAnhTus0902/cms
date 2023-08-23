$(document).ready(function () {
    getDataAppend();

    $('#main_disease_name').keyup(delay(function (event) {
        let key_press = event.keyCode;
        setTimeoutInput('main', key_press);
    }, 500));
    $('#side_disease_name').keyup(delay(function (event) {
        let key_press = event.keyCode;
        setTimeoutInput('side', key_press);
    }, 500));

    $(document).on('click', 'li a.main_disease-suggest', function () {
        selectDiseases('main', this)
    });

    $(document).on('click', 'li a.side_disease-suggest', function () {
        selectDiseases('side', this)
    });

    function delay(callback, ms) {
        var timer = 0;
        return function() {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }
})

function nextUpdateDisease(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        toastAlert(data.message, "", "success");
        getDataAppend();
    }
}

function getDataDisease(api, id, appendDataSuggestDisease, element) {
    $.ajax({
        url: api,
        type: 'GET',
        data: {
            id
        },
        beforeSend: function() {
            $('.loading').show();
        },
        complete: function(){
            $('.loading').hide();
        },
        success: function (response) {
            appendDataSuggestDisease(response, element);
        },
        error: function (request, error) {
            errorFunction(request);
        }
    });
}

function appendDataSuggestDisease(data, element) {
    $(`#${element}_disease_name-list-suggest`).hide();
    $(`#${element}_disease_name`).val(data.name)
    $(`#${element}_disease_id`).val(data.id)
    $(`#${element}_disease_code`).val(data.code)
    saveDiseases();
}

function getListSuggest(query, element) {
    let html = "";
    if(query !== "") {
        $.ajax({
            url: API_SUGGEST_DISEASE_NAME,
            type: 'GET',
            data: {
                query: query
            },
            beforeSend: () => {
                $('.loading').hide()
            },
            success: function (response) {
                if (response.length > 0) {
                    html = `<ul class="dropdown-menu" id="${element}-suggest"
                        style="display:block; position:relative; width:100%; max-height: 560px; overflow-y: scroll;">`;
                    response.forEach((v, index) => {
                        html += `<li class="work-break" data-key=` + index + `><a class="dropdown-item ${element}_disease-suggest"
                            href="#disease_of_medical_session"` +
                            ' style="padding: 3px 20px; white-space: break-spaces;" data-id=' + v.id +
                            ' data-name=' + v.name + ' data-code=' + v.code + '>'
                            + 'Mã bệnh: ' + v.code + '</br>'
                            + 'Tên bệnh: ' + v.name
                            +'<hr>' +
                            '</a></li>'
                    });
                }
                $(`#${element}_disease_name-list-suggest`).fadeIn().html(html);
                $(`#${element}-suggest li:first`).addClass('focus');
            }
        });
    } else {
        $(`#${element}_disease_name-list-suggest`).hide();
    }
}

function getDataAppend() {
    let api = API_GET_DISEASES;
    let id = $('#medical_session_id').val();
    $.ajax({
        url: api,
        type: 'GET',
        data: {
            id: id
        },
        beforeSend: function() {
            $('.loading').show();
        },
        complete: function(){
            $('.loading').hide();
        },
        success: function (response) {
            appendDataDisease(response.data[0], 'main');
            if (response.data[1]) {
                appendDataDisease(response.data[1], 'side');
            }
        },
        error: function (request, error) {
            errorFunction(request);
        }
    });
}

function appendDataDisease(data, element) {
    let item = data;
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            $(`#${element}_${key}`).val(item[key])
        }
    }
    if ($('#main_disease_code').val() === '') {
        $('input[id=side_disease_name]').attr('disabled', 'disabled');
    } else {
        $('input[id=side_disease_name]').removeAttr('disabled');
    }

    if ($('#main_disease_name').is(":disabled")) {
        $('input[id=side_disease_name]').attr('disabled', 'disabled');
    }
}

function saveDiseases() {
    let main_disease = $('#main_disease_code').val();
    let side_disease = $('#side_disease_code').val();
    let api = API_CREATE_OR_UPDATE_DISEASE;
    let data = {
        id: $('#medical_session_id').val(),
        main_disease: main_disease,
        side_disease: side_disease,
        mainDiseaseOfMedicalId: $('#main_id').val() ?? '',
        sideDiseaseOfMedicalId: $('#side_id').val() ?? ''
    };
    createOrUpdate(api, data, nextUpdateDisease);
}

function selectDiseases(element, disease_element)
{
    const data = {
        name: $(disease_element).data('name'),
        id: $(disease_element).data('id'),
        code: $(disease_element).data('code')
    }
    appendDataSuggestDisease(data, element);
}

function pressUpDown (focus, element, key_press, limit)
{
    let key_up = 38,
    key_down = 40,
    enter = 13;
    let key = Number(focus.attr('data-key')), result = key;
    $(`li[data-key=${result}]`).removeClass('focus');
    if (key_press === key_down && key <= limit - 2) {
        result = Number(key + 1);
    } if (key_press === key_up && key >= 1) {
        result = Number(key - 1);
    }
    $(`li[data-key=${result}]`).addClass('focus');
    scrollTop(result, element);
    if (key_press === enter) {
        selectDiseases(element, `li[data-key=${result}] a.${element}_disease-suggest`);
    }
}

function scrollTop(focus, element) {
    var container = $(`#${element}-suggest`),
    scrollTo = $(`#${element}-suggest li[data-key=${focus}]`);
    container.scrollTop(scrollTo.offset().top - container.offset().top + container.scrollTop());
}

function setTimeoutInput(element, key_press)
{
    if (key_press == 38 || key_press == 40 || key_press == 13) {
        var focus = $(`#${element}-suggest li.focus`);
        let limit = $(`#${element}-suggest li`).length;
        pressUpDown (focus, element, key_press, limit);
    } else {
        var key = $(`#${element}_disease_name`).val();
        getListSuggest(key, element);
        if ($(`#${element}_disease_name`).val() === '') {
            $(`#${element}_disease_code`).val('');
        }
    }
}
