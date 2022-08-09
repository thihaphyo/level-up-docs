var box = document.getElementById("box");
var down = false;
/*
 *Create: Zin Min Htet(2022/07/15)
 *Update:
 *to dropdown notification box
 *Parameter: none
 *Return: none
 */
function toggleNoti() {
    if (down) {
        box.style.height = "0px";
        box.style.opacity = 0;
        down = false;
    } else {
        box.style.height = "350px";
        box.style.opacity = 1;
        down = true;
    }
}
function deleteData(e) {
    e.parentElement.remove();
    var id = e.id;
    $(document).ready(() => {
            $.ajax({
                url: "../Controller/notificationIDController.php",
                type: "POST",
                data: {
                    id: id,
                    action: "delete"
                },
                success: (res) => {
                    console.log(res);
                    $("#countNoti").text(res);
                },
                error: (err) => {
                    console.log(err);
                },
            });
    });
}
