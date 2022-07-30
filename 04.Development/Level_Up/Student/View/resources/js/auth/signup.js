// document.addEventListener("contextmenu", (e) => {
//   e.preventDefault();
// });
// document.onkeydown = function (e) {
//   if (event.keyCode == 123) {
//     return false;
//   }
//   if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)) {
//     return false;
//   }
//   if (e.ctrlKey && e.shiftKey && e.keyCode == "C".charCodeAt(0)) {
//     return false;
//   }
//   if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
//     return false;
//   }
//   if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
//     return false;
//   }
// };
axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";
let canSubmit = false;

const signUp = () => {
  axios
    .post("/Student/Controller/auth/SignUp.php", {
      uName: $("#uName").val(),
      email: $("#email").val(),
      pass: $("#pass").val(),
    })
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 201) {
        console.log(`POST users`, message);
        window.location.replace("./signin.html");
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error));
};

$("#btn_signin").click(function () {
  window.location.replace("./signin.html");
});

$("#btnSignUp").click(function () {
  signUp();
});

$("document").ready(function () {
  if (localStorage.getItem("access_token") != null) {
    window.location.replace("./index.php");
  } else {
    checkState();
  }
});

$("#email,#uName,#pass,#cPass").keyup(function () {
  let errors = validateForm();
  console.log(errors);
  if (errors.length == 0) {
    //success
    $("#pass").removeClass("is-danger");
    $("#cPass").removeClass("is-danger");
    $("#email").removeClass("is-danger");
    $("#uName").removeClass("is-danger");
    canSubmit = true;
    checkState();
  } else {
    canSubmit = false;

    $("#pass").removeClass("is-danger");
    $("#cPass").removeClass("is-danger");
    $("#email").removeClass("is-danger");
    $("#uName").removeClass("is-danger");

    if (errors.some((e) => e.input === "email")) {
      $("#email").addClass("is-danger");
    }
    if (errors.some((e) => e.input === "uName")) {
      $("#uName").addClass("is-danger");
    }
    if (errors.some((e) => e.input === "pass")) {
      $("#pass").addClass("is-danger");
    }
    if (errors.some((e) => e.input === "cPass")) {
      $("#pass").addClass("is-danger");
      $("#cPass").addClass("is-danger");
    }
    checkState();
  }
});

const validateForm = (isConfirmPassword) => {
  var emailRegex =
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  var userNameRegex = /^[a-zA-Z0-9_ ]*$/;
  var eightDigit = /\b\d{8}\b/g;

  var errors = [];

  if (!emailRegex.test($("#email").val())) {
    // $('#email').addClass('is-danger');
    errors.push({ input: "email", message: "Invalid e-mail address" });
  }

  if (!userNameRegex.test($("#uName").val())) {
    // $('#uName').addClass('is-danger');
    errors.push({ input: "uName", message: "Invalid username" });
  }

  if (!eightDigit.test($("#pass").val())) {
    // $('#pass').addClass('is-danger');
    errors.push({ input: "pass", message: "Invalid Password" });
  }

  if ($("#pass").val() != $("#cPass").val()) {
    // $('#pass').addClass('is-danger');
    // $('#cPass').addClass('is-danger');
    errors.push({
      input: "cPass",
      message: "Confirm password must same with password!",
    });
  }

  return errors;
};
function checkState() {
  if (canSubmit) {
    $("#btnSignUp").attr("disabled", false);
  } else {
    $("#btnSignUp").attr("disabled", true);
  }
}
