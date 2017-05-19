
$(function () {

    // general linked pickers for times
    $('#start_time_picker').datetimepicker({
        format: 'HH:mm',
        showClear: true
    });
    $('#end_time_picker').datetimepicker({
        format: 'HH:mm',
        useCurrent: false, //Important! See issue #1075
        showClear: true
    });
    $("#start_time_picker").on("dp.change", function (e) {
        $('#end_time_picker').data("DateTimePicker").minDate(e.date);
    });
    $("#end_time_picker").on("dp.change", function (e) {
        $('#start_time_picker').data("DateTimePicker").maxDate(e.date);
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


    // select the day for the booking
    // TODO: on initial load, set disabled days
    // TODO: on change, ajax retrieve available time ranges for this day
    $('#booking-day').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: moment({hour: 0})
    });
    $('#booking-day').on("dp.change", function(e) {
        updateAvailableTimes(e);
    });

    $('#booking-start-time').datetimepicker({
        format: 'HH:mm'
    });

    $('#booking-end-time').datetimepicker({
        format: 'HH:mm'
    });


    $("#booking-start-time").on("dp.change", function (e) {
        var end_picker = $('#booking-end-time').data("DateTimePicker");

        end_picker.minDate(false);

        // need to call moment() on the dates here to clone them, otherwise
        // future mutations carry through... *facepalm javascript
        var start_date = moment(e.date);

        if (end_picker.date() === null) {
            end_picker.date(start_date);
        } else {
            if (end_picker.date() < start_date) {
                end_picker.date(start_date);
            }
        }

        end_picker.minDate(start_date);
    });


});


// function to retrieve available times for booking equipment on a particular
// day
function updateAvailableTimes(e) {
    var date = e.date;

    var equip_id = $('#equip_id').val();
    var query_date = date.format('YYYY-MM-DD');

    $.getJSON('/book/' + equip_id + '/available/' + query_date, function (obj) {
        var data = obj.data;
        console.log(data);
        var times = data.times;

        // TODO: format data for display

        var html = '';
        for (var i = 0; i < times.length; i++) {
            var time = times[i];
            html += '<p>' + time.start + ' to ' + time.end + '</p>';
        }

        var container = $('#available-times');
        container.html(html);

        // display opening hours on the day
        var hours_template = Handlebars.compile($('#opening-hours-template').html());
        var msg = null;
        if (data.opening_hours.length === 0) {
            msg = 'Not open on ' + data.date;
        }
        var context = {
            opening_hours: data.opening_hours,
            msg: msg
        };
        $('#opening-hours').html(hours_template(context));

    })
      .fail( function(e) {
          console.log('request failed!');
          console.log(e);
      });
}
