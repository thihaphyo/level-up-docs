$("document").ready(function () {
  navHightLight();
});

const navHightLight = () => {
  const collection = document.getElementsByClassName("navbar-item");
  for (let i = 0; i < collection.length; i++) {
    collection[i].setAttribute("class", "navbar-item");
  }
  $("#lnk_explore").addClass("active");
};
