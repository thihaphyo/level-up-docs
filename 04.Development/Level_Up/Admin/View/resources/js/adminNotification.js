$(document).ready(function () {
    $("#cancel").on("click", function () {
        location.reload();
    });
    $("#sendNoti").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../Controller/sendNotificatonController.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            success: (res) => {
                console.log(res);
                location.reload();
            },
            error: (err) => {
                err = Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Occupied Some Error!",
                });
            },
        });
    });
});

// pagination History

// Initializing.
let controllerURL = "../Controller/notificationPaginationController.php";

// For pagination:
let curPageIndex = 0;

if (historyList.length === 0) {
    // If no order is found:
    $(".notiHistory").empty();
    $(".notiHistory").append("<p class='noti-no-order'>No History Yet.</p>");
    $(".noti-pagination-previous").addClass("is-disabled");
    $(".noti-pagination-next").addClass("is-disabled");
} else {
    buildinstructorList();
}

// Main Function
function buildinstructorList() {
    // Fills Page Numbers in Pagination
    for (let i = 0; i < pages; i++) {
        $("#noti-list-pagination").append(
            `<li><a class="pagination-link noti-pagination-link" aria-label="Page ${i + 1
            }" aria-current="page">${i + 1}</a></li>`
        );
    }

    // Attaches Event Listeners for Previous/Next Buttons
    $(".noti-pagination-link").click((e) => changePage(e.target.textContent - 1));
    $(".noti-pagination-previous").click((e) => changePage(curPageIndex - 1));
    $(".noti-pagination-next").click((e) => changePage(curPageIndex + 1));

    // Displays Current Page (First page is clicked by default)
    $(".noti-pagination-link")[0].click();
}

// Changes Page
function changePage(nextIndex) {

    console.log(nextIndex);
    // << SHOWS LOADING SCREEN >>
    $.post(controllerURL, {
        pageNum: nextIndex
    },
        data => {
            data = JSON.parse(data);
            console.log(data.length);
            console.log(data[0]);
            showChangedPage(nextIndex, data)
        }
    );
}

// Renders New Data
function showChangedPage(nextIndex, data) {
    $(".notiHistory").empty();

    // Modifies previous and next buttons.
    if (nextIndex === 0) {
        $(".noti-pagination-previous").addClass("is-disabled");
    } else {
        $(".noti-pagination-previous").removeClass("is-disabled");
    }

    if (nextIndex === pages - 1) {
        $(".noti-pagination-next").addClass("is-disabled");
    } else {
        $(".noti-pagination-next").removeClass("is-disabled");
    }

    // Modifies Pagination Tabs
    document.querySelectorAll(".noti-pagination-link")[curPageIndex].classList.remove("is-current");
    curPageIndex = nextIndex;
    document.querySelectorAll(".noti-pagination-link")[curPageIndex].classList.add("is-current");

    // Renders the data.

    for (let i = 0, limit = data.length; i < limit; i++) {
        $(".notiHistory").append(`
            <a href="">
                <p class="textTitle">Header Text</p>
                <p class="title is-6">${data[i]['noti_title']}</p>
                <p class="textTitle">Detail Content</p>
                <p class="detailText">${data[i]['noti_body']}</p>
                <p class="time">Created at 8:30, June 10 2022</p>
                <hr />
            </a>
        `);
    }
}




