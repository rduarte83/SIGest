var id = localStorage.getItem("id");

$(document).ready(function () {
    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            id: id,
            op: 'fetchProdS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data);

            $("#cli").val(dataResult.data[0][1]);
            $("#tipo").val(dataResult.data[0][2]);
            $("#marca").val(dataResult.data[0][3]);
            $("#modelo").val(dataResult.data[0][4]);
            $("#num_serie").val(dataResult.data[0][5]);
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