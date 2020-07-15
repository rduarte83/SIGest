$(document).ready(function () {
    $.ajax({
        url: "/sigest/php/queries.php",
        type: "POST",
        data: {
            op: 'countPen'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $('#numPen').text(dataResult.data[0][0]);
        }
    });
});