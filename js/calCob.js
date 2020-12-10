var calendar;

function updEvents(info) {
    var start = moment(info.event.start).format("YYYY-MM-DD HH:MM:SS");
    var end = moment(info.event.end).format("YYYY-MM-DD HH:MM:SS");
    var id = info.event.id;

    $.ajax({
        type: 'post',
        url: '../php/updEvents.php',
        data: {
            op: 'updCob',
            id: id,
            start: start,
            end: end
        }
    });
};

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
        initialView: 'timeGridWeek',
        slotMinTime: '09:00:00',
        slotMaxTime: '19:00:00',
        locale: 'pt-pt',
        weekends: false,
        customButtons: {
            print: {
                text: 'Imprimir',
                click: function () {
                    window.print();
                },
                bootstrapFontAwesome: 'fa-print'
            },
            new: {
                text: 'Nova Assistência',
                click: function () {
                    $('#new').modal('show')
                },
                bootstrapFontAwesome: 'fa-plus'
            },
        },
        headerToolbar: {
            left: 'prev,next today new',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek print'
        },
        expandRows: true,
        events: '../php/fetchCalCob.php',
        themeSystem: 'bootstrap',
        editable: false,
        eventDataTransform: function (eventData) {
            var selectedDate = moment(eventData.start, 'YYYY-MM-DD');
            var now = moment(new Date(), 'YYYY-MM-DD');
            var dif = selectedDate.diff(now, 'weeks');
            if (dif < 0 ) {
                eventData.editable = false;
            }
        },
        selectable: true,
        eventClick: function (info) {
            localStorage.setItem("vis_id", info.event.id);
            window.location.href = "../html/editCob.php?op=cal";
        },
        select: function (info) {
            console.log(info);
            var start = moment(info.start).format("YYYY-MM-DDTHH:mm:SS");
            var end = moment(info.end).format("YYYY-MM-DDTHH:mm:SS");
            var id = info.resource.id;
            window.location.href = "../html/addCob.php?op=cal&start="+start+"&end="+end+"&id="+id;
        },
        eventResize: function (info) {
            updEvents(info);
        },
        eventDrop: function (info) {
            updEvents(info);
        },
    });
    calendar.render();
});