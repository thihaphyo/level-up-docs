const urlParams = new URLSearchParams(window.location.search);
const vCode = urlParams.get("code");

axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";

const verify = () => {
  axios
    .post("/Student/Controller/auth/Verify.php", {
      vCode: vCode
    })
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        console.log('Succes verify');
        window.location.replace("./signin.html");
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      //    hideLoading();
    });
};

$(document).ready(function () {
  $("#vcode").val(vCode);
});

$("#btnVerify").click(function () {
    verify();
});
