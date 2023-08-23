@php
    use App\Constants\MaterialConstants;
@endphp

@if (auth()->user()->can('View-material'))
    <div id="detail-material" class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fas fa-eye"></i>
                        {{ __('label.material.modal_title_detail') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"></div>

                <div class="modal-footer justify-content-between">
                    <div class="col-md-12 no-padding text-right">
                        <button class="btn btn-danger btn-sm margin-top-5 text-left button-cancel" data-dismiss="modal"
                            onclick="resetMaterialElement('#add-material')">
                            <i class="fas fa-times"></i> {{ __('label.common.button.close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
