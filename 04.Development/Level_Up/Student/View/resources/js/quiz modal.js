let questionCount = 0,
  checkNowBtn,
  message,
  totalResult,
  mark = 0;

document.addEventListener("DOMContentLoaded", () => {
  // Functions to open and close a modal
  function openModal($el) {
    $el.classList.add("is-active");
  }

  function closeModal($el) {
    $el.classList.remove("is-active");
  }

  function closeAllModals() {
    (document.querySelectorAll(".modal") || []).forEach(($modal) => {
      closeModal($modal);
    });
  }

  // Add a click event on buttons to open a specific modal
  (document.querySelectorAll(".js-modal-trigger") || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);

    $trigger.addEventListener("click", () => {
      openModal($target);
    });
  });

  // Add a click event on various child elements to close the parent modal
  (
    document.querySelectorAll(
      ".modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .cancel-quiz"
    ) || []
  ).forEach(($close) => {
    const $target = $close.closest(".modal");

    $close.addEventListener("click", () => {
      closeModal($target);
    });
  });
});
axios
  .post(
    `http://localhost/LEVEL UP/04.Development/Level_Up/Student/Controller/quizController.php`,
    {
      route: "get",
      timeout: 10000,
    }
  )
  .then((response) => {
    const { data } = response;

    for (const quizInfo of data) {
      questionCount += 1;
      document.getElementById("quizContent").innerHTML += `
      <div class="mb-3">

      <label class="has-text-weight-medium">Question ${questionCount} of ${data.length}</label>
      <h3 class="is-size-5 has-text-weight-medium">Q.A.${quizInfo.question}</h3>
      <div class="control is-flex is-flex-direction-column">
          <label class="radio p-4 is-capitalized">
              <input type="radio" name="answer${questionCount}" value="1">
              A. ${quizInfo.answer1}
          </label>
          <label class="radio p-4 is-capitalized">
              <input type="radio" name="answer${questionCount}" value="2">
              B. ${quizInfo.answer2}
          </label>
          <label class="radio p-4 is-capitalized">
              <input type="radio" name="answer${questionCount}" value="3">
              C. ${quizInfo.answer3}
          </label>
          <input type="hidden" name="qAHw2" value="${quizInfo.correct_answer}"></input>

        </div>
      </div>
    `;
    }
  })
  .catch((err) => {
    console.error(err);
  });
// console.log(answer);
checkNowBtn = document.getElementById("checkQuizNow");
totalResult = document.getElementById("finalResult");
message = document.getElementById("msgToUser");
checkNowBtn.onclick = function () {
  if (
    document.querySelectorAll("input[type='radio']:checked").length ==
    questionCount
  ) {
    message.classList.add("is-hidden");
    for (let index = 0; index < questionCount; index++) {
      if (
        document.querySelectorAll("input[type='radio']:checked")[index].value ==
        document.querySelectorAll("input[name='qAHw2']")[index].value
      ) {
        document
          .querySelectorAll("input[type='radio']:checked")
          [index].parentElement.classList.add("has-text-success");
        mark += 1;
      } else {
        document
          .querySelectorAll("input[type='radio']:checked")
          [index].parentElement.classList.add("has-text-danger");

        for (const input of document.querySelectorAll(
          "input[type='radio']:checked"
        )[index].parentElement.parentElement.children) {
          console.log(input.children[0]);
          console.log(input.children[0].value);
          if (
            input.children[0].value ==
            document.querySelectorAll("input[name='qAHw2']")[index].value
          ) {
            input.children[0].parentElement.classList.add("has-text-success");
            break;
          }
        }
      }
    }
    totalResult.classList.remove("is-hidden");
    totalResult.innerHTML = `Result: ${(mark * 100) / questionCount} of 100`;
  } else {
    message.classList.remove("is-hidden");
  }
};
