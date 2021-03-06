var ass_id = localStorage.getItem("ass_id")

$(document).ready(function () {
    $("#reForm").hide();
    $(".data").hide();

    console.log( $("#op").val() );

    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            ass_id: ass_id,
            op: 'fetchAssS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);

            $("#id").val(dataResult.data[0][0]);
            $("#data_p").val(moment(dataResult.data[0][3]).format('YYYY-MM-DDTHH:mm'));
            $("#local").val(dataResult.data[0][5]);
            $("#entregue").val(dataResult.data[0][7]);
            $("#problema").val(dataResult.data[0][8]);
            $("#data_i").val(moment(dataResult.data[0][9]).format('YYYY-MM-DDTHH:mm'));
            $("#resolucao").val(dataResult.data[0][10]);
            $("#obs").val(dataResult.data[0][11]);
            $("#material").val(dataResult.data[0][12]);
            $("#tempo").val(dataResult.data[0][13]);
            $("#valor").val(dataResult.data[0][14]);
            $("#estado").val(dataResult.data[0][15]);
            $("#facturado").val(dataResult.data[0][16]);
            $("#factura").val(dataResult.data[0][17]);

            var cli_id = dataResult.data[0][22];
            var prod_id = dataResult.data[0][23];
            var t_id = dataResult.data[0][24];

            //Select Motivo
            $("#motivo").val(dataResult.data[0][4]);

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
                    $("#cli").html('<option value="0">Seleccionar Cliente</option>');
                    $.each(dataResult.data, function () {
                        if (this[0] == cli_id) {
                            $("#cli").append($("<option/>").val(this[0]).text(this[2]).prop("selected", "selected"));
                        } else $("#cli").append($("<option/>").val(this[0]).text(this[2]));
                    });
                }
            });
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
            //Fetch Product
            $.ajax({
                url: "../php/queries.php",
                type: "POST",
                data: {
                    op: 'fetchProdCli',
                    cliente_id: cli_id
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    $("#prod").html("");
                    $("#prod").html('<option value="0">Seleccionar Produto</option>');
                    $.each(dataResult.data, function () {
                        if (this[0] == prod_id) {
                            $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " + this[2] + " " + this[3]).prop("selected", "selected"));
                        } else $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " + this[2] + " " + this[3]));
                    });
                }
            });

            //Fetch Tecnico
            $.ajax({
                url: "../php/queries.php",
                type: "POST",
                data: {
                    op: 'fetchTec',
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    $("#tecnico").html('<option value="0">Seleccionar Técnico</option>');
                    $.each(dataResult.data, function () {
                        if (this[0] == t_id) {
                            $("#tecnico").append($("<option/>").val(this[0]).text(this[1]).prop("selected", "selected"));
                        } else $("#tecnico").append($("<option/>").val(this[0]).text(this[1]));
                    });
                }
            });
        }
    });
});

//Fetch Product
$("#cli").on('change', function () {
    //Fetch Product
    $.ajax({
        url: "../php/copia.php",
        type: "POST",
        data: {
            op: 'fetchProdCli',
            cliente_id: $("#cli").val()
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#prod").html("");
            $("#prod").html('<option value="0">Seleccionar Produto</option>');
            $.each(dataResult.data, function () {
                $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " +
                    this[2] + " " + this[3] + " " + this[4]));
            });
        }
    });
});

$("#addForm").on('submit', function (e) {
    e.preventDefault();
    if ($("#reCheck").prop("checked")) {
        $("#op").val("remarcar");
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
            success: function (dataResult) {
                var search = new URLSearchParams(window.location.search);
                if (search.has("op")) {
                    var param = search.get("op");
                    if (param == "cal") window.location.href = "../html/calAss.php";
                    if (param == "index") window.location.href = "../index.php";
                } else window.location.href = "../html/penAss.php";
            }
        });
        $("#op").val("editAss");
    };

    $("#id").val(ass_id);
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
        success: function (dataResult) {
            var search = new URLSearchParams(window.location.search);
            if (search.has("op")) {
                var param = search.get("op");
                if (param == "cal") window.location.href = "../html/calAss.php";
                if (param == "index") window.location.href = "../index.php";
            } else window.location.href = "../html/penAss.php";
        }
    });
});

$('#print').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "../php/queries.php",
        data: {
            ass_id: ass_id,
            op: 'fetchAssS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);

            $("#id-p").text(dataResult.data[0][0]);
            $("#cli-p").text(dataResult.data[0][1]);
            $("#prod-p").text(dataResult.data[0][2]);
            $("#data_p-p").text(dataResult.data[0][3]);
            $("#motivo-p").text(dataResult.data[0][4]);
            $("#local-p").text(dataResult.data[0][5]);
            $("#tecnico-p").text(dataResult.data[0][6]);
            $("#entregue-p").text(dataResult.data[0][7]);
            $("#problema-p").text(dataResult.data[0][8]);
            $("#data_i-p").text(dataResult.data[0][9]);
            $("#resolucao-p").text(dataResult.data[0][10]);
            $("#obs-p").text(dataResult.data[0][11]);
            $("#material-p").text(dataResult.data[0][12]);
            $("#tempo-p").text(dataResult.data[0][13]);
            $("#valor-p").text(dataResult.data[0][14]);
            $("#facturado").text(dataResult.data[0][16]);
            $("#factura").text(dataResult.data[0][17]);
            $("#morada-p").text(dataResult.data[0][18]);
            $("#zona-p").text(dataResult.data[0][19]);
            $("#resp-p").text(dataResult.data[0][20]);
            $("#contacto-p").text(dataResult.data[0][21]);

            window.print();
            window.onafterprint = function () {
                console.log("PRINTED");
                var search = new URLSearchParams(window.location.search);
                if (search.has("op")) {
                    var param = search.get("op");
                    if (param == "cal") window.location.href = "../html/calAss.php";
                } else window.location.href = "../html/penAss.php";
            }
        }
    });
});

//Reagendar
$("#estado").on('change', function () {
    if ($("#estado").val() == 'Não Resolvido') {
        $("#reForm").show();
    } else $("#reForm").hide();
});
$("#reCheck").on('change', function () {
    if ($("#reCheck").prop("checked")) $(".data").show();
    else $(".data").hide();
});
