let inputValidate,
  emailRegex,
  pwdMustContain,
  lowerCaseChar = /[a-z]/g,
  upperCaseChar = /[A-Z]/g,
  mustNumbers = /[0-9]/g,
  characters,
  capital,
  theNum,
  length,
  allowSubmit = { name: false, email: false, password: false },
  submitBtn,
  profiles,
  theData;

// get each pwd condition elements
characters = document.getElementById("char");
capital = document.getElementById("capital");
theNum = document.getElementById("numbers");
length = document.getElementById("length");

//select input password element
pwdMustContain = document.querySelector("input[type=password]");

// select all inputs to be validated
inputValidate = document.getElementsByClassName("input-validate");

// select the buttons of submit button
submitBtn = document.getElementsByClassName("admin-submit");

//select profile container
profiles = document.getElementsByClassName("profile");

//add change action and get the filename
document.getElementById("image-upload").addEventListener("change", (event) => {
  fileName = event.target.files[0].name;
  document.getElementById("image-name").innerHTML = fileName;
});

const validateForm = (inputName) => {
  //validating email input

  theData = inputName.target.value;

  if (inputName.target.name == "name") {
    theData.length < 4
      ? (inputName.path[1].children[2].style.display = "block")
      : (inputName.path[1].children[2].style.display = "none");

    theData.length < 4 ? (allowSubmit.name = false) : (allowSubmit.name = true);
  }

  if (inputName.target.name == "email") {
    //email format regeular expression
    emailRegex =
      /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    !emailRegex.test(theData)
      ? (inputName.path[1].children[2].style.display = "block")
      : (inputName.path[1].children[2].style.display = "none");

    !emailRegex.test(theData)
      ? (allowSubmit.email = false)
      : (allowSubmit.email = true);
  }

  // validating password format
  if (inputName.target.name == "pwd") {
    if (theData.match(lowerCaseChar)) {
      characters.classList.remove("pwd-invalid");
      characters.classList.add("pwd-valid");
      allowSubmit.password = true;
    } else {
      characters.classList.remove("pwd-valid");
      characters.classList.add("pwd-invalid");
      inputName.path[1].children[2].style.display = "block";
      allowSubmit.password = false;
    }

    // Validate capital letters
    if (theData.match(upperCaseChar)) {
      capital.classList.remove("pwd-invalid");
      capital.classList.add("pwd-valid");
      inputName.path[1].children[2].style.display = "none";
      allowSubmit.password = true;
    } else {
      capital.classList.remove("pwd-valid");
      capital.classList.add("pwd-invalid");
      inputName.path[1].children[2].style.display = "block";
      allowSubmit.password = false;
    }

    // Validate numbers
    if (theData.match(mustNumbers)) {
      theNum.classList.remove("pwd-invalid");
      theNum.classList.add("pwd-valid");
      inputName.path[1].children[2].style.display = "none";

      allowSubmit.password = true;
    } else {
      theNum.classList.remove("pwd-valid");
      theNum.classList.add("pwd-invalid");
      inputName.path[1].children[2].style.display = "block";
      allowSubmit.password = false;
    }

    // Validate length
    if (theData.length >= 8) {
      length.classList.remove("pwd-invalid");
      length.classList.add("pwd-valid");
      inputName.path[1].children[2].style.display = "none";
      allowSubmit.password = true;
    } else {
      length.classList.remove("pwd-valid");
      length.classList.add("pwd-invalid");
      inputName.path[1].children[2].style.display = "block";
      allowSubmit.password = false;
    }
  }

  if (inputName.target.name == "phone") {
    theData.length < 9
      ? (inputName.path[1].children[2].style.display = "block")
      : (inputName.path[1].children[2].style.display = "none");

    theData.length < 9
      ? (allowSubmit.phone = false)
      : (allowSubmit.phone = true);
  }
};

// add key up events on every input
for (const input of inputValidate) {
  input.addEventListener("keyup", (e) => {
    validateForm(e);
  });
}

//add click evetnts on every submit buttn
for (const btn of submitBtn) {
  btn.addEventListener("click", (e) => {
    if (!document.querySelector("input[name='profile']").value) {
      // display message to the user
      document.getElementsByClassName("final-warning")[0].innerHTML =
        "*Please choose a image for your profile*";
      document.getElementsByClassName("final-warning")[0].style.display =
        "block";
    } else if (
      allowSubmit.name != true ||
      allowSubmit.email != true ||
      allowSubmit.password != true ||
      allowSubmit.phone != true
    ) {
      console.log(document.getElementsByClassName("final-warning")[0]);
      document.getElementsByClassName("final-warning")[0].innerHTML =
        "*Some of input is not macth with the format.*";
      document.getElementsByClassName("final-warning")[0].style.display =
        "block";
    } else {
      console.log("hello");
      document
        .getElementsByClassName("admin-form")[0]
        .removeAttribute("onsubmit");
    }
    console.log(allowSubmit);
  });
}

// When the user clicks on the password field, show the message box
pwdMustContain.onfocus = function () {
  document.getElementsByClassName("password-must-contain")[0].style.display =
    "block";
};

// When the user clicks outside of the password field, hide the message box
pwdMustContain.onblur = function () {
  document.getElementsByClassName("password-must-contain")[0].style.display =
    "none";
};
