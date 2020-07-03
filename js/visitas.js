$(document).on('click','.details', function () {
    var visita_id = $(this).attr("data-id");
    localStorage.setItem("visita_id", visita_id);
    console.log(visita_id);
});

$(document).ready(function () {
    $("#table").DataTable({
        processing: true,
        ajax: {
            url: "../php/fetchVis.php",
            type: "POST",
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
                $("#cli").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });

    $("#cli").on('change', function () {
        if ($.fn.dataTable.isDataTable('#table')) {
            $("#table").DataTable().destroy();
        }
        ;
        if ($("#cli").val() == 0) {
            $("#table").DataTable({
                processing: true,
                ajax: {
                    url: "../php/fetchVis.php",
                    type: "POST",
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
        } else {
            $("#table").DataTable({
                processing: true,
                ajax: {
                    url: "../php/fetchVisCli.php",
                    type: "POST",
                    data: {
                        cliente_id: $("#cli").val()
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


