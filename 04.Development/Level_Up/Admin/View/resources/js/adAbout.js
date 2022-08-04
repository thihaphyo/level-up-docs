/*
*Create: Zin Min Htet(2022/07/20)
*Update:
*to show preview image
*Parameter: event = to get file path
*Return: none
*/
function previewImg(event) {
    var image = document.getElementById('preview');
    image.src = URL.createObjectURL(event.target.files[0]);
};