function createDT() {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/queries.php",
            type: "POST",
            data: {
                op: 'fetchVisPen'
            },
        },
        createdRow: function (row, data) {
            console.log(data);
            //86400000 - 1 day in ms")
            if (Math.round((Date.now() - new Date(data[2]).getTime()) / 86400000) >= 2)
                $(row).addClass('red');
        },
        dom: 'Bfrtip',
        buttons: {
            buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Imprimir',
                },
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Exportar p/PDF',
                },
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Exportar p/Excel',
                },
                {
                    text: '<i class="fa fa-plus" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Nova Visita',
                    action: function () {
                        $('#new').modal('show')
                    }
                },
                {
                    text: 'Hoje',
                    className: 'btn btn-default',
                    titleAttr: 'Hoje',
                    action: function () {
                        $.ajax({
                            url: '../php/queries.php',
                            type: 'POST',
                            data: {
                                op: 'fetchVisPenToday'
                            }
                        });
                    }
                }
            ],
        },
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
};

$(document).ready(function () {
    createDT();
});


