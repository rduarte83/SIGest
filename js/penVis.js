$(document).on('click', '.delete', function () {
    $("a").removeClass("edit");

    var vis_id = $(this).attr("data-id");
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
                    op: 'delVis',
                    vis_id: vis_id
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
    var vis_id = $(this).attr("data-id");
    localStorage.setItem("vis_id", vis_id);
});


$(document).ready(function () {
    if ($.fn.dataTable.isDataTable('#table')) {
        $('#table').DataTable();
    } else {
        var table = $("#table").DataTable({
            processing: true,
            ajax: {
                url: "/sigest/php/queries.php",
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
            columnDefs: [
                {visible: false, targets: 4}
            ],
            order: [2 , "asc"],
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
                            var tmp = table.ajax.url();
                            if (tmp == "/sigest/php/queries.php") {
                                table.button(4).text("Todos");
                                table.ajax.url("/sigest/php/fetchVisToday.php");
                                table.ajax.reload();
                            } else {
                                table.button(4).text("Hoje");
                                table.ajax.url("/sigest/php/queries.php");
                                table.ajax.reload();
                            }
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
        $("#table tbody").on('click', 'tr', function () {
            var data = table.row(this).data();
            localStorage.setItem("vis_id", data[0]);
            if (location.pathname.includes("penVis")) {
                location.href = "/sigest/html/editVis.php?op=penVis";
            }
            if (location.pathname.includes("index")) {
                location.href = "/sigest/html/editVis.php?op=index";
            }
        });
    };
});

