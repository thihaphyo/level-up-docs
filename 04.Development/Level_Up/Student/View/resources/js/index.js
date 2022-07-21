document.addEventListener("DOMContentLoaded", () => {
  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(
    document.querySelectorAll(".navbar-burger"),
    0
  );

  // Add a click event on each of them
  $navbarBurgers.forEach((el) => {
    el.addEventListener("click", () => {
      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);
      console.log($target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle("is-active");
      $target.classList.toggle("is-active");
    });
  });
});

$("document").ready(function () {
  if (localStorage.getItem("access_token") != null) {
    // window.location.replace("./index.php");
    $("#btn_logout").removeClass("is-hidden");
    $("#lnk_my_courses,#lnk_noti,#lnk_cart,#lnk_profile").removeClass("is-hidden");
  } else {
    $("#btn_register").removeClass("is-hidden");
    $("#lnk_my_courses,#lnk_noti,#lnk_cart,#lnk_profile").addClass("is-hidden");
  }
});

var categories = document.querySelectorAll(".category");

function activeLink() {
  categories.forEach((category) => {
    category.classList.remove("active");
    this.classList.add("active");
  });
}

categories.forEach((category) => {
  category.addEventListener("click", activeLink);
});

$('#btn_logout').click(function () {
    localStorage.removeItem('access_token');
    window.location.replace("./index.php");
})