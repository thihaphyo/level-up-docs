/*
 *Create: Zin Min Htet(2022/07/11)
 *Update:
 *to dropdown more about us
 *Parameter: none
 *Return: none
 */
function readMoreBtn() {
  var dots = document.getElementById("dotted");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("btnReadMore");
  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
