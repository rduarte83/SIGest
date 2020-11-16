$("#radioC").on('change', function () {
    var selC = $("input[name='radioC']:checked").val();
    if (selC === 'new') {
        $("#existC").hide();
        $("#newC").show();
    } else {
        $("#existC").show();
        $("#newC").hide();
    }
});

$("#radioP").on('change', function () {
    var selP = $("input[name='radioP']:checked").val();
    if (selP === 'new') {
        $("#existP").hide();
        $("#newP").show();
    } else {
        $("#existP").show();
        $("#newP").hide();
    }
});

function printAss() {
    $.ajax({
        type: "post",
        url: "../php/queries.php",
        data: {
            op: 'fetchLastAss'
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
            //$("#resolucao-p").text(dataResult.data[0][10]);
            $("#obs-p").text(dataResult.data[0][11]);
            //$("#material-p").text(dataResult.data[0][12]);
            //$("#tempo-p").text(dataResult.data[0][13]);
            //$("#valor-p").text(dataResult.data[0][14]);
            //$("#facturado").text(dataResult.data[0][16]);
            //$("#factura").text(dataResult.data[0][17]);
            $("#morada-p").text(dataResult.data[0][18]);
            $("#zona-p").text(dataResult.data[0][19]);
            $("#resp-p").text(dataResult.data[0][20]);
            $("#contacto-p").text(dataResult.data[0][21]);

            $("#new").modal().hide();
            $('.modal-backdrop').remove();

            window.onafterprint = function () {
                $(window).off('mousemove', window.onafterprint);
                console.log('Print Dialog Closed..');
            };
            window.print();

            //window.location.href = "calAss.php"
        }
    });
}

$(document).ready(function () {
    var now = moment().format("YYYY-MM-DDTHH:mm");
    $("#data_p").val(now);

    $("#newC").hide();
    $("#newP").hide();

    //Fetch Clientes - autocomplete
    $.ajax({
        url: '../php/queries.php',
        type: 'post',
        data: {
            op: 'fetchCliAuto',
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);

            $("#cli").autocomplete({
                source: dataResult,
                minLength: 2,
                select: function (event, ui) {
                    $("#cli").val(ui.item.value);
                    $("#c_id").val(ui.item.id);
                    $.ajax({
                        url: "../php/queries.php",
                        type: "POST",
                        data: {
                            op: 'fetchProdCli',
                            cliente_id: $("#c_id").val()
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);

                            $("#prod").html('<option value="0">Seleccionar Produto</option>');
                            $.each(dataResult.data, function () {
                                $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " + this[2] + " " + this[3]));
                            });
                        }
                    });
                }
            });
        }
    });

    //Fetch Tecnicos
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
                $("#tecnico").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });

    //Fetch Comercial
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchCom',
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#comercial").html('<option value="0">Seleccionar Comercial</option>');
            $.each(dataResult.data, function () {
                $("#comercial").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });
});

//<!-- Add assist -->
$('#addForm').on('submit', function (e) {
    e.preventDefault();

    var selC = $("input[name='radioC']:checked").val();
    var selP = $("input[name='radioP']:checked").val();

    if (selC === 'new') {
        $('#op').val("addAssNC");
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
            success: function () {
                printAss();
            }
        });
    } else if (selP === 'new') {
        $('#op').val("addAssNP");
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
            success: function () {
                printAss();
            }
        });
    } else {
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
            success: function () {
                printAss();
            }
        });
    }
});