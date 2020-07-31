var calendar;

function updEvents(info) {
    var start = moment(info.event.start).format("YYYY-MM-DD HH:MM:SS");
    var end = moment(info.event.end).format("YYYY-MM-DD HH:MM:SS");
    var id = info.event.id;
    var tecnico = info.newResource.id;

    $.ajax({
        type: 'post',
        url: '../php/updEvents.php',
        data: {
            op: 'updAss',
            id: id,
            start: start,
            end: end,
            tecnico: tecnico
        }
    });
};

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
        initialView: 'resourceTimeGridDay',
        slotMinTime: '09:00:00',
        slotMaxTime: '19:00:00',
        resources: [
            {id: 'Rui', building: 'Rui'},
            {id: 'João', building: 'João'}
        ],
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
            right: 'dayGridMonth,resourceTimeGridWeek,resourceTimeGridDay,listWeek print'
        },
        expandRows: true,
        events: '../php/fetchCalAss.php',
        themeSystem: 'bootstrap',
        editable: true,
        selectable: true,
        eventDurationEditable: true,
        eventClick: function (info) {
            localStorage.setItem("cal_id", info.event.id);
            window.location.href = "../html/editAss.php";
        },
        select: function (start, end) {
            console.log(start+" "+end);
            window.location.href = "../html/addAssist.php?op=cal";
        },
        eventResize: function (info) {
            updEvents(info);
        },
        eventDrop: function (info) {
            updEvents(info);
        }
    });
    calendar.render();
});

$(document).ready(function () {
});