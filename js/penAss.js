$(document).on('click', '.details', function () {
    var ass_id = $(this).attr("data-id");
    localStorage.setItem("ass_id", ass_id);
});

$(document).on('click', '.delete', function () {
    var ass_id = $(this).attr("data-id");
    Swal.fire({
        icon: 'info',
        position: 'top',
        title: 'Tem a certeza que deseja eliminar este registo?',
        text: 'Esta acção não pode ser revertida!',
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '../php/queries.php',
                type: 'POST',
                data: {
                    op: 'delAss',
                    ass_id: ass_id
                },
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        position: 'top',
                        title: 'Eliminado!',
                        text: 'Registo eliminado com sucesso!'
                    }).then(function () {
                        location.reload();
                    });
                }
            });
        }
    });
});

$(document).on('click', '.edit', function () {
    var ass_id = $(this).attr("data-id");
    localStorage.setItem("ass_id", ass_id);
});

$(document).on('click', '.fact', function () {
    var ass_id = $(this).attr("data-id");
    Swal.fire({
        icon: 'info',
        position: 'top',
        html: '<label for="swal-valor">Valor a facturar:</label>' +
            '<input id="swal-valor" class="swal2-input">' +
            '<label for="swal-fact">Número da Factura:</label>' +
            '<input id="swal-fact" class="swal2-input">',
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            var valor = $("#swal-valor").val();
            var fact = $("#swal-fact").val();

            $.ajax({
                url: '../php/queries.php',
                type: 'POST',
                data: {
                    op: 'addFact',
                    numFact: fact,
                    valor: valor,
                    ass_id: ass_id
                },
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        position: 'top',
                        title: 'Sucesso!'
                    }).then(function () {
                        location.reload();
                    });
                }
            });
        }
    });
});

$(document).ready(function () {
    var datatable = $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/queries.php",
            type: "POST",
            data: {
                op: 'fetchAss'
            },
        },
        stateSave: true,
        createdRow: function (row, data) {
            console.log(data);
            //86400000 - 1 day in ms")
            if (Math.round((Date.now() - new Date(data[8]).getTime()) / 86400000) >= 2 && data[13] == 'Pendente')
                $(row).addClass('red');
            if (data[12] == 'Aguarda Peças') $(row).addClass('orange');
            if (data[12] == 'Resolvido') $(row).addClass('yellow');
            if (data[13] == 'Sim') $(row).addClass('green');
            if (Math.round((Date.now() - new Date(data[8]).getTime()) / 86400000) >= 5 && data[11] == 'Resolvido')
                datatable.rows($(row)).remove();
        },
        columnDefs: [
            {visible: false, targets: [2,3,5]}
        ],
        order: [0, 'desc'],
        dom: 'Bfrtip',
        buttons: {
            buttons: [
                {
                    extend: 'print',
                    'text': '<i class="fa fa-print" aria-hidden="true"></i>',
                    'className': 'btn btn-default',
                    titleAttr: 'Imprimir'
                },
                {
                    extend: 'pdf',
                    'text': '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                    'className': 'btn btn-default',
                    titleAttr: 'Exportar p/PDF'
                },
                {
                    extend: 'excel',
                    'text': '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                    'className': 'btn btn-default',
                    titleAttr: 'Exportar p/Excel'
                },
                {
                    text: '<i class="fa fa-plus" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Nova Assistência',
                    action: function () {
                        $('#new').modal('show')
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
});


