var vis_id = localStorage.getItem("vis_id")

$(document).ready(function () {
    console.log(vis_id);
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
            $("#cli").val(dataResult.data[0][1]);
            $("#ult_vis").val(moment(dataResult.data[0][2]).format('YYYY-MM-DDTHH:mm'));
            $("#mot").val(dataResult.data[0][3]);
            $("#vendedor").val(dataResult.data[0][4]);
            $("#descricao").val(dataResult.data[0][6]);
            $("#cliente_id").val(dataResult.data[0][7]);

            $.ajax({
                url: "../php/queries.php",
                type: "post",
                data: {
                    cliente_id: dataResult.data[0][7],
                    id: dataResult.data[0][0],
                    op: 'fetchVisSN'
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    $("#prox_vis").val(moment(dataResult.data[0][2]).format('YYYY-MM-DDTHH:mm'));
                    $("#mot_prox").val(dataResult.data[0][3]);
                    $("#descricao_prox").val(dataResult.data[0][6]);
                }
            });
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