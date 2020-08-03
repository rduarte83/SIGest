//<!-- Add user -->
$("#addForm").on('submit',function (e) {
    e.preventDefault();
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/queries.php",
        success: function (dataResult) {
            var search = new URLSearchParams(window.location.search);
            if (search.has("op")) {
                var param = search.get("op");
                if (param == "cal") window.location.href = "../html/addAssist.php?op=cal&cli=" + $("#nif").val();
                if (param == "ass") window.location.href = "../html/addAssist.php?op=ass&cli=" + $("#nif").val();
            } else window.location.href = "../index.php";
            if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});