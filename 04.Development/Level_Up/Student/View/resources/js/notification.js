var box = document.getElementById('box');
var down = false;
// var allNoti = document.getElementById("noti1");
// var followedNoti = document.getElementById("noti2");
/*
*Create: Zin Min Htet(2022/07/15)
*Update:
*to dropdown notification box
*Parameter: none
*Return: none
*/
function toggleNoti() {
    if (down) {
        box.style.height = '0px';
        box.style.opacity = 0;
        down = false;
    } else {
        box.style.height = '350px';
        box.style.opacity = 1;
        down = true;
    }
}
/*
*Create: Zin Min Htet(2022/07/22)
*Update:
*to change notification (all and followed)
*Parameter: none
*Return: none
*/
// allNoti.addEventListener("click", function () {
//     document.getElementById("notiAll").style.display = "block";
//     document.getElementById("followedNoti").style.display = "none";
// })
// followedNoti.addEventListener("click", function () {
//     document.getElementById("notiAll").style.display = "none";
//     document.getElementById("followedNoti").style.display = "block";
// })
