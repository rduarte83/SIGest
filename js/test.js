var defaultEvents = [
    {
        // Monthly event
        id: 111,
        title: 'Meeting',
        start: '2000-01-01T00:00:00',
        className: 'scheduler_basic_event',
        repeat: 1
    },
];

// Any value represanting monthly repeat flag
var REPEAT_MONTHLY = 1;

$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    editable: true,
    defaultDate: '2017-02-16',
    eventSources: [defaultEvents],
    dayRender: function( date, cell ) {
        // Get all events
        var events = $('#calendar').fullCalendar('clientEvents').length ? $('#calendar').fullCalendar('clientEvents') : defaultEvents;
        // Start of a day timestamp
        var dateTimestamp = date.hour(0).minutes(0);
        var recurringEvents = new Array();

        // find all events with monthly repeating flag, having id, repeating at that day few months ago
        var monthlyEvents = events.filter(function (event) {
            return event.repeat === REPEAT_MONTHLY &&
                event.id &&
                moment(event.start).hour(0).minutes(0).diff(dateTimestamp, 'months', true) % 1 == 0
        });

        recurringEvents = monthlyEvents;

        $.each(recurringEvents, function(key, event) {
            var timeStart = moment(event.start);

            // Refething event fields for event rendering
            var eventData = {
                id: event.id,
                allDay: event.allDay,
                title: event.title,
                description: event.description,
                start: date.hour(timeStart.hour()).minutes(timeStart.minutes()).format("YYYY-MM-DD"),
                end: event.end ? event.end.format("YYYY-MM-DD") : "",
                url: event.url,
                className: 'scheduler_basic_event',
                repeat: event.repeat
            };

            // Removing events to avoid duplication
            $('#calendar').fullCalendar( 'removeEvents', function (event) {
                return eventData.id === event.id &&
                    moment(event.start).isSame(date, 'day');
            });
            // Render event
            $('#calendar').fullCalendar('renderEvent', eventData, true);
        });
    }
});