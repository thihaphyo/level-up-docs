let theModalBox, timeOutId;
const timerForAlertBox = {
  setUpTime() {
    timeOutId = setTimeout(() => {
      console.log("ss");
      for (const alertBox of document.getElementsByClassName(
        "message-alert-box"
      )) {
        alertBox.classList.remove("slide-in-right");
        alertBox.classList.add("slide-out-right");
      }
    }, 3000);
  },
  cancelTheTime() {
    clearTimeout(timeOutId);
  },
};

document.getElementById("showModal").addEventListener("click", () => {
  theModalBox = document.getElementsByClassName("error-modal-box-bg")[0];
  theModalBox.classList.remove("hidden");
  theModalBox.classList.remove("slide-in-top");
  timerForAlertBox.cancelTheTime();
});

document.getElementById("closeModal").addEventListener("click", () => {
  theModalBox = document.getElementsByClassName("error-modal-box-bg")[0];
  theModalBox.classList.remove("slide-in-top");
  theModalBox.classList.add("slide-out-top");
  document
    .getElementsByClassName("message-alert-box")[0]
    .classList.remove("slide-out-right");
  timerForAlertBox.setUpTime();
});

timerForAlertBox.setUpTime();
console.log("hell");
