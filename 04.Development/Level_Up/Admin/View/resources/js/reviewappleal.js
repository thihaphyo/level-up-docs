const urlParams = new URLSearchParams(window.location.search);
const appealID = urlParams.get('appID');
var appealDetails = null;
$(document).ready(function () {
    getAppealDetails();
});

let canSubmit = false;
axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";

const getAppealDetails = () => {
  axios
    .get("/Admin/Controller/AppealController/GetAppealDetails.php", { params: { appeal_id: Number(appealID) } })
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const appealResponse = response.data.data;
        appealDetails = appealResponse.appeal;
        bindData();
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      //    hideLoading();
    });
};

const unBann = () => {
    axios
      .get("/Admin/Controller/AppealController/Unbann.php", { params: { appeal_id: Number(appealID) } })
      .then((response) => {
        const statusCode = response.data.code;
        const message = response.data.message;
        if (statusCode == 200) {
            window.location.replace("./index.php");
        } else {
          window.alert(message);
        }
      })
      .catch((error) => console.error(error))
      .then(function () {
        //    hideLoading();
      });
  };

const bindData = () => {
    if (appealDetails != null) {
        $('#ins_name').val(appealDetails.full_name);
        $('#reason').val(appealDetails.reason);
        $('#solution').val(appealDetails.solution);
    }
}

$("#btnUnBann").click(function () {
    unBann();
});
