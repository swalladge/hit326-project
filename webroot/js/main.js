
$(function () {
    $('.date-picker').datetimepicker({
        viewMode: 'days',
        format: 'YYYY-MM-DD',
        showClear: true
    });

    $('#start_time').datetimepicker({
        format: 'LT',
        showClear: true
    });
    $('#end_time').datetimepicker({
        format: 'LT',
        useCurrent: false, //Important! See issue #1075
        showClear: true
    });
    $("#start_time").on("dp.change", function (e) {
        $('#end_time').data("DateTimePicker").minDate(e.date);
    });
    $("#end_time").on("dp.change", function (e) {
        $('#start_time').data("DateTimePicker").maxDate(e.date);
    });

    $('#start_date').datetimepicker({
        showClear: true
    });
    $('#end_date').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        showClear: true
    });
    $("#start_date").on("dp.change", function (e) {
        $('#end_date').data("DateTimePicker").minDate(e.date);
    });
    $("#end_date").on("dp.change", function (e) {
        $('#start_date').data("DateTimePicker").maxDate(e.date);
    });

});


