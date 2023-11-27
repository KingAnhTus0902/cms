@extends('layouts.admin')

@section('content')
    <div id="content-list">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="total_curent_patient"></h3>
                        <p>{{ __('label.medical_session.patient') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">{{ __('label.medical_session.total_curent_patient') }}</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="total_curent_examination"></h3>
                        <p>{{ __('label.medical_session.medical_visits') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <a href="#"
                        class="small-box-footer">{{ __('label.medical_session.total_curent_examination') }}</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="total_patient_last_month"></h3>
                        <p>{{ __('label.medical_session.patient') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="#" class="small-box-footer">{{ __('label.medical_session.total_patient_last_month') }}</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="total_examination_last_month"></h3>
                        <p>{{ __('label.medical_session.medical_visits') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-fw fa-chart-pie"></i>
                    </div>
                    <a href="#" class="small-box-footer">{{ __('label.medical_session.total_examination_last_month') }}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <section class="col-lg-12 connectedSortable ui-sortable">
                <div class="card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            {{ __('label.payment.sales_report') }}
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">
                                        {{ __('label.common.field.month') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="revenue-chart"
                                style="position: relative; height: 300px;">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="revenue-chart-canvas" height="300"
                                    style="height: 300px; display: block; width: 901px;" width="901"
                                    class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                <canvas id="sales-chart-canvas" height="0"
                                    style="height: 0px; display: block; width: 0px;" class="chartjs-render-monitor"
                                    width="0"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.min.js') }}"></script>
    <script>
        const API_TOKEN = '{!! csrf_token() !!}';
        const API_LIST = '{{ route('admin.dashboard') }}';
        const FAIL_MESSAGE = '{{ __('messages.SM-003') }}';
    </script>
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>
@endpush
