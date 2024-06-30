@php
    use App\Constants\MedicalSessionConstants;
@endphp
<style>
    .display-center {
        display: flex;
        justify-content: center;
    }
</style>
<div class="card-header">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="card-title">{{ __('title.report.insurance') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="{{ __('label.common.button.search') }}">
                    <i class="fa fa-filter active"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="card-body" style="display: block;">
    <form id="search-master-form">
        <div class="col-md-12">
            <div class="row">
                <label class="col-md-2 offset-md-2 control-label text-sm-left text-md-right" for="input-search-time">
                    {{ __('label.medical_session.search.title.time') }}
                </label>
                <div class="col-md-4">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="input-search-time">
                        <input type="hidden" id="input-search-time-hidden" value="">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1 block-button-card-outline">
        <div class="btn-group pull-left">
                <button class="btn btn-info submit btn-sm btn-edit-size" id="search">
                    <i class="fa fa-search"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.search') }}
                </button>
            </div>
            <div class="btn-group pull-left undo-card-outline">
                <button class="btn btn-default btn-sm btn-edit-size" onclick="resetFilter('#search-master-form')">
                    <i class="fa fa-undo"></i>
                    &nbsp;&nbsp;{{ __('label.common.button.reset') }}
                </button>
            </div>
            <div class="btn-group pull-left" style="margin-left:10px">
                <a class="btn btn-info submit btn-sm btn-edit-size" onclick="exportInsurance()">
                    <i class="far fa-file-excel"></i>
                    &nbsp;&nbsp;Xuất Excel
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function exportInsurance(){
        var startDate = $('#startDateSearch').val();
        var endDate = $('#endDateSearch').val();
        var url = "/admin/bao-cao-benh-nhan/xuat-file-bao-cao-benh-nhan-bh?start=" + startDate+ "&end="+ endDate;
        window.location.href = url;
    }
</script>
