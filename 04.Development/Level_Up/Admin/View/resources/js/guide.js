$(document).ready(function () {

    $("#formStep").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../Controller/guideController/guideUpdateController.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            success: function (res) {
                location.href = res
            },
            error: function (err) {
                alert(err);
            }
        })
    });


})