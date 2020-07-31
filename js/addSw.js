//<!-- Add user -->
$(document).on('submit', '#addForm', function () {
    $.ajax({
        data: new FormData(this),
        contentType: false,
        processData: false,
        type: "post",
        url: "../php/sw.php",
    });
});