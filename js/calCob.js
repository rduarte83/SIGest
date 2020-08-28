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
        initialView: 'timeGridDay',
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
            }
        },
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        expandRows: true,
        events: '../php/fetchCalCob.php',
        themeSystem: 'bootstrap',
        editable: true,
        selectable: true,
        eventClick: function (info) {
            localStorage.setItem("vis_id", info.event.id);
            window.location.href = "../html/editCob.php?op=cal";
        },
        select: function (info) {
            console.log(info);
            var start = moment(info.start).format("YYYY-MM-DDTHH:MM:SS");
            var end = moment(info.end).format("YYYY-MM-DDTHH:MM:SS");
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