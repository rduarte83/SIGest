$(document).ready(function () {
    var now = moment().format("YYYY-MM-DDTHH:mm");
    $("#data_p").val(now);

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
    })
    
    //Fetch Client
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchCli'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            var search = new URLSearchParams(window.location.search);

            $("#cli").html("");
            $("#cli").html('<option value="0">Seleccionar Cliente</option>');
            $.each(dataResult.data, function () {
                if (search.has("cli")) {
                    var param = search.get("cli");
                    $("#cli").val(param);
                }
                ;
                $("#cli").append($("<option/>").val(this[0]).text(this[2]));
            });
            if (search.has("prod")) {
                var param = search.get("prod");
                console.log(param);
                $("#prod").val(param);
                console.log($("#prod").val(param));
            }
            ;
            $.ajax({
                url: "../php/queries.php",
                type: "POST",
                data: {
                    op: 'fetchProdCli',
                    cliente_id: $("#cli").val()
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    var search = new URLSearchParams(window.location.search);

                    $("#prod").html('<option value="0">Seleccionar Produto</option>');
                    $.each(dataResult.data, function () {
                        if (search.has("prod")) {
                            var param = search.get("prod");
                            $("#prod").val(param);
                        };
                        $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " + this[2] + " " + this[3]));
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
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchProdCli',
            cliente_id: $("#cli").val()
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);

            $("#prod").html('<option value="0">Seleccionar Produto</option>');
            $.each(dataResult.data, function () {
                $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " + this[2] + " " + this[3]));
            });
        }
    });
});


//<!-- Add assist -->
$('#addForm').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
        success: function () {
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
                    //$("#data_i-p").text(dataResult.data[0][9]);
                    //$("#resolucao-p").text(dataResult.data[0][10]);
                    //$("#obs-p").text(dataResult.data[0][11]);
                    //$("#material-p").text(dataResult.data[0][12]);
                    //$("#tempo-p").text(dataResult.data[0][13]);
                    //$("#valor-p").text(dataResult.data[0][14]);
                    //$("#facturado").text(dataResult.data[0][16]);
                    //$("#factura").text(dataResult.data[0][17]);
                    $("#morada-p").text(dataResult.data[0][18]);
                    $("#zona-p").text(dataResult.data[0][19]);
                    $("#resp-p").text(dataResult.data[0][20]);
                    $("#contacto-p").text(dataResult.data[0][21]);

                    window.print();
                    window.onafterprint = function(){
                        console.log("PRINTED");
                        var search = new URLSearchParams(window.location.search);
                        if (search.has("op")) {
                            var param = search.get("op");
                            if (param == "cal") window.location.href = "../html/calAss.php";
                            else window.location.href = "../html/assistencias.php";
                        };
                        if (dataResult.statusCode == 201) {
                            alert(dataResult);
                        };
                    }
                }
            });
        }
    });
});

$("#newCli").click(function (e) {
    e.preventDefault();
    var search = new URLSearchParams(window.location.search);
    if (search.has("op")) {
        var param = search.get("op");
        if (param == "cal") window.location.href = "../html/addCliente.php?op=cal";
        else window.location.href = "../html/addCliente?op=ass.php";
    };
});

$("#newProd").click(function (e) {
    e.preventDefault();
    var search = new URLSearchParams(window.location.search);
    if (search.has("op")) {
        var param = search.get("op");
        if (param == "cal") window.location.href = "../html/addProduto.php?op=cal&cli=" + $("#cli").val();
        else window.location.href = "../html/addProduto.php?op=ass&cli=" + $("#cli").val();
    };
});






