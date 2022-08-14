// Initializing.
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
    $("#lnk_ins").addClass("active");
  };

// For pagination:
let curPageIndex = 0;
let paginationLimit = 3;
let instrCount = instrList == null ? 0 : instrList.length;
let pages = Math.ceil(instrCount / paginationLimit);

if (instrCount === 0) {
  // If no instructor is found:
  $(".i-instructor-list").empty();
  $(".i-instructor-list").append(
    "<p class='i-no-instructor'>Sorry, No Instructor Found.</p>"
  );
  $(".i-pagination-previous").addClass("is-disabled");
  $(".i-pagination-next").addClass("is-disabled");
} else {
  buildInstructorList();
}

// Main Function
function buildInstructorList() {
  // Fills Pagination
  for (let i = 0; i < pages; i++) {
    $("#i-list-pagination").append(
      `<li><a class="pagination-link i-pagination-link" aria-label="Page ${
        i + 1
      }" aria-current="page">${i + 1}</a></li>`
    );
  }

  // Attaches Event Listeners
  $(".i-pagination-link").click((e) => changePage(e.target.textContent - 1));
  $(".i-pagination-previous").click((e) => changePage(curPageIndex - 1));
  $(".i-pagination-next").click((e) => changePage(curPageIndex + 1));

  // Displays Current Page
  $(".i-pagination-link")[0].click();
}

// Changes Page
function changePage(nextIndex) {
  $(".i-instructor-list").empty();

  // Modifies that previous and next buttons.
  if (nextIndex === 0) {
    $(".i-pagination-previous").addClass("is-disabled");
  } else {
    $(".i-pagination-previous").removeClass("is-disabled");
  }

  if (nextIndex === pages - 1) {
    $(".i-pagination-next").addClass("is-disabled");
  } else {
    $(".i-pagination-next").removeClass("is-disabled");
  }

  // Modifies Pagination Tabs
  document
    .querySelectorAll(".i-pagination-link")
    [curPageIndex].classList.remove("is-current");
  curPageIndex = nextIndex;
  document
    .querySelectorAll(".i-pagination-link")
    [curPageIndex].classList.add("is-current");

  let index = curPageIndex * paginationLimit;

  // Displays the List
  for (let i = index, limit = index + paginationLimit; i < limit; i++) {
    if (i >= instrCount) {
      break;
    }
    $(".i-instructor-list").append(
      "<div class='i-instructor-card'>" +
        "<div class='i-instructor-list-img-wrapper'><img src='../View/resources/img/assets" +
        instrList[i]["profile_image"] +
        "' alt='" +
        instrList[i]["full_name"] +
        "'/><div class='i-list-wrapper1'></div></div>" +
        "<div class='i-list-content'>" +
        "<div><p class='i-list-name'>" +
        instrList[i]["full_name"] +
        "</p>" +
        "<div class='i-list-des'><img src='../View/resources/img/icons/i_jobpos.svg' /><p class='i-list-pos'>" +
        instrList[i]["job_position"] +
        "</p></div>" +
        "<div class='i-list-des'><img src='../View/resources/img/icons/i_coursecount.svg' /><p class='i-list-courses'> Teaching " +
        instrList[i]["course_count"] +
        " course" +
        (instrList[i]["course_count"] > 1 ? "s" : "") +
        "</p></div></div>" +
        `<a class='i-list-a' href='${controllerURL}?instructor_id=${instrList[i]["id"]}'>To Details</a></div>` +
        "</div>"
    );
  }
}

