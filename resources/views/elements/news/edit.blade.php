<div id="edit-news" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.news.modal_title_edit') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-news-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">{{ __('label.news.field.title') }} <span
                                        class="text-red">(*)</span>
                                </label>
                                <input type="text" class="form-control form-control-sm input-form" id="title-edit" name="title">
                                <p id="title-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category-edit">{{ __('label.news.field.category') }}<span
                                        class="text-red">(*)</span></label>
                                <select id="category-edit" name="category" class="form-control">
                                </select>
                                <p id="category-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="short_description-edit">{{ __('label.news.field.short_description') }} <span
                                        class="text-red">(*)</span>
                                </label>
                                <textarea class="form-control input-form"
                                    id="short_description-edit"
                                    name="short_description"
                                    rows="3">
                                </textarea>
                                <p id="short_description-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">{{ __('label.news.field.thumbnail') }}</label>
                                <input id="thumbnail-edit"
                                    style="height: auto; padding: 5px"
                                    type="file"
                                    class="form-control form-control-sm thumbnail-preview"
                                    name="thumbnail"
                                >
                                <input id="thumbnail-edit-preview" type="file" name="thumbnail_preview" hidden>
                                <img id="thumbnail-edit-img-preview" src="#" alt="image"
                                    style="display: none; padding-top: 1rem" />
                                <p id="thumbnail-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">{{ __('label.news.field.content') }}<span
                                        class="text-red">(*)</span>
                                </label>
                                <textarea class="" name="content" id="content-edit"></textarea>
                                <p id="content-edit-error" class="error validate-error"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="col-md-12 no-padding text-right">
                    @if((auth()->user()->can('Edit-new')))
                        <button class="btn btn-primary btn-sm edit">
                            <i class="fa fa-save"></i> {{ __('label.common.button.save') }}
                        </button>
                    @endif
                    <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel"
                            data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
