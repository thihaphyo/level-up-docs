addQuizInit();

function addQuizz() {
  let postData = {
    question: $("#question").val(),
    answer1: $("#answer1").val(),
    answer2: $("#answer2").val(),
    answer3: $("#answer3").val(),
    realAnswer: $("#realAnswer").val(),
  };
  $.ajax({
    url: "../Controller/uploadQuizzController.php",
    type: "POST",
    data: { send: JSON.stringify(postData) },
    success: function (res) {
      document.getElementById("quizzs").innerHTML = "";
      $("#question").val("");
      $("#answer1").val("");
      $("#answer2").val("");
      $("#answer3").val("");
      let quizzData = JSON.parse(res);

      for (const quizz of quizzData) {
        addQuizzUI(quizz);
      }
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function addQuizInit() {
  $.get("../Controller/uploadQuizzController.php", function (data) {
    let quizzData = JSON.parse(data);

    for (const quizz of quizzData) {
      addQuizzUI(quizz);
    }
  });
}

var quizzLists = document.getElementById("quizzs");

let quizzArray = [];

function openQuizzBox() {
  document.getElementById("quizzBox").style.display = "block";
}

function closeQuizzBox() {
  document.getElementById("quizzBox").style.display = "none";
}

function addQuizzUI(quizzUI) {
  var quizzId = quizzUI.id;
  var question = quizzUI.question;
  var answer1 = quizzUI.answer1;
  var answer2 = quizzUI.answer2;
  var answer3 = quizzUI.answer3;
  var realAnswer = quizzUI.realAnswer;

  quizzLists.innerHTML += `
  <div class="quizz">
    <div class="dropdown is-hoverable">
        <div class="dropdown-trigger">
            <div class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
                <span class="question">${question}</span>
                <span class="icon is-small">
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </span>
            </div>
        </div>
        <div class="dropdown-menu" id="dropdown-menu4" role="menu">
            <div class="dropdown-content">
                <div class="dropdown-item answer1">
                    ${answer1}
                </div>
                <div class="dropdown-item answer2">
                    ${answer2}
                </div>
                <div class="dropdown-item answer3">
                    ${answer3}
                </div>
                <div class="dropdown-item realAnswer">
                    ${realAnswer}
                </div>
            </div>
        </div>
    </div>
    <div class="edit" onclick="deleteQuizz(this)" id=${quizzId}>
      <ion-icon name="trash-bin-outline"></ion-icon>
    </div>
  </div>
    `;

  closeQuizzBox();
}

function deleteQuizz(e) {
  e.parentElement.remove();

  let postData = {
    id: e.id,
  };

  $.ajax({
    url: "../Controller/deleteQuizzController.php",
    type: "POST",
    data: { send: JSON.stringify(postData) },
    success: function (res) {
      location.url = res;
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function showPreview(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("videoPreview");
    preview.src = src;
    preview.style.display = "block";
  }
}

// FORM VALIDATION
$(document).mousemove(activeLectureButton);

$(document).click(activeLectureButton);

$("#quizzBox").mousemove(activeQuizzButton);

$("#quizzBox").click(activeQuizzButton);

function activeLectureButton() {
  if (
    $("#videoPreview").prop("src") !== "" &&
    $("#lectureTitle").val() !== "" &&
    $("#lectureDescription").val() !== "" &&
    $("#lectureScripts").val() !== ""
  ) {
    $("#saveLectureButton").removeAttr("disabled");
  } else {
    $("#saveLectureButton").attr("disabled", true);
  }
}

function activeQuizzButton() {
  if (
    $("#question").val() !== "" &&
    $("#answer1").val() !== "" &&
    $("#answer2").val() !== "" &&
    $("#answer3").val() !== ""
  ) {
    $("#addQuizz").removeAttr("disabled");
  } else {
    $("#addQuizz").attr("disabled", true);
  }
}

/**
 * To Upload a Video to Vimeo:
 * 1. Create an instance with two arguments (1. File data from the form. 2. Name of the Video).
 * 2. Call the "uploadVideo" method and pass in a callback function as argument.
 */

class VideoUpload {
  constructor(videoFile, videoName) {
    this.videoFile = videoFile;
    this.videoName = videoName;
    this.accessToken = "bearer 78cd4b0d6b6674af07698460fdd014eb"; //ADD YOUR ACCESS TOKEN HERE;

    // Privacy settings:
    this.view = "unlisted";
    this.embed = "public";
  }

  async uploadVideo() {
    this.useVimeoApi(this.videoFile.size).then((res) => {
      let formURL = res.upload.form.split('"')[3];
      let videoURL = res.link;
      console.log(videoURL);
      this.uploadToVimeo(formURL, this.videoFile)
        .then((result) => {
          console.log("added");
          console.log(videoURL);
          // updateFunc(videoURL);
        })
        .catch((err) => console.log(err));
    });
  }

  async useVimeoApi(videoSize) {
    let res = await fetch("https://api.vimeo.com/me/videos", {
      method: "POST",
      headers: {
        Authorization: this.accessToken,
        "Content-Type": "application/json",
        Accept: "application/vnd.vimeo.*+json;version=3.4",
      },
      body: JSON.stringify({
        upload: {
          approach: "post",
          size: videoSize,
        },
        name: this.videoName,
        privacy: { view: this.view, embed: this.embed },
      }),
    });

    return await res.json();
  }

  async uploadToVimeo(url, videoFile) {
    let formData = new FormData();
    formData.append("file_data", videoFile);

    let res = await fetch(url, {
      method: "POST",
      headers: {
        Accept: "application/json",
      },
      body: formData,
    });

    return res;
  }
}

$("#saveLectureButton").click(async function () {
  let form = document.getElementById("videoUploadForm");
  let videoFile = form["video"].files[0];
  let videoName = form["lectureTitle"].value;

  console.log(videoFile, videoName);

  let videoUploader = new VideoUpload(videoFile, videoName);

  videoUploader.uploadVideo();
});
