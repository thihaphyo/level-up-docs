// document.addEventListener('contextmenu',(e)=>{
//     e.preventDefault();
//   }
//   );
//   document.onkeydown = function(e) {
//   if(event.keyCode == 123) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//      return false;
//   }
// }
axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";

const signIn = () => {
  axios
    .post("/Student/Controller/auth/SignIn.php", {
      email: $("#email").val(),
      pWord: $("#pass").val(),
    })
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const users = response.data.data;
        window.location.replace("./index.php");
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
    //    hideLoading();
    }); ;
};

$("document").ready(function () {
  checkState();
});

$("#btnSignInUp").click(function () {
  signIn();
});

$("#btn_sigin_signup").click(function () {
  window.location.replace("./signup.html");
});

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
    $("#btnSignInUp").attr("disabled", false);
  } else {
    $("#btnSignInUp").attr("disabled", true);
  }
}

// const showLoading = () => {
//   Loader.open();
// };

// const hideLoading = () => {
//   Loader.close();
// };
