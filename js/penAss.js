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
        title: 'Insira o número da factura',
        input: 'text',
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '../php/queries.php',
                type: 'POST',
                data: {
                    op: 'addFact',
                    numFact: result.value,
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
    var datable = $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/queries.php",
            type: "POST",
            data: {
                op: 'fetchAss'
            },
        },
        createdRow: function (row, data, dataIndex) {
            console.log(data);
            if (Math.round((Date.now() - new Date(data[8]).getTime()) / 86400000) >= 2 && data[13] == 'Pendente')
                $(row).addClass('red');
            if (data[11] == 'Aguarda Peças') $(row).addClass('orange');
            if (data[11] == 'Resolvido') $(row).addClass('yellow');
            if (data[12] == 'Sim') $(row).addClass('green');
        },
        columnDefs: [
            {visible: false, targets: [5, 6, 7]}
        ],
        order: [8, 'desc'],
        dom: 'Bfrtip',
        buttons: {
            buttons: [
                {
                    extend: 'print',
                    'text': '<i class="fa fa-print" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
                },
                {
                    extend: 'pdf',
                    'text': '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
                },
                {
                    extend: 'excel',
                    'text': '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                    "className": 'btn btn-default btn-xs'
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


