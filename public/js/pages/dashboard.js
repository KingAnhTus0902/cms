$(document).ready(function () {
    $.ajax({
        type: 'GET',
        url: API_LIST,
        success: function (response) {
            console.log(response.revenueMedical);
            var names = response
            $("#total_curent_patient").html(names.totalPatient);
            $("#total_curent_examination").html(names.totalExamination);
            $("#total_patient_last_month").html(names.totalPatientLastMonth);
            $("#total_examination_last_month").html(names.totalExaminationLastMonth);
            var area = new Morris.Area({
                element: 'revenue-chart',
                data: names.revenueMedical,
                xkey: 'month',
                ykeys: ['price'],
                labels: ['Tổng tiền'],
                lineColors: ['#a0d0e0'],
                hideHover: 'auto'
            });
            var line = new Morris.Line({
                element: 'line-chart',
                resize: true,
                data: names.revenueMedicine,
                xkey: 'month',
                ykeys: ['price'],
                labels: ['Doanh thu'],
                lineColors: ['#efefef'],
                lineWidth: 2,
                hideHover: 'auto',
                gridTextColor: '#fff',
                gridStrokeWidth: 0.4,
                pointSize: 4,
                pointStrokeColors: ['#efefef'],
                gridLineColor: '#efefef',
                gridTextFamily: 'Open Sans',
                gridTextSize: 10
            });

        }
    });
});
$(function () {
    'use strict';
    $('.connectedSortable').sortable({
        placeholder: 'sort-highlight',
        connectWith: '.connectedSortable',
        handle: '.box-header, .nav-tabs',
        forcePlaceholderSize: true,
        zIndex: 999999
    });
    $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');
    $('.box ul.nav a').on('shown.bs.tab', function () {
        area.redraw();
        donut.redraw();
        line.redraw();
    });
});
