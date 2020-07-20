$(document).ready(function () {
    $.ajax({
        url: "/sigest/php/queries.php",
        type: "POST",
        data: {
            op: 'countVisPen'
        },
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            $('#visPen').text(dataResult.data[0][0]);
        }
    });
});