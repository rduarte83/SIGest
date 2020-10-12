$(document).on('click','.edit', function () {
    var id = $(this).attr("data-id");
    localStorage.setItem("id", id);
});

$(document).on('click','.delete', function () {
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
                url: '../php/sw.php',
                type: 'POST',
                data: {
                    op: 'delSw',
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

$(document).ready(function () {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/sw.php",
            type: "POST",
            data: {
                op: 'fetchSw'
            }
        },
        createdRow: function (row, data) {
            console.log(data);
            //86400000 - 1 day in ms")
            if (Math.round((Date.now() - new Date(data[6]).getTime()) / 86400000) >= 180 && data[2] != 'ZoneSoft')
                $(row).addClass('red');
        },
        order: [[6, 'asc']],
        dom: 'Bfrtip',
        buttons: {
            buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Imprimir'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                    className: 'btn btn-default',
                    titleAttr: 'Exportar p/PDF'
                },
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                    className: 'btn btn-default',
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