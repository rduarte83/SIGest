function createDT() {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/queries.php",
            type: "POST",
            data: {
                op: 'fetchPen'
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
                        cliente_id: $("#cli").val(),
                        op: 'fetchVisCli'
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
                    language: {"url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"}
                }
            });
        }
    });
});

