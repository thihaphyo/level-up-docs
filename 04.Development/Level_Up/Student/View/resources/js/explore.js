$("document").ready(function () {
  navHightLight();
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

const navHightLight = () => {
  const collection = document.getElementsByClassName("navbar-item");
  for (let i = 0; i < collection.length; i++) {
    collection[i].setAttribute("class", "navbar-item");
  }
  $("#lnk_explore").addClass("active");
};
