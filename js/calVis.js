function updEvents(info) {
    var start = moment(info.event.start).format("YYYY-MM-DD HH:MM:SS");
    var end = moment(info.event.end).format("YYYY-MM-DD HH:MM:SS");
    var id = info.event.id;

    $.ajax({
        type: 'post',
        url: '../php/updEvents.php',
        data: {
            op: 'updVis',
            id: id,
            start: start,
            end: end
        }
    });
};

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
        initialView: 'timeGridDay',
        slotMinTime: '09:00:00',
        slotMaxTime: '19:00:00',
        locale: 'pt-pt',
        customButtons: {
            print: {
                text: 'Imprimir',
                click: function () {
                    window.print();
                },
                bootstrapFontAwesome: 'fa-print'
            }
        },
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        expandRows: true,
        events: '../php/fetchCalVis.php',
        themeSystem: 'bootstrap',
        editable: true,
        selectable: true,
        eventDurationEditable: true,
        eventResize: function (info) {
            updEvents(info);
        },
        eventDrop: function (info) {
            updEvents(info);
        }
    });
    calendar.render();
});