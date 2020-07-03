var visita_id = localStorage.getItem("visita_id")

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}



$(document).ready(function () {

    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            visita_id: visita_id,
            op: 'fetchVisS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);

            $("#id").val(dataResult.data[0][0]);
            $("#cli").val(dataResult.data[0][1]);
            $("#prod").val(dataResult.data[0][4]);
            $("#ult_vis").val(dataResult.data[0][2]);
            $("#motivo").val(dataResult.data[0][3]);
            $("#descricao").val(dataResult.data[0][6]);
            $("#tecnico").val(dataResult.data[0][5]);
            $("#prox_vis").val(dataResult.data[0][7]);

            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});


