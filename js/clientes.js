var id;

$(document).on('click', '.edit', function () {
    id = $(this).attr("data-id");
    localStorage.setItem("id", id);
});

$(document).on('click', '.obs', function () {
    id = $(this).attr("data-id");
    $.ajax({
        url: '../php/queries.php',
        type: 'POST',
        data: {
            op: 'fetchObs',
            id: id
        },
        success: function (dataResult) {
            dataResult = JSON.parse(dataResult);
            $("#obs").text(dataResult.data[0]);
        }
    });
});

$(document).on('click', '.delete', function () {
    id = $(this).attr("data-id");
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
                    op: 'delCli',
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

$("#addForm").on('submit', function (e) {
    $("#id").val(id);

    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
    })
});

$(document).ready(function () {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/queries.php",
            type: "POST",
            data: {
                op: 'fetchCli'
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
                    titleAttr: 'Novo Cliente',
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