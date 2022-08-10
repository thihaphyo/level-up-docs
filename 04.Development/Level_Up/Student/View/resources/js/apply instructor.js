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
  workExp = {},
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
const updateRemoveId = () => {
  for (const removeExpBtn of document.getElementsByClassName("remove-exp")) {
    removeExpBtn.onclick = function () {
      this.parentElement.parentElement.remove();
      if (document.getElementsByClassName("work-exp-info").length <= 0) {
        document
          .getElementsByClassName("no-exp-yet")[0]
          .classList.remove("is-hidden");
      }
    };
  }
};
updateInput();

const removeExp = (e) => {};

addMoreBtn.onclick = function () {
  for (const workExpInput of document.querySelectorAll(".wexp")) {
    // console.log(workExpInput.value <= 0);
    // workExpInput.value <= 0 ? (this.disabled = true) : (this.disabled = false);
    workExpInput.value.length <= 0
      ? (allowInsertExpState = false)
      : (allowInsertExpState = true);
    workExpInput.value.length <= 0
      ? document.getElementById("msgToUser2").classList.remove("is-hidden")
      : document.getElementById("msgToUser2").classList.add("is-hidde");

    workExp[workExpInput.name] = workExpInput.value;
  }
  if (allowInsertExpState) {
    document.getElementsByClassName("no-exp-yet")[0].classList.add("is-hidden");
    count += 1;
    document.getElementById("addMoreContent").innerHTML += `                   
    <div class="work-exp-info">
      <i class="fa-regular fa-file-lines fa-2xl"></i>
      <div>
        <h3>
             ${workExp["position"]} at ${workExp["company"]}
        </h3>
        <p>${workExp["from"]} - ${workExp["to"]} (${
      Number(workExp["to"] - workExp["from"]) + 1
    } years)</p>
        <p>${document.querySelector(`select[name="worktype"]`).value}</p>
        <input type="hidden" name="position${count}" value='${
      workExp["position"]
    }'>
        <input type="hidden" name="from${count}" value='${workExp["from"]}'>
        <input type="hidden" name="to${count}" value='${workExp["to"]}'>
        <input type="hidden" name="worktype${count}" value='${
      document.querySelector(`select[name="worktype"]`).value
    }
    }'>
        <input type="hidden" name="company${count}" value='${
      workExp["company"]
    }'>
      <a class="remove-exp" >Remove</a>

      </div>
    </div>`;
    updateInput();
    updateRemoveId();
    for (const key in workExp) {
      console.log(document.querySelector(`input[name="${key}"]`));
      document.querySelector(`input[name="${key}"]`).value = "";
    }
    document.getElementById("experience-modal").classList.remove("is-active");
  } else {
    this.disabled = false;
  }
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
