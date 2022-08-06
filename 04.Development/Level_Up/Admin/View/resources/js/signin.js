$(document).ready(function () {});

$("#email,#pass").keyup(function () {
  let errors = validateForm();
  console.log(errors);
  if (errors.length == 0) {
    //success
    canSubmit = true;
    checkState();
  } else {
    canSubmit = false;
    checkState();
  }
});

const validateForm = () => {
  var emailRegex =
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

  var errors = [];

  if (!emailRegex.test($("#email").val())) {
    errors.push({ input: "email", message: "Invalid e-mail address" });
  }

  if ($("#pass").val() == null || $("#pass").val() == "") {
    errors.push({ input: "pass", message: "Invalid Password" });
  }

  return errors;
};
function checkState() {
  if (canSubmit) {
    $("#btnSignIn").attr("disabled", false);
  } else {
    $("#btnSignIn").attr("disabled", true);
  }
}

let canSubmit = false;
axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";

const signIn = () => {
  axios
    .post("/Admin/Controller/adminController/SignIn.php", {
      email: $("#email").val(),
      pWord: $("#pass").val(),
    })
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const user = response.data.data;
        console.log(user.admin.access_token);
        // localStorage.setItem("access_token", user.students.access_token);
        window.location.replace("./dashboard.php");
      } else if (statusCode == 403) {
        window.alert(message);
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      //    hideLoading();
    });
};

$("#btnSignIn").click(function () {
  signIn();
});

const showLoading = () => {
  let svgContainer = document.querySelector(".bodymovinanim");
  let animItem = bodymovin.loadAnimation({
    wrapper: svgContainer,
    animType: "svg",
    loop: true,
    path: "https://assets6.lottiefiles.com/packages/lf20_qjosmr4w.json",
  });
};
