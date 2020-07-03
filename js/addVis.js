$(document).ready(function () {
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
                $("#cli").append($("<option/>").val(this[0]).text(this[2]));
            });
        }
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
                $("#prod").html("");
                $("#prod").html('<option value="0">Seleccionar Produto</option>');
                $.each(dataResult.data, function () {
                    console.log(this);
                    $("#prod").append($("<option/>").val(this[0]).text(this[1] + " " + this[2]));
                });
            }
        });
    });

    //Fetch Motivo
    $.ajax({
        url: "../php/queries.php",
        type: "POST",
        data: {
            op: 'fetchMot'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#mot").html("");
            $("#mot").html('<option value="0">Seleccionar Motivo</option>');
            $.each(dataResult.data, function () {
                $("#mot").append($("<option/>").val(this[0]).text(this[1]));
            });
        }
    });

    //<!-- Add visit -->
    $('#addForm').on('submit', function () {
        $.ajax({
            data: new FormData(this),
            contentType: false,
            processData: false,
            type: "post",
            url: "../php/queries.php",
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 201) {
                    alert(dataResult);
                }
            }
        });
    });
});


