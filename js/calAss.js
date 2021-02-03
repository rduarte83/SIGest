var calendar, tecnico;

function updEvents(info) {
    var start = moment(info.event.start).format("YYYY-MM-DD HH:MM:SS");
    var end = moment(info.event.end).format("YYYY-MM-DD HH:MM:SS");
    var id = info.event.id;
    var resources = info.event.getResources();
    var resourceIds = resources.map(function (resource) {
        return resource.id
    });
    if (info.oldResource != null) tecnico = info.newResource.id;
    else tecnico = resourceIds.toString();

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
}

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var role = $("#sessionRole").val();
    if (role === "admin") console.log(1); else console.log(0);
    calendar = new FullCalendar.Calendar(calendarEl, {
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
        initialView: 'resourceTimeGridWeek',
        slotMinTime: '09:00:00',
        slotMaxTime: '19:00:00',
        resources: [
            {id: 'rui', building: 'Rui'},
            {id: 'joao', building: 'João'},
            {id: 'celso', building: 'Celso'}
        ],
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
            right: 'dayGridMonth,resourceTimeGridWeek,resourceTimeGridDay,listWeek print'
        },
        expandRows: true,
        events: '../php/fetchCalAss.php',
        themeSystem: 'bootstrap',
        eventDataTransform: function (eventData) {
            if (role === "admin" || role === "administrativo") eventData.editable = true;
            else eventData.editable = false;
        },
        selectable: true,
        eventClick: function (info) {
            if (info.event.extendedProps.vis != "vis") {
                localStorage.setItem("ass_id", info.event.id);
                window.location.href = "../html/editAss.php?op=cal";
            }
        },
        select: function (info) {
            var start = moment(info.start).format("YYYY-MM-DDTHH:mm:SS");
            var end = moment(info.end).format("YYYY-MM-DDTHH:mm:SS");
            var id = info.resource.id;

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