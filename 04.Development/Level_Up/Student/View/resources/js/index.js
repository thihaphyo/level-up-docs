AOS.init();
let mobileNav, mobileNavBtn;
mobileNav = document.getElementsByClassName("mobile-nav")[0];
mobileNavBtn = document.getElementById("nav-burg");

function openMobile() {
  mobileNav.classList.remove("is-hidden");
  mobileNav.classList.add("slide-in-right");
}
function closeMobile() {
  mobileNav.classList.remove("slide-in-right");
  mobileNav.classList.add("slide-out-right");
  setTimeout(() => {
    mobileNavBtn.disabled = true;
    mobileNav.classList.remove("slide-out-right");
    mobileNav.classList.add("is-hidden");
    mobileNavBtn.disabled = false;
  }, 300);
}

$(document).ready(function () {
  if (localStorage.getItem("access_token") != null) {
    // window.location.replace("./index.php");
    $("#btn_logout").removeClass("is-hidden");
    $("#btn_register").addClass("is-hidden");
    $("#lnk_my_courses,#lnk_noti,#lnk_cart,#lnk_profile").removeClass(
      "is-hidden"
    );
  } else {
    $("#btn_register").removeClass("is-hidden");
    $("#btn_logout").addClass("is-hidden");
    $("#lnk_my_courses,#lnk_noti,#lnk_cart,#lnk_profile").addClass("is-hidden");
  }
});

var categories = document.querySelectorAll(".category");
// console.log(categories);

function activeLink() {
  categories.forEach((category) => {
    category.classList.remove("active");
    this.classList.add("active");
  });
}

categories.forEach((category) => {
  category.addEventListener("click", activeLink);
});

let courses = document.querySelectorAll(".course");
function changeCategory(e) {
  if (e.id == "all") {
    courses.forEach((course) => {
      course.classList.remove("hide");

      check();
    });
  } else {
    courses.forEach((course) => {
      if (e.id !== course.id) {
        course.classList.add("hide");

        check();
      } else {
        course.classList.remove("hide");

        check();
      }
    });
  }
}

function check() {
  let hides = document.querySelectorAll(".hide");

  if (hides.length == courses.length) {
    document.getElementById("noCourse").classList.remove("noCourse");
  } else {
    document.getElementById("noCourse").classList.add("noCourse");
  }
}

$("#btn_logout").click(function () {
  localStorage.removeItem("access_token");
  logout();
});

async function logout() {
  let response = await fetch(
    "http://localhost/level-up-docs/04.Development/Level_Up/Student/Controller/auth/Logout.php"
  );
  if (response.status === 200) {
    window.location.replace("./index.php");
  }
}

$("#heartOutline").click(function () {
  this.classList.toggle("hide");

  $("#heartFill").toggleClass("hide");

  $.ajax({
    url: "../Controller/addWishListController.php",
    type: "POST",
    success: function (res) {
      if (res != "") {
        window.location.replace(res);
      }
    },
    error: function (err) {
      console.log(err);
    },
  });
});

$("#heartFill").click(function () {
  this.classList.toggle("hide");

  $("#heartOutline").toggleClass("hide");

  $.ajax({
    url: "../Controller/deleteWishListController.php",
    type: "POST",
    success: function (res) {
      console.log(res);
    },
    error: function (err) {
      console.log(err);
    },
  });
});

$("#addToCart").click(function () {
  this.classList.toggle("hide");

  $("#removeFromCart").toggleClass("hide");

  $.ajax({
    url: "../Controller/addCartController.php",
    type: "POST",
    success: function (res) {
      if (res != "") {
        window.location.replace(res);
      }
    },
    error: function (err) {
      console.log(err);
    },
  });
});

$("#removeFromCart").click(function () {
  this.classList.toggle("hide");

  $("#addToCart").toggleClass("hide");

  $.ajax({
    url: "../Controller/deleteCartController.php",
    type: "POST",
    success: function (res) {
      console.log(res);
    },
    error: function (err) {
      console.log(err);
    },
  });
});

$("#buyNow").click(function () {
  $.ajax({
    url: "../Controller/buyNowController.php",
    type: "POST",
    success: function (res) {
      if (res != "") {
        window.location.replace(res);
      }
    },
    error: function (err) {
      console.log(err);
    },
  });
});
