$(document).ready(function () {
    //Fetch Client
    $.ajax({
        url: "../php/copia.php",
        type: "POST",
        data: {
            op: 'fetchCli'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);
            $("#cli").html("");
            $("#cli").html('<option value="0">Seleccionar Cliente</option>');
            $.each(dataResult.data, function () {
                $("#cli").append($("<option/>").val(this[0]).text(this[1]));
            });
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
                    console.log(this);
                    $("#equip").append($("<option/>").val(this[0]).text(this[1] + " " +
                        this[2] + " " + this[3] + " " + this[4]));
                });
            }
        });
    });
});

//<!-- Add copia -->
$('#addForm').on('submit', function () {
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