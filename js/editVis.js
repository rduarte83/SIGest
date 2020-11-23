var vis_id = localStorage.getItem("vis_id")

$(document).ready(function () {
    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            vis_id: vis_id,
            op: 'fetchVisS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);

            $("#id").val(dataResult.data[0][0]);
            $("#ult_vis").val(dataResult.data[0][2]);
            $("#vendedor").val(dataResult.data[0][4]);
            $("#descricao").val(dataResult.data[0][6]);

            var cli_id = dataResult.data[0][7];
            var t_id = dataResult.data[0][8];
            var mot_id = dataResult.data[0][9];

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

            //Fetch Motivos
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
                        console.log(mot_id);
                        if (this[0] == mot_id) {
                            $("#mot").append($("<option/>").val(this[0]).text(this[1]).prop("selected", "selected"));
                        } else $("#mot").append($("<option/>").val(this[0]).text(this[1]));
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
                        if (this[0] == t_id) {
                            $("#tecnico").append($("<option/>").val(this[0]).text(this[1]).prop("selected", "selected"));
                        } else $("#tecnico").append($("<option/>").val(this[0]).text(this[1]));
                    });
                }
            });
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});

$("#addForm").on('submit', function (e) {
    e.preventDefault();
    $("#id").val(vis_id);
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
        success: function (dataResult) {
            window.location.href = "../html/calVis.php";
        }
    });
});