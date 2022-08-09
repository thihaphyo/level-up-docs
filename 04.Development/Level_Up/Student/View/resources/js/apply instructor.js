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
  tempoStorage,
  allowInsertExpState;
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
  for (const workExpInput of document.querySelectorAll(".wexp")) {
    // console.log(workExpInput.value <= 0);
    // workExpInput.value <= 0 ? (this.disabled = true) : (this.disabled = false);
    workExpInput.value <= 0
      ? (allowInsertExpState = false)
      : (allowInsertExpState = true);
    workExpInput.value <= 0
      ? document.getElementById("msgToUser2").classList.remove("is-hidden")
      : document.getElementById("msgToUser2").classList.add("is-hidde");
  }
  if (allowInsertExpState) {
    console.log("sss");
    count += 1;
    document.getElementById("addMoreContent").innerHTML += `                   
    <div>
      <i class="fa-regular fa-file-lines fa-2xl"></i>
      <div>
        <h3>
            Web Design at Meta
        </h3>
        <p>2016 - present (5 years)</p>
        <p>Full-Time</p>
        <input type="hidden" name="position">
        <input type="hidden" name="years">
        <input type="hidden" name="worktype">
        <input type="hidden" name="company">
      </div>
    </div>`;
    updateInput();
  }
  this.disabled = false;
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
