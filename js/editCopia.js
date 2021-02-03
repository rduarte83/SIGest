var contrato_id = localStorage.getItem("contrato_id")

$(document).ready(function () {
    $("#id").val(contrato_id);

    $.ajax({
        url: "../php/copia.php",
        type: "post",
        data: {
            contrato_id: contrato_id,
            op: 'fetchContS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data);
            $("#inicio").val(dataResult.data[0][1]);
            $("#fim").val(dataResult.data[0][2]);
            $("#tipo").val(dataResult.data[0][3]);
            $("#valor").val(dataResult.data[0][4]);
            $("#inc").val(dataResult.data[0][5]);
            $("#preco_p").val(dataResult.data[0][6]);
            $("#preco_c").val(dataResult.data[0][7]);
            $("#estado").val(dataResult.data[0][13]);
            var cli_id = dataResult.data[0][11];
            var prod_id = dataResult.data[0][12];

            //Fetch Client
            $.ajax({
                url: "../php/copia.php",
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
                            $("#cli").append($("<option/>").val(this[0]).text(this[1]).prop("selected", "selected"));
                        } else $("#cli").append($("<option/>").val(this[0]).text(this[1]));
                    });
                }
            });

            //Fetch Product
            $.ajax({
                url: "../php/copia.php",
                type: "POST",
                data: {
                    op: 'fetchProdCli',
                    cliente_id: cli_id
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    $("#equip").html("");
                    $("#equip").html('<option value="0">Seleccionar Produto</option>');
                    $.each(dataResult.data, function () {
                        if (this[0] == prod_id) {
                            $("#equip").append($("<option/>").val(this[0]).text(this[1] + " " + this[2]).prop("selected", "selected"));
                        } else $("#equip").append($("<option/>").val(this[0]).text(this[1] + " " + this[2]));
                    });
                    $("#equip option[value=" + $("prod_id").val() + "]").prop("selected", "selected");
                }
            });

            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
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
                $("#equip").html("");
                $("#equip").html('<option value="0">Seleccionar Produto</option>');
                $.each(dataResult.data, function () {
                    $("#equip").append($("<option/>").val(this[0]).text(this[1] + " " + this[2]));
                });
                $("#equip option[value=" + $("prod_id").val() + "]").prop("selected", "selected");
            }
        });
    });
});

$("#addForm").on('submit', function () {
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/copia.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});