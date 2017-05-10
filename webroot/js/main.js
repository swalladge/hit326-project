
$(function () {
    $('.date-picker').datetimepicker({
        viewMode: 'days',
        format: 'YYYY-MM-DD',
        showClear: true
    });

    $('#start_time').datetimepicker({
        format: 'HH:mm',
        showClear: true
    });
    $('#end_time').datetimepicker({
        format: 'HH:mm',
        useCurrent: false, //Important! See issue #1075
        showClear: true
    });
    $("#start_time").on("dp.change", function (e) {
        $('#end_time').data("DateTimePicker").minDate(e.date);
    });
    $("#end_time").on("dp.change", function (e) {
        $('#start_time').data("DateTimePicker").maxDate(e.date);
    });


    // date/time linked pickers for booking equipment
    $('#booking_start_date').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        showClear: true
    });
    $('#booking_end_date').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        useCurrent: false, //Important! See issue #1075
        showClear: true
    });
    $("#booking_start_date").on("dp.change", function (e) {
        var end_picker = $('#booking_end_date').data("DateTimePicker");

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
    $("#booking_end_date").on("dp.change", function (e) {
    });

    // for general linked date/time pickers
    $('#start_date_picker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        showClear: true
    });
    $('#end_date_picker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        useCurrent: false, //Important! See issue #1075
        showClear: true
    });
    $("#start_date_picker").on("dp.change", function (e) {
        var end_picker = $('#end_date_picker').data("DateTimePicker");

        var start_date = moment(e.date);

        if (end_picker.date() === null || end_picker.date() < start_date) {
            end_picker.date(start_date);
        }

        end_picker.minDate(start_date);

    });
    $("#end_date_picker").on("dp.change", function (e) {
    });

});


