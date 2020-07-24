var id = localStorage.getItem("id")

$(document).ready(function () {
    $.ajax({
        url: "../php/sw.php",
        type: "post",
        data: {
            id: id,
            op: 'fetchSwS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);
            $("#cli").val(dataResult.data[0][0]);
            $("#sw").val(dataResult.data[0][1]);
            $("#contrato").val(dataResult.data[0][2]);
            $("#valor").val(dataResult.data[0][3]);
            $("#period").val(dataResult.data[0][4]);
            $("#data").val(dataResult.data[0][5]);
            $("#modulos").val(dataResult.data[0][6]);
            $("#postos").val(dataResult.data[0][7]);
            $("#estado").val(dataResult.data[0][8]);
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});

$("#addForm").on('submit', function (e) {
    e.preventDefault();

    $("#id").val(id);

    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/sw.php",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});