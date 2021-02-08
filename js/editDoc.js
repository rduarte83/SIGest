var doc_id = localStorage.getItem("doc_id")

$(document).ready(function () {
    $.ajax({
        url: "../php/queries.php",
        type: "post",
        data: {
            doc_id: doc_id,
            op: 'fetchDocS'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult.data[0]);
            $("#id").val(dataResult.data[0][0]);
            $("#cli").val(dataResult.data[0][1])
            $("#data").val(dataResult.data[0][2]);
            $("#mot").val(dataResult.data[0][3]);
            $("#descricao").val(dataResult.data[0][4]);
            $("#estado").val(dataResult.data[0][5]);
        }
    });
});

$("#addForm").on('submit', function (e) {
    e.preventDefault();
    $("#id").val(doc_id);
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
        success: function () {
            window.location.href = "../html/doc.php";
        }
    });
});