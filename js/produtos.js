$(document).on('click','.edit', function () {
    var id = $(this).attr("data-id");
    localStorage.setItem("id", id);
});

$(document).on('click','.delete', function (e) {
    var id = $(this).attr("data-id");
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
                    op: 'delProd',
                    id: id
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

function createDT() {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/queries.php",
            type: "POST",
            data: {
                op: 'fetchProd'
            }
        },
        dom: 'Bfrtip',
        columnDefs: [
            // {"visible": false, "targets": 0}
        ],
        buttons: {
            buttons: [
                {
                    extend: 'print',
                    'text': '<i class="fa fa-print" aria-hidden="true"></i>',
                    "className": 'btn btn-default',
                    titleAttr: 'Imprimir'
                },
                {
                    extend: 'pdf',
                    'text': '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                    "className": 'btn btn-default',
                    titleAttr: 'Exportar p/PDF'
                },
                {
                    extend: 'excel',
                    'text': '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                    "className": 'btn btn-default',
                    titleAttr: 'Exportar p/Excel'
                },
                {
                    text: '<i class="fa fa-plus" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Novo Produto',
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
}

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
            console.log(dataResult);
            $("#cli").html("");
            $("#cli").html('<option value="0">Todos</option>');
            $.each(dataResult.data, function () {
                $("#cli").append($("<option/>").val(this[0]).text(this[2]));
            });
        }
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
                        op: 'fetchProdCli',
                        cliente_id: $("#cli").val()
                    },
                },
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
        }
    });
});