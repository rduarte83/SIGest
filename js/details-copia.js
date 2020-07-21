var contrato_id = localStorage.getItem("contrato_id")

$(document).ready(function () {
    $.ajax({
        url: "../php/copia.php",
        type: "post",
        data: {
            contrato_id: contrato_id,
            op: 'fetchContS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);

            $("#cli").val(dataResult.data[0][0]);
            $("#equip").val(dataResult.data[0][8]+" "+dataResult.data[0][9]+" "+dataResult.data[0][10]);
            $("#inicio").val(dataResult.data[0][1]);
            $("#fim").val(dataResult.data[0][2]);
            $("#tipo").val(dataResult.data[0][3]);
            $("#valor").val(dataResult.data[0][4]);
            $("#inc").val(dataResult.data[0][5]);
            $("#preco_p").val(dataResult.data[0][6]);
            $("#preco_c").val(dataResult.data[0][7]);

            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});