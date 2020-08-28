var id = localStorage.getItem("id");
$("#id").val(id);
console.log( $("#id").val() );

$(document).ready(function () {
    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            id: id,
            op: 'fetchHorasS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            var cli_id = dataResult.data[0][1];

            $("#data").val(dataResult.data[0][2]);
            $("#horas").val(dataResult.data[0][3]);
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
        }
    });
});

$("#addForm").on('submit', function (e) {
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
    });
});