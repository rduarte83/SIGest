$(document).on('click', '.details', function (e) {
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

function createDT() {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/queries.php",
            type: "POST",
            data: {
                op: 'fetchAss'
            },
        },
        columnDefs: [
            {visible: false, targets: [11,13,14]}
        ],
        order: [0, 'desc'],
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
};

$(document).ready(function () {
    createDT();

    //Fetch Client
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchCli'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#cli").html("");
            $("#cli").html('<option value="0">Todos</option>');
            $.each(dataResult.data, function () {
                $("#cli").append($("<option/>").val(this[0]).text(this[2]));
            });
        }
    });
});

$("#cli").on('change', function () {
    if ($.fn.dataTable.isDataTable('#table')) {
        $("#table").DataTable().destroy();
    }
    ;
    if ($("#cli").val() == 0) {
        createDT();
    } else {
        $("#table").DataTable({
            processing: true,
            ajax: {
                url: "../php/queries.php",
                type: "POST",
                data: {
                    cliente_id: $("#cli").val(),
                    op: 'fetchAssCli'
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
                language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
            }
        });
    }
});



