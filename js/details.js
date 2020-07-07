var visita_id = localStorage.getItem("visita_id")

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
            $("#ult_vis").val(dataResult.data[0][2]);
            $("#motivo").val(dataResult.data[0][3]);
            $("#prod").val(dataResult.data[0][4]+" "+dataResult.data[0][5]+" "+dataResult.data[0][6]);
            $("#tecnico").val(dataResult.data[0][7]);
            $("#descricao").val(dataResult.data[0][8]);
            $("#prox_vis").val(dataResult.data[0][9]);

            localStorage.setItem('zona', dataResult.data[0][10]);
            localStorage.setItem('contacto', dataResult.data[0][11]);
            localStorage.setItem('email', dataResult.data[0][12]);

            console.log( dataResult.data[0][10] );

            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });

    $('#print').on('click', function () {
        localStorage.setItem('id', $("#id").val());
        localStorage.setItem('cliente', $("#cli").val());
        localStorage.setItem('produto', $("#prod").val());
        localStorage.setItem('ult_vis', $("#ult_vis").val());
        localStorage.setItem('motivo', $("#motivo").val());
        localStorage.setItem('descricao', $("#descricao").val());
        localStorage.setItem('tecnico', $("#tecnico").val());
        localStorage.setItem('prox_vis', $("#prox_vis").val());
    });
});


