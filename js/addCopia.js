$(document).ready(function () {
    //Fetch Clientes - autocomplete
    $.ajax({
        type: 'post',
        url: '../php/queries.php',
        data: {
            op: 'fetchCliAuto',
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);

            $("#cliente").autocomplete({
                source: dataResult,
                minLength: 2,
                select: function (event, ui) {
                    $("#cliente").val(ui.item.value);
                    $("#cliente_id").val(ui.item.id);
                }
            });
        }
    });

    //Fetch Product
    $("#cliente").on('change', function () {
        //Fetch Product
        $.ajax({
            url: "../php/copia.php",
            type: "POST",
            data: {
                op: 'fetchProdCli',
                cliente_id: $("#cliente_id").val()
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