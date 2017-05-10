
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
        format: 'YYYY-MM-DD LT',
        showClear: true
    });
    $('#end_date').datetimepicker({
        format: 'LT',
        useCurrent: false, //Important! See issue #1075
        showClear: true
    });
    $("#start_date").on("dp.change", function (e) {
        var end_picker = $('#end_date').data("DateTimePicker");

        end_picker.minDate(false);
        end_picker.maxDate(false);

        // need to call moment() on the dates here to clone them, otherwise
        // future mutations carry through... *facepalm javascript
        var start_date = moment(e.date);
        var end_date = moment(e.date).endOf('day');

        if (end_picker.date() === null) {
            end_picker.date(start_date);
        } else {
            if (end_picker.date() < start_date || end_picker.date() > end_date) {
                end_picker.date(start_date);
            }
        }

        end_picker.minDate(start_date);
        end_picker.maxDate(end_date);

    });
    $("#end_date").on("dp.change", function (e) {
        // $('#start_date').data("DateTimePicker").maxDate(e.date);
    });

});


