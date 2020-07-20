var ass_id = localStorage.getItem("ass_id")

$(document).ready(function () {
    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            ass_id: ass_id,
            op: 'fetchAssS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);

            $("#id").val(dataResult.data[0][0]);
            $("#cli").val(dataResult.data[0][1]);
            $("#prod").val(dataResult.data[0][2]);
            $("#data_p").val(dataResult.data[0][3]);
            $("#motivo").val(dataResult.data[0][4]);
            $("#local").val(dataResult.data[0][5]);
            $("#tecnico").val(dataResult.data[0][6]);
            $("#entregue").val(dataResult.data[0][7]);
            $("#problema").val(dataResult.data[0][8]);
            $("#data_i").val(dataResult.data[0][9]);
            $("#resolucao").val(dataResult.data[0][10]);
            $("#material").val(dataResult.data[0][11]);
            $("#tempo").val(dataResult.data[0][12]);
            $("#valor").val(dataResult.data[0][13]);
            $("#facturado").val(dataResult.data[0][14]);
            $("#factura").val(dataResult.data[0][15]);

            localStorage.setItem('morada', dataResult.data[0][16]);
            localStorage.setItem('zona', dataResult.data[0][17]);
            localStorage.setItem('responsavel', dataResult.data[0][18]);
            localStorage.setItem('contacto', dataResult.data[0][19]);

            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });

    $('#print').on('click', function () {
        localStorage.setItem('id', $("#id").val());
        localStorage.setItem('cliente', $("#cli").val());
        localStorage.setItem('produto', $("#prod").val());
        localStorage.setItem('data_p', $("#data_p").val());
        localStorage.setItem('motivo', $("#motivo").val());
        localStorage.setItem('local', $("#local").val());
        localStorage.setItem('tecnico', $("#tecnico").val());
        localStorage.setItem('entregue', $("#entregue").val());
        localStorage.setItem('problema', $("#problema").val());
        localStorage.setItem('data_i', $("#data_i").val());
        localStorage.setItem('resolucao', $("#resolucao").val());
        localStorage.setItem('material', $("#material").val());
        localStorage.setItem('tempo', $("#tempo").val());
        localStorage.setItem('valor', $("#valor").val());
        localStorage.setItem('facturado', $("#valor").val());
        localStorage.setItem('factura', $("#valor").val());
    });
});


