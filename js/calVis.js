var calendar;

function updEvents(info) {
    var start = moment(info.event.start).format("YYYY-MM-DD HH:MM:SS");
    var end = moment(info.event.end).format("YYYY-MM-DD HH:MM:SS");
    var id = info.event.id;

    console.log(info.event.start);
    console.log(info.event.end);

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
}

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    function cal(event) {
        calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            initialView: 'timeGridWeek',
            slotMinTime: '09:00:00',
            slotMaxTime: '19:00:00',
            locale: 'pt-pt',
            weekends: false,
            'customButtons': {
                print: {
                    text: 'Imprimir',
                    click: function () {
                        window.print();
                    },
                    bootstrapFontAwesome: 'fa-print'
                },
                new: {
                    text: 'Nova Visita',
                    click: function () {
                        $('#new').modal('show')
                    },
                    bootstrapFontAwesome: 'fa-plus'
                }
            },
            headerToolbar: {
                left: 'prev,next today new',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek print'
            },
            expandRows: true,
            events: event,
            themeSystem: 'bootstrap',
            editable: true,
            eventDataTransform: function (eventData) {
                var selectedDate = moment(eventData.start, 'YYYY-MM-DD');
                var now = moment(new Date(), 'YYYY-MM-DD');
                var dif = selectedDate.diff(now, 'weeks');
                if (dif < 0) {
                    eventData.editable = false;
                }
            },
            selectable: true,
            eventClick: function (info) {
                localStorage.setItem("vis_id", info.event.id);
                //Check QVis
                $.ajax({
                    url: "../php/queries.php",
                    type: "post",
                    data: {
                        op: 'checkQVis',
                        id: info.event.id
                    },
                    success: function (dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        var res = dataResult.data[0];
                        if (res[0] == null) {
                            //prompt("Editar evento:", info.event.title);
                        }
                        else window.location.href = "../html/editVis.php?op=cal";
                    }
                })
            },
            select: function (info) {
                var start = moment(info.start).format("YYYY-MM-DDTHH:mm:SS");
                var end = moment(info.end).format("YYYY-MM-DDTHH:mm:SS");

                var event = prompt("Insira o assunto:");

                if (event) {
                    <!-- AddQuickVisita -->
                    end = moment(info.end).add(1, 'h').format("YYYY-MM-DDTHH:mm:SS");
                    $.ajax({
                        url: "../php/queries.php",
                        type: "post",
                        data: {
                            op: 'addQVis',
                            start: start,
                            end: end,
                            event: event
                        },
                        success: function () {
                            calendar.refetchEvents();
                        }

                    });
                    calendar.render();
                }
            },
            eventResize: function (info) {
                updEvents(info);
            },
            eventDrop: function (info) {
                updEvents(info);
            },
        });
        calendar.render();
    }

    cal('../php/fetchCalVis.php');

    $("#com").on('change', function () {
        if ($("#com").val() == 999) {
            calendar.destroy();
            cal('../php/fetchCalVis.php');
        } else {
            calendar.destroy();
            cal({
                url: '../php/fetchCalVis.php',
                method: 'POST',
                extraParams: {
                    op: 'com',
                    com: $("#com option:selected").text()
                }
            });
        }
    });
});

$(document).ready(function () {
    //Fetch Comercial
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchComVis'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);
            $("#com").html("");
            $("#com").html('<option value="999">Todos</option>');
            $.each(dataResult.data, function () {
                $("#com").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });
});