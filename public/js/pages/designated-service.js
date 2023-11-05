
$(document).ready(function () {
    getDesignatedService();

    $(document).on("click", "#search-designated_service", function () {
        appendKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        let keyword = getKeyWordSearch();
        let page = 1;
        getDesignatedService(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = getKeyWordSearch();
        let sortColumn = $("span#hidden-sort-column").text();
        let sortType = $("span#hidden-sort-type").text();
        getDesignatedService(keyword, page, sortColumn, sortType);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        if($("#add-designated_service-form").find('input[name="service_unit_price"]').val()===''){
            $("#add-designated_service-form").find('input[name="service_unit_price"]').val(0);
        }
        let data = $("#add-designated_service-form").serialize();
        hideMessageValidate('#add-designated_service-form');
        createOrUpdate(api, data, nextAddDesignatedService);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        hideMessageValidate('#edit-designated_service-form');
        getData(api, id, appendDataEdit);
    }).on("hidden.bs.modal", '.modal', function (event) {
        $(".modal:visible").length && $("body").addClass("modal-open");
    });

    $(document).on("click", ".edit", function () {
        let id = $(this).data('id');
        let data = {
            id: id,
            code: $('#code-edit').val(),
            name: $('#name-edit').val(),
            description: $('#description-edit').val(),
            room_id: $('#room_id-edit').val(),
            service_unit_price: $('#service_unit_price-edit').val(),
            specialist: $('#specialist-edit').val(),
            type_surgery: $('#type_surgery-edit').val(),
        };
        var api = API_UPDATE;
        hideMessageValidate('#edit-designated_service-form');
        createOrUpdate(api, data, nextEditDesignatedService);
    });

    $(document).on("click", ".delete-btn", function () {
        swal({
            title: `Bạn có chắc chắn muốn xóa dịch vụ này?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ["Hủy", "OK"],
        })
            .then((willDelete) => {
                if (willDelete) {
                    let api = API_DELETE;
                    let id = $(this).data('id');
                    let data = {id: id};
                    createOrUpdate(api, data, nextDeleteDesignatedService);
                }
            });
    });

    $('#description-add').summernote({
        placeholder: 'Mô tả',
        tabsize: 2,
        height: 282,
        name: 'description',
        dialogsInBody: true,
        callbacks: {
            onImageUpload: (files) => appendListImageAddUpdate(files, '#description-add', 'add', UPLOAD_IMAGE_SUCCESS),
            onMediaDelete: (files) => appendListImageAddUpdate(files, '#description-add', 'add', DELETE_IMAGE_SUCCESS)
        }
    });

    $('#description-edit').summernote({
        placeholder: 'Mô tả',
        tabsize: 2,
        height: 282,
        name: 'description',
        dialogsInBody: true,
        callbacks: {
            onImageUpload: (files) => appendListImageAddUpdate(files, '#description-edit', 'edit', UPLOAD_IMAGE_SUCCESS),
            onMediaDelete: (files) => appendListImageAddUpdate(files, '#description-edit', 'edit', DELETE_IMAGE_SUCCESS)
        }
    });

    $(document).on("click", ".open-add-modal", function (e) {
        $('#description-add').summernote('code', '');
    }).on("hidden.bs.modal", '.modal', function (event) {
        $(".modal:visible").length && $("body").addClass("modal-open");
    });
})

$(document).on("click", ".sorting", function () {
    let sortColumn = $(this).data('column-name');
    let sortType = sort($(this));
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getDesignatedService(keyword, page, sortColumn, sortType);
});

function getDesignatedService(keyword = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextGetDesignatedService);
}

function searchDesignatedService() {
    let sortColumn = $("span#hidden-sort-column").text();
    let sortType = $("span#hidden-sort-type").text();
    let keyword = getKeyWordSearch();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getDesignatedService(keyword, page, sortColumn, sortType);
}


function nextGetDesignatedService(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-designated_service').modal('show');
    let item = data.data;
    let type = 'edit';
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            if ($(`#${key}-${type}`).is('select')) {
                $(`#${key}-${type}`).val(item[key]).trigger('change');
            }
            else if (key == 'description') {
                $('#description-edit').summernote('reset');
                $('#description-edit').summernote('code', item[key])
            }
            else {
                $(`#${key}-${type}`).val(item[key]);
            }
        }
    }
}


function nextAddDesignatedService(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-designated_service').modal('hide');
        $('#add-designated_service-form')[0].reset();
        hideMessageValidate('#add-designated_service-form');
        toastAlert(data.message, "", "success");
        searchDesignatedService();
    }
}

function nextEditDesignatedService(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-designated_service').modal('hide');
        hideMessageValidate('#edit-designated_service-form');
        toastAlert(data.message, "", "success");
        searchDesignatedService();
    }
}

function nextDeleteDesignatedService(data) {
    toastAlert(data.message, "", "success");
    searchDesignatedService();
}

function getKeyWordSearch () {
    let keywordSearchType = $("#input-search-type_id-hidden").val();
    let keywordSearchName = $("#input-search-name-hidden").val();
    return {
        specialist: keywordSearchType,
        name: keywordSearchName,
    }
}
function appendKeyWordSearch () {
    let keywordSearchType = $("#input-search-type_id").val();
    let keywordSearchName = $("#input-search-name").val();
    $("#input-search-type_id-hidden").val(keywordSearchType);
    $("#input-search-name-hidden").val(keywordSearchName);
}


function resetDesignatedServiceForm(form = '')
{
    $('#description-add').summernote('reset');
    $('#description-add').summernote('code', '');
    resetForm(form);
}
