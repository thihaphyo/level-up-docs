// Initializing.
let controllerURL = 'http://localhost/level-up-docs_original/04.Development/Level_Up/Admin/Controller/orderlistController.php/';

// For pagination:
let curPageIndex = 0;

if (orderList.length === 0) {

    // If no order is found:
    $('.o-table').empty();
    $('.o-table').append(
        "<p class='o-no-order'>No order yet.</p>"
    );
    $('.o-pagination-previous').addClass('is-disabled');
    $('.o-pagination-next').addClass('is-disabled');

} else {
    buildorderList();
}

// Main Function
function buildorderList() {

    // Fills Page Numbers in Pagination
    for (let i = 0; i < pages; i++) {
        $('#o-list-pagination').append(
            `<li><a class="pagination-link o-pagination-link" aria-label="Page ${i + 1}" aria-current="page">${i + 1}</a></li>`);
    }

    // Attaches Event Listeners for Previous/Next Buttons
    $('.o-pagination-link').click(e => changePage(e.target.textContent - 1));
    $('.o-pagination-previous').click(e => changePage(curPageIndex - 1));
    $('.o-pagination-next').click(e => changePage(curPageIndex + 1));

    // Displays Current Page (First page is clicked by default)
    $('.o-pagination-link')[0].click();
}

// Changes Page
function changePage(nextIndex) {

    // << SHOWS LOADING SCREEN >>

    $.post(controllerURL, {
        pageNum: nextIndex
    }, data => {
        data = JSON.parse(data);
        showChangedPage(nextIndex, data);
    }
    )
}

// Renders New Data
function showChangedPage(nextIndex, data) {

    $('.o-table').empty();

    // Modifies previous and next buttons.
    if (nextIndex === 0) {
        $('.o-pagination-previous').addClass('is-disabled');
    } else {
        $('.o-pagination-previous').removeClass('is-disabled');
    }

    if (nextIndex === pages - 1) {
        $('.o-pagination-next').addClass('is-disabled');
    } else {
        $('.o-pagination-next').removeClass('is-disabled');
    }

    // Modifies Pagination Tabs
    document.querySelectorAll('.o-pagination-link')[curPageIndex].classList.remove('is-current');
    curPageIndex = nextIndex;
    document.querySelectorAll('.o-pagination-link')[curPageIndex].classList.add('is-current');

    // Renders the data.

    for (let i = 0, limit = data.length; i < limit; i++) {
        $('.o-table').append(
            // HTML string.
        );
    }
}