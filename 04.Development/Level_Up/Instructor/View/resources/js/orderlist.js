// Initializing.
let controllerURL = 'http://localhost/level-up-docs_original/04.Development/Level_Up/Instructor/Controller/orderlistController.php/';
let downloadCsvURL = "http://localhost/level-up-docs_original/04.Development/Level_Up/Instructor/Controller/orderlistDownloads/temp.csv";

instructorId = 5;

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

    // Fills Pagination
    for (let i = 0; i < pages; i++) {
        $('#o-list-pagination').append(
            `<li><a class="pagination-link o-pagination-link" aria-label="Page ${i + 1}" aria-current="page">${i + 1}</a></li>`);
    }

    // Attaches Event Listeners
    $('.o-pagination-link').click(e => changePage(e.target.textContent - 1));
    $('.o-pagination-previous').click(e => changePage(curPageIndex - 1));
    $('.o-pagination-next').click(e => changePage(curPageIndex + 1));

    // Displays Current Page
    $('.o-pagination-link')[0].click();
}

// Changes Page
function changePage(nextIndex) {

    console.log(nextIndex);

    // << SHOWS LOADING SCREEN >>
    $.post(controllerURL, {
        pageNum: nextIndex
    }, data => {
        data = JSON.parse(data);
        console.log(data.length);
        console.log(data[0]);
        showChangedPage(nextIndex, data)
    }
    )
}

// Renders New Data
function showChangedPage(nextIndex, data) {

    $('.o-table').empty();

    // Modifies that previous and next buttons.
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

    // Displays the List
    $('.o-table').append(
        `<tr>
            <th>Student</th>
            <th>Course</th>
            <th>Price</th>
            <th>Purchased Date</th>
        </tr>`
    );

    for (let i = 0, limit = data.length; i < limit; i++) {
        $('.o-table').append(
            `<tr>
                <td class="o-td-student">
                    <p class="o-student-name">
                        ${data[i]['full_name']}
                    </p>
                    <p class="o-student-email">
                        ${data[i]['email']}
                    </p>
                </td>
                <td>
                    ${data[i]['course_title']}
                </td>
                <td>
                    ${(data[i]['order_price']).toLocaleString('en-US')}
                </td>
                <td>
                    ${data[i]['created_at'].slice(0, 10)}
                </td>
            </tr>`
        );
    }
}

// Downloads All Data
$('#o-download-list').click(e => {
    console.log('clicked here');
    $.post(controllerURL, {downloadAll: instructorId},
        data => {
            window.location = downloadCsvURL;
        });
});