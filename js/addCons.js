$(document).ready(function () {
    //Fetch Contrato
    $.ajax({
        url: "../php/copia.php",
        type: "POST",
        data: {
            op: 'fetchContrato'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $("#contrato").html("");
            $("#contrato").html('<option value="0">Seleccionar Contrato</option>');
            $.each(dataResult.data, function () {
                console.log(this);
                $("#contrato").append($("<option/>").val(this[0]).text(this[1] + " - " +
                    this[2] + " " + this[3] + " " + this[4]));
            });
        }
    });
});

$('#addForm').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/copia.php",
        success: function (dataResult) {
            dataResult = JSON.parse(dataResult);
            console.log(dataResult);
        }
    });
});
