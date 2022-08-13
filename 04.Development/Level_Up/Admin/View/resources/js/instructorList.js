// Initializing.
let controllerURL = "../Controller/instructorListController.php";

// For pagination:
let curPageIndex = 0;

if (instructorList.length === 0) {
    // If no order is found:
    $(".instructors").empty();
    $(".instructors").append("<p class='o-no-order'>No order yet.</p>");
    $(".o-pagination-previous").addClass("is-disabled");
    $(".o-pagination-next").addClass("is-disabled");
} else {
    buildinstructorList();
}

// Main Function
function buildinstructorList() {
    // Fills Page Numbers in Pagination
    for (let i = 0; i < pages; i++) {
        $("#o-list-pagination").append(
            `<li><a class="pagination-link o-pagination-link" aria-label="Page ${i + 1
            }" aria-current="page">${i + 1}</a></li>`
        );
    }

    // Attaches Event Listeners for Previous/Next Buttons
    $(".o-pagination-link").click((e) => changePage(e.target.textContent - 1));
    $(".o-pagination-previous").click((e) => changePage(curPageIndex - 1));
    $(".o-pagination-next").click((e) => changePage(curPageIndex + 1));

    // Displays Current Page (First page is clicked by default)
    $(".o-pagination-link")[0].click();
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
    $(".instructors").empty();

    // Modifies previous and next buttons.
    if (nextIndex === 0) {
        $(".o-pagination-previous").addClass("is-disabled");
    } else {
        $(".o-pagination-previous").removeClass("is-disabled");
    }

    if (nextIndex === pages - 1) {
        $(".o-pagination-next").addClass("is-disabled");
    } else {
        $(".o-pagination-next").removeClass("is-disabled");
    }

    // Modifies Pagination Tabs
    document.querySelectorAll(".o-pagination-link")[curPageIndex].classList.remove("is-current");
    curPageIndex = nextIndex;
    document.querySelectorAll(".o-pagination-link")[curPageIndex].classList.add("is-current");

    // Renders the data.

    for (let i = 0, limit = data.length; i < limit; i++) {
        $(".instructors").append(`
        <div class="instructor">
        <div class="profile">
            <img src="../View/resources/img/${data[i]["profile_image"]}" alt="">
            <p class="detail"><a href="../Controller/instructorListByIDController.php?id=${data[i]["id"]}">more detail</a></p>
        </div>
        <div class="instructorName">
            <div class="name">Name
                <h2 class="title is-6">${data[i]["full_name"]}</h2>
            </div>
            <div class="phone">Phone
                <h2 class="title is-6">${data[i]["phone"]}</h2>
            </div>
        </div>
        <div class="exprience">Exprience
            <h2 class="title is-6">${data[i]["job_position"]}</h2>
        </div>
        <div class="address">
            <div class="road">Address
                <h2 class="title is-6">${data[i]["address"]}</h2>
            </div>
            <div class="email">Email
                <h2 class="title is-6">${data[i]["email"]}</h2>
            </div>
        </div>
    </div> 
        `);
    }
}
