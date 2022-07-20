import { getIframeVimeo } from './videoAPI.js'; // Video Reader


// Initializing.
let lectureIndex, curIndex; // Index of current lecture in the lecture list.
let formerID = null; // ID of ChapterBox currently opened.
showChapList();
showChap(chapList[0]['id']);
showLecture(0);


// Puts the names of the chapter from chapList and displays them in l-nav.
function showChapList () {
    let index = 0;
    for(let chap of chapList){
        $('.l-nav').append(
            `<div class='l-chapter-box' id='l-chapter-box-${chap['id']}'><p class='l-chapter-title' id='l-chapter-id-${chap['id']}'>Chapter ${++index}: ${chap['chapter_title']}</p><div id='l-chapter-details-${chap['id']}'></div></div>`);
    }
    $('.l-chapter-title').click((e) => {
        let chapID = e.target.id.slice(13);
        getChap(chapID);
    })
}

// Gets the lecture list of selected chapter.
function getChap (chapID){
    $.post('http://localhost/Student/Controller/LectureController.php', {newChapID: chapID, course_id: courseID}, (data) => {
            chapDetails = JSON.parse(data);
            showChap(chapID);
            showLecture(0);
        })
}

// Displays the lecture list in l-nav.
function showChap (id) {

    // Clears lecture list from former chapter
    if(formerID !== null){
        $(`#l-chapter-details-${formerID}`).empty();
    }
    formerID = id;

    // Shows lecture list in l-Nav
    let lectureStr = '';
    lectureIndex = 0;   
    for(let lecture of chapDetails){
        lectureStr += `<li class='l-lecture-title' id='l-lecture-${lectureIndex++}'>${lecture['lecture_title']}</li>`;
    }
    $(`#l-chapter-details-${id}`).append(
        `<ul class='l-lecture-list'>${lectureStr}</ul>`
    );

    $('.l-lecture-title').click((e)=>{
        let id = e.target.id.slice(10);
        showLecture(id);
    })

    
}

// Displays the selected lecture in l-body.
function showLecture (index) {
    
    $(`#l-lecture-${curIndex}`).removeClass('l-selected-lecture');
    curIndex = Number(index); 
    $(`#l-lecture-${curIndex}`).addClass('l-selected-lecture');

    $('.l-body').empty();
    $('.l-quiz-form').empty();
    let lecture = chapDetails[index];

    $('.l-body').append(`<p class='l-body-title'>${lecture['lecture_title']}</p>`);
    $('.l-body').append(`<p class='l-body-txt'>${lecture['lecture_description']}</p>`);
    $('.l-body').append(`<div class='l-body-video'></div>`);
    
    getIframeVimeo(lecture['video_url'], appendVideo);

    $('.l-body').append(`<p class='l-body-txt'>${lecture['lecture_script']}</p>`);

    $('.l-body').append("<div class='l-btns'></div>");

    // Prepare Quizzes (if any).
    $.post('http://localhost/Student/Controller/LectureController.php', 
            {quizForLecture: lecture['id'], course_id: courseID}, 
            (data) => {
                // If no quiz, do nothing.
                if(data !== ''){
                    data = JSON.parse(data);
                    $('.l-btns').append(
                        `<a class="l-body-quiz button is-primary is-outlined has-text-weight-semibold" id='l-quiz-${lecture['id']}'>Quiz</a>`);
                    $('.l-body-quiz').click(() => showQuiz(data));
                }

                // Add the next button regardless.
                $('.l-btns').append(`<a class="l-body-next button is-primary has-text-weight-semibold">Next</a>`);

                $('.l-body-next').click(nextBtnClicked);
            
            })
}

// Helper function for embedding videos.
function appendVideo(iframe){
    $('.l-body-video').html(iframe);
}

// Helper function to open/close the modal.
function switchModal (cmd) {
    if (cmd === 0){
        $('.l-modal').removeClass('is-active');
        $('.l-quiz-form').empty();
    } else if (cmd === 1){
        $('.l-modal').addClass('is-active');
    }
}

// Selects the next lecture in order.
function nextBtnClicked () {
    console.log('clicked', curIndex, lectureIndex);
    if(curIndex + 1 < lectureIndex){
        showLecture(curIndex + 1);
    } else {
        let newChap = nextChap();
        if(newChap === null){
            $('.l-body-next').text('End of Course');
            $('.l-body-next').unbind();
        } else {
            getChap(newChap);
        }
    }
}

// Selects the next chapter in order.
function nextChap () {
    for(let i = 0; i<(chapList.length)-1; i++){
        if(chapList[i]['id'] === Number(formerID)){
            return chapList[i+1]['id'];
        }
    }
    return null;
}

// Displays quizzes.
function showQuiz (data) {

    // Shows the quizzes.
    let quizIndex = 0;
    for(let quiz of data)
    {
        $('.l-quiz-form').append(`<p class='l-quiz-question'>${quizIndex+1}. ${quiz.question}</p>`);
        $('.l-quiz-form').append(`<div class='l-quiz-form-input-wrapper l-input-wrapper-${quizIndex}'></div>`);
        $(`.l-input-wrapper-${quizIndex}`).append(`<label class='radio'><input type='radio' name='quiz-answer-${quizIndex}' value = "${quiz.answer1}"/>${quiz.answer1}</label>`);
        $(`.l-input-wrapper-${quizIndex}`).append(`<label class='radio'><input type='radio' name='quiz-answer-${quizIndex}' value = "${quiz.answer2}"/>${quiz.answer2}</label>`);
        $(`.l-input-wrapper-${quizIndex}`).append(`<label class='radio'><input type='radio' name='quiz-answer-${quizIndex}' value = "${quiz.answer3}"/>${quiz.answer3}</label>`);
        quizIndex ++;
    };

    // The submit button.
    $('.l-quiz-submit').click(() => checkQuizzes(quizIndex,data));

    // Opens the modal.
    switchModal(1);
    
    // Closes the modal.
    $('.l-modal-close').click(e => {switchModal(0);})
}

// Checks user answers.
function checkQuizzes (quizIndex,data) {

    // Calculates the Score
    let score = 0;
    for(let i = 0; i<quizIndex; i++){
        let answer = "<p class='l-quiz-wrong'>Wrong</p>";
        if(document.querySelector('.l-quiz-form')[`quiz-answer-${i}`].value === data[i]['correct_answer']){
            score ++;
            answer = "<p class='l-quiz-correct'>Correct</p>";
        }

        // Shows if user answer is correct/wrong, and displays the correct answer.
        $(`.l-input-wrapper-${i}`).append(answer);
        $(`.l-input-wrapper-${i}`).append(`<p class='l-quiz-crtans'>${data[i]['correct_answer']}</p>`);
    }

    // Shows the score.
    $(`.l-modal-foot`).prepend(`<p class='l-quiz-score'>Your Score is ${score}/${quizIndex}</p>`);

    // Changes Event Listeners.
    $('.l-quiz-submit').unbind();
    $('.l-quiz-submit').text('OK');
    $('.l-quiz-submit').click(()=>{
        $(`.l-modal-foot`).empty();
        $(`.l-modal-foot`).html(
            '<a class="l-quiz-submit bl-body-next button is-primary has-text-weight-semibold">Submit</a>'
        )
        switchModal(0);
    })
}