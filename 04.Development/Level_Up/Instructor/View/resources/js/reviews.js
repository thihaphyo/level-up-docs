const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// For pagination:
let curPageIndex = 0;

if (reviews.length === 0) {

    // If no order is found:
    $('.r-cards-container').empty();
    $('.r-cards-container').append(
        "<p class='r-no-review'>No review yet.</p>"
    );
    $('.r-pagination-previous').addClass('is-disabled');
    $('.r-pagination-next').addClass('is-disabled');

} else {
    buildReviewList();
}

// Main Function
function buildReviewList() {

    // Fills Pagination
    for (let i = 0; i < pages; i++) {
        $('#r-list-pagination').append(
            `<li><a class="pagination-link r-pagination-link" aria-label="Page ${i + 1}" aria-current="page">${i + 1}</a></li>`);
    }

    // Attaches Event Listeners
    $('.r-pagination-link').click(e => changePage(e.target.textContent - 1));
    $('.r-pagination-previous').click(e => changePage(curPageIndex - 1));
    $('.r-pagination-next').click(e => changePage(curPageIndex + 1));

    // Displays Current Page
    $('.r-pagination-link')[0].click();
}

// Changes Page
function changePage(nextIndex) {

    // << SHOWS LOADING SCREEN >>
    $.post(controllerURL, {
        pageNum: nextIndex
    }, data => {
        data = JSON.parse(data);
        console.log(data);
        showChangedPage(nextIndex, data)
    }
    )
}

function showChangedPage(nextIndex, reviews) {

    $('.r-cards-container').empty();

    // Modifies that previous and next buttons.
    if (nextIndex === 0) {
        $('.r-pagination-previous').addClass('is-disabled');
    } else {
        $('.r-pagination-previous').removeClass('is-disabled');
    }

    if (nextIndex === pages - 1) {
        $('.r-pagination-next').addClass('is-disabled');
    } else {
        $('.r-pagination-next').removeClass('is-disabled');
    }

    // Modifies Pagination Tabs
    document.querySelectorAll('.r-pagination-link')[curPageIndex].classList.remove('is-current');
    curPageIndex = nextIndex;
    document.querySelectorAll('.r-pagination-link')[curPageIndex].classList.add('is-current');

    // Displays the List
    
for (ele in reviews) {
    // Adds the title
    $('.r-cards-container').append(
        `<p class='r-course-title'>${reviews[ele][0]['title']} <span class='r-course-avg'>(
                <img src="../View/resources/img/icons/rating_icon.png" alt="rating"/> ${reviews[ele][0]['average'][0]['average']}/5)</span></p>`
    )

        for (let i = 1, count = reviews[ele].length; i < count; i++) {
            let dateStamp = new Date(reviews[ele][i]['created_at']);

            $('.r-cards-container').append(
                "<div class='r-review-card'>"
                + "<div class='r-card-head'>"

                + `<div class='r-card-pic'>${(reviews[ele][i]['full_name'])[0]}</div>`
                + "<div class='r-card-head-rating-name'>"
                + `<div class='r-card-rating' style='--percent:${(reviews[ele][i]['rating'] / 5) * 100}%;'>`
                + "★★★★★"
                + "</div>"
                + "<div class='r-card-name'>"
                + reviews[ele][i]['full_name']
                + "</div> </div>"
                + "<p class='r-card-date'>"
                + months[dateStamp.getMonth('MM')] + " " + dateStamp.getFullYear()
                + "</p></div>"

                + "<div class='r-card-body'>"
                + reviews[ele][i]['review']
                + "</div>"

                + "</div>"
            )
        }
    }
}