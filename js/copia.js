$(document).on('click','.details', function () {
    var contrato_id = $(this).attr("data-id");
    localStorage.setItem("contrato_id", contrato_id);
});

$(document).on('click','.delete', function () {
    var contrato_id = $(this).attr("data-id");
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
                url: '../php/copia.php',
                type: 'POST',
                data: {
                    op: 'delCopia',
                    contrato_id: contrato_id
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

$(document).on('click','.edit', function () {
    var contrato_id = $(this).attr("data-id");
    localStorage.setItem("contrato_id", contrato_id);
});

$(document).ready(function () {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/copia.php",
            type: "POST",
            data: {
                op: 'fetchCopia'
            }
        },
        createdRow: function (row, data) {
            //86400000 - 1 day in ms")
            if (Math.round((Date.now() - new Date(data[4]).getTime()) / 86400000) >= 90)
                $(row).addClass('red');
        },
        dom: 'Bfrtip',
        columnDefs: [
            {"visible": false, "targets": [6,7,8,9]}
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
                    titleAttr: 'Novo Contrato',
                    action: function () {
                        $('#new').modal('show')
                    }
                },
                {
                    text: '<i class="fa fa-check" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Nova Contagem',
                    action: function () {
                        $('#newCount').modal('show')
                    }
                }
            ],
        },
        responsive: true,
        autoWidth: false,
        contentType: false,
        processData: false,
        stateSave: true,
        language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
    });
});