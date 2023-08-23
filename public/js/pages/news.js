$(document).ready(function () {
    getDepartment();
    getListCategory('add');
    $(document).on("click", ".open-add-modal", function (e) {
        $('#img-add-div').hide();
        $('#content-add').summernote('code', '');
    }).on("hidden.bs.modal", '.modal', function (event) {
        $(".modal:visible").length && $("body").addClass("modal-open");
    });

    $(document).on("click", "#search-news", function () {
        appendKeyWordSearch();
        searchDepartment()
    });

    $(document).on("click", "#search-news-clear", function () {
        $('#input-search-keyword-news').val('');
        $('#input-search-keyword-news-hidden').val('');
        $('#input-search-category-news').val('');
        $('#input-search-category-news-hidden').val('');
    });

    $(document).on("click", ".reset", function () {
        $('#content-add').summernote('reset');
        $('#content-add').summernote('code', '');
        resetForm('#add-news');
    });

    $(document).on("keyup", "#input-search-news", function (e) {
        if (e.keyCode === 13) {
            searchDepartment();
        }
    });

    $(document).on("click", ".page-link", function () {
        let page = $(this).data('id');
        let keyword = $("#input-search-news").val();
        let category = $("#input-search-category-news").val();
        getDepartment(keyword, category, page);
    });

    $(document).on("click", ".add", function () {
        let api = API_CREATE;
        var data = new FormData($("#add-news-form")[0]);
        hideMessageValidate('#add-news-form');
        createOrUpdateWithFile(api, data, nextAddDepartment);
    });

    $(document).on("click", ".open-edit-modal", function () {
        let id = $(this).data('id');
        var api = API_DETAIL;
        api = api.replace(":id", id);
        $('.edit').data('id', id);
        resetForm('#edit-news-form');
        getData(api, id, appendDataEdit);
    }).on("hidden.bs.modal", '.modal', function (event) {
        $(".modal:visible").length && $("body").addClass("modal-open");
    });

    $(document).on("click", ".edit", function () {
        let formData = new FormData()

        formData.append('id', $(this).data('id'));
        formData.append('title', $('#title-edit').val());
        formData.append('short_description', $('#short_description-edit').val());
        formData.append('category', $('#category-edit').val());
        formData.append('content', $('#content-edit').val());

        let thumbnail = $('#thumbnail-edit')[0].files[0];
        if (thumbnail != undefined) {
            formData.append('thumbnail', thumbnail);
        }
        var api = API_UPDATE;
        hideMessageValidate('#edit-news-form');
        createOrUpdateWithFile(api, formData, nextEditDepartment);
    });

    $(document).on("click", ".delete-btn", function () {
        swal({
            title: 'Bạn có chắc chắn muốn xóa tin này ?',
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
                    createOrUpdate(api, data, nextDeleteDepartment);
                }
            });
    });

    $('#content-add').summernote({
        placeholder: 'Nội dung',
        tabsize: 2,
        height: 282,
        name: 'content',
        dialogsInBody: true,
        callbacks: {
            onImageUpload: (files) => appendListImageAddUpdate(files, '#content-add', 'add', UPLOAD_IMAGE_SUCCESS),
            onMediaDelete: (files) => appendListImageAddUpdate(files, '#content-add', 'add', DELETE_IMAGE_SUCCESS)
        }
    });


    $('#content-edit').summernote({
        placeholder: 'Nội dung',
        tabsize: 2,
        height: 282,
        name: 'content',
        dialogsInBody: true,
        callbacks: {
            onImageUpload: (files) => appendListImageAddUpdate(files, '#content-edit', 'edit', UPLOAD_IMAGE_SUCCESS),
            onMediaDelete: (files) => appendListImageAddUpdate(files, '#content-edit', 'edit', DELETE_IMAGE_SUCCESS)
        }
    });

    $(document).on("change", ".thumbnail-preview", function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let file = e.target.files[0];
        if (typeof file !== 'undefined') {
            let dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            document.getElementById(`${id}-preview`).files = dataTransfer.files;
        }

        let filePreview = document.getElementById(`${id}-preview`).files[0];
        if (typeof filePreview !== 'undefined') {
            let reader = new FileReader();
            reader.onload = function (eventReader) {
                $(`#${id}-img-preview`).attr('src', eventReader.target.result).width(200).height(200);
            };
            reader.readAsDataURL(filePreview);

            document.getElementById(id).files = document.getElementById(`${id}-preview`).files;

            $(`#${id}-img-preview`).show();
        } else {
            $(`#${id}-img-preview`).hide();
        }
    });
})

$(document).on("click", ".sorting", function () {
    let sortColumn = $(this).data('column-name');
    let sortType = sort($(this));
    let keyword = $("#input-search-news").val();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    getDepartment(keyword, page, sortColumn, sortType);
});

function getDepartment(keyword = "", category = "", page = 1, sortColumn = "", sortType = "") {
    let api = API_LIST;
    let dataSearch = {
        keyword: keyword,
        category: category,
        page: page,
        sort_column: sortColumn,
        sort_type: sortType
    };
    getData(api, dataSearch, nextGetDepartment);
}

function searchDepartment() {
    let sortType = '';
    let keywordSearch = $("#input-search-keyword-news-hidden").val();
    let categorySearch = $("#input-search-category-news-hidden").val();
    let page = $("li.page-item.active ").find("a.page-link").data('id');
    if ($("#ordinal-number-news").hasClass("sorting_desc")) {
        sortType = 'desc';
    }
    let sortColumn = $("#ordinal-number-news").data('column-name');
    getDepartment(keywordSearch, categorySearch, page, sortColumn, sortType);
}


function nextGetDepartment(data) {
    $('#content-list').html(data);
}

function appendDataEdit(data) {
    $('#edit-news').modal('show');
    let item = data.data;
    let type = 'edit';
    getListCategory(type, item['category'])
    for (let key in item) {
        if (item.hasOwnProperty(key)) {
            if (key == 'thumbnail') {
                if (item[key]) {
                    $(`#thumbnail-${type}-img-preview`).attr('src', item[key]).width(200).height(200);
                    $(`#thumbnail-${type}-img-preview`).show();
                } else {
                    $(`#thumbnail-${type}-img-preview`).attr('src', '');
                    $(`#thumbnail-${type}-img-preview`).hide();
                }
            } else if (key == 'content') {
                $('#content-edit').summernote('reset');
                $('#content-edit').summernote('code', item[key]);
            } else $(`#${key}-${type}`).val(item[key]);
        }
    }
}


function nextAddDepartment(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('add', data.errors);
    } else {
        $('#add-news').modal('hide');
        $('#add-news-form')[0].reset();
        hideMessageValidate('#add-news-form');
        toastAlert(data.message, "", "success");
        searchDepartment();
    }
}

function nextEditDepartment(data) {
    if (data.code == HTTP_UNPROCESSABLE_ENTITY) {
        showMessageValidate('edit', data.errors);
    } else {
        $('#edit-news').modal('hide');
        hideMessageValidate('#edit-news-form');
        toastAlert(data.message, "", "success");
        searchDepartment();
    }
}

function nextDeleteDepartment(data) {
    toastAlert(data.message, "", "success");
    searchDepartment();
}

function getListCategory(type, category_id) {
    getData(API_LIST_CATEGORY, { category_id: category_id }, function (data) {
        $(`#category-${type}`).html(data);
        if (type == 'add')
            $('#input-search-category-news').append(data);
    })
}

function resetForm(form = '') {
    $(form).find(':input').each(function () {
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
                    break;
            }
        }
    });
    $(form).find('img').attr('src', '');
    $(form).find('img').hide();
    hideMessageValidate(form);
}

function appendKeyWordSearch () {
    let keyword = $("#input-search-keyword-news").val();
    let category = $("#input-search-category-news").val();
    $("#input-search-keyword-news-hidden").val(keyword);
    $("#input-search-category-news-hidden").val(category);
}
