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
  document.getElementById("addMoreContent").innerHTML += `
  <!-- start of input columns -->
  <div class="columns mb-6">

      <!-- start of column -->
      <div class="column is-half">
          <p class="is-size-5 has-text-weight-semibold mb-5">Job Position</p>
          <input class="input is-medium has-text-weight-medium" type="text" placeholder="e.g. Web Developer" name="positionExtra${count}" required>
      </div>
      <!-- end of input column -->


      <!-- start of input column -->
      <div class="column is-half is-flex">

          <!-- start of input from column -->
          <div class="column">
              <p class="is-size-5 has-text-weight-semibold mb-4">From</p>
              <input class="input is-medium has-text-weight-medium years" type="number" placeholder="e.g. 2016" name="fromExtra${count}" required>
              <p class="warning is-italic pt-1 has-text-danger is-hidden">* Please enter the year correctly *</p>
          </div>
          <!-- end of input from column -->


          <!-- start of input to column -->
          <div class="column">
              <p class="is-size-5 has-text-weight-semibold mb-4">To</p>
              <input class="input is-medium has-text-weight-medium years" type="number" placeholder="e.g. 2018" name="toExtra${count}" required>
              <p class="warning is-italic pt-1 has-text-danger is-hidden">* Please enter the year correctly *</p>

          </div>
          <!-- end of input to column -->
      </div>
  </div>
  <!-- end of input columns -->
  
  `;
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
