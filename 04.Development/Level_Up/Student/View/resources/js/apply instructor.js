let emailInput,
  phoneInput,
  graduatedYearsInput,
  addMoreBtn,
  emailRegx,
  warning,
  count = 0,
  applyNowBtn,
  failMessage,
  allowSubmit = {
    email: true,
    phone: true,
    gyear: true,
    to: true,
    from: true,
  },
  tempoStorage;
emailRegx =
  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

emailInput = document.querySelector("input[name='email']");
phoneInput = document.querySelector("input[name='phone']");

addMoreBtn = document.getElementById("addMore");
applyNowBtn = document.getElementById("applyNow");
failMessage = document.getElementsByClassName("notification")[0];

emailInput.onkeyup = function () {
  warning = this.parentNode.children[2];
  if (!emailRegx.test(this.value)) {
    warning.classList.remove("is-hidden");
    this.classList.add("is-danger");
    allowSubmit.email = false;
  } else {
    warning.classList.add("is-hidden");
    this.classList.remove("is-danger");
    allowSubmit.email = true;
  }
};
phoneInput.onkeyup = function () {
  warning = this.parentNode.children[1];
  if (this.value.length < 9) {
    warning.classList.remove("is-hidden");
    this.classList.add("is-danger");
    allowSubmit.phone = false;
  } else {
    warning.classList.add("is-hidden");
    this.classList.remove("is-danger");
    allowSubmit.phone = true;
  }
};

const updateInput = () => {
  graduatedYearsInput = document.getElementsByClassName("years");
  for (const key in graduatedYearsInput) {
    graduatedYearsInput[key].onkeyup = function () {
      warning = this.parentNode.children[2];
      console.log(this.name);

      if (this.value.length > 4 || this.value.length < 4) {
        warning.classList.remove("is-hidden");
        this.classList.add("is-danger");
        tempoStorage = false;
      } else {
        warning.classList.add("is-hidden");
        this.classList.remove("is-danger");
        tempoStorage = true;
      }
      allowSubmit[this.name] = tempoStorage;
      console.log(allowSubmit);
    };
  }
};

updateInput();

addMoreBtn.onclick = function () {
  count += 1;
  document.getElementById("addMoreContent").innerHTML;
  updateInput();
};

if (failMessage) {
  setTimeout(() => {
    failMessage.classList.remove("slide-in-bottom");
    failMessage.classList.add("slide-out-bottom");
  }, 5000);
}

document.getElementById("applyForm").addEventListener("submit", (event) => {
  if (
    allowSubmit.email != true ||
    allowSubmit.phone != true ||
    allowSubmit.gyear != true ||
    allowSubmit.from != true ||
    allowSubmit.to != true
  ) {
    document.getElementById("finalWarning").classList.remove("is-hidden");
    event.preventDefault();
  }
});
