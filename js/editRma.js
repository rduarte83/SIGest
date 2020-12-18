var rma_id = localStorage.getItem("rma_id")

$(document).ready(function () {
    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            rma_id: rma_id,
            op: 'fetchRMAS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);

            $("#estado").val(dataResult.data[0][10]);
            $("#data_e").val(dataResult.data[0][0]);
            $("#cli").val(dataResult.data[0][1]);
            $("#produto").val(dataResult.data[0][2]);
            $("#fornecedor").val(dataResult.data[0][3]);
            $("#num_serie").val(dataResult.data[0][4]);
            $("#motivo").val(dataResult.data[0][5]);
            $("#num_f").val(dataResult.data[0][6]);
            $("#data_f").val(dataResult.data[0][7]);
            $("#resolucao").val(dataResult.data[0][8]);
            $("#obs").val(dataResult.data[0][9]);
        }
    });
});

$("#addForm").on('submit', function (e) {
    $("#id").val(rma_id);
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
    });
});