import { InputValidation } from "./utils.js";

let validateMyInfo = new InputValidation();
// select all inputs to be validated
let fullname,
  password,
  warning,
  email,
  phoneNum,
  allowSubmit = {
    name: true,
    pwd: true,
    email: true,
    ph: true,
  },
  profileImage,
  submitBtn,
  allWarning,
  finalWarning,
  adminForm,
  fileName;

fullname = document.querySelector("[name='name']");
password = document.querySelector("[name='pwd']");
email = document.querySelector("[name='email']");
phoneNum = document.querySelector("[name='phone']");
profileImage = document.querySelector("input[name='profile']");
allWarning = document.getElementsByClassName("warning");

for (const warning of allWarning) {
  warning.classList.add("hidden");
}

// validate name format
fullname.onkeyup = function () {
  warning = this.parentNode.children[2];
  allowSubmit.name = validateMyInfo.validateName(this.value);
  !allowSubmit.name
    ? warning.classList.remove("hidden")
    : warning.classList.add("hidden");
};

// validate email format
email.onkeyup = function () {
  warning = this.parentNode.children[2];
  allowSubmit.email = validateMyInfo.validateEmail(this.value);
  !allowSubmit.email
    ? warning.classList.remove("hidden")
    : warning.classList.add("hidden");
};

// validate passwrod format
password.onkeyup = function () {
  warning = this.parentNode.children[2];
  allowSubmit.ph = validateMyInfo.validatePassword(this.value);
  !allowSubmit.ph
    ? warning.classList.remove("hidden")
    : warning.classList.add("hidden");
  console.log(allowSubmit);
};

// validate phone number
phoneNum.onkeyup = function () {
  warning = this.parentNode.children[2];
  allowSubmit.ph = validateMyInfo.validatePhoneNum(this.value);
  !allowSubmit.ph
    ? warning.classList.remove("hidden")
    : warning.classList.add("hidden");
  console.log(allowSubmit);
};

submitBtn = document.getElementsByClassName("admin-submit")[0];
finalWarning = document.getElementsByClassName("final-warning")[0];
adminForm = document.getElementsByClassName("admin-form")[0];

submitBtn.addEventListener("click", (e) => {
  console.log("this is insert btn");
  if (!profileImage.value) {
    // display message to the user
    finalWarning.innerHTML = "*Please choose a image for your profile*";
    finalWarning.classList.remove("hidden");
  } else if (
    allowSubmit.name != true ||
    allowSubmit.email != true ||
    allowSubmit.pwd != true ||
    allowSubmit.ph != true
  ) {
    finalWarning.innerHTML = "*Some of input is not macth with the format.*";
    finalWarning.classList.remove("hidden");
  } else {
    adminForm.removeAttribute("onsubmit");
  }
});

//when changes happen, get the filename and show it to user
profileImage.addEventListener("change", (event) => {
  fileName = event.target.files[0].name;
  document.getElementsByClassName("profile-image")[0].style.backgroundColor =
    "#FFFFFF";
  document.getElementById("image-name").style.color = "#706D6D";
  document.getElementById("image-name").innerHTML = fileName;
  document.getElementById("image-background").width = "0%";
  document.getElementsByClassName(
    "update-image-name"
  )[0].style.backgroundColor = "#706D6D";
});
