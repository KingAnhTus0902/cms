<div class="modal fade" id="edit-prescription-medicine" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-edit"></i>
                    {{ __('label.dispense_medicine.modal_title_edit') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header" style="background-color: #ecf0f5">
                        <h3 class="card-title" style="font-size: 17px">
                            {{ __('label.prescription_of_medical_session.title') }}
                        </h3>
                    </div>
                    <div id="detail-prescription">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
