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
console.log(categories);

function activeLink() {
  categories.forEach((category) => {
    category.classList.remove("active");
    this.classList.add("active");
  });
}

categories.forEach((category) => {
  category.addEventListener("click", activeLink);
});

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
