let appeals = null;
$(document).ready(function () {
  getAppeals();
});

axios.defaults.baseURL = "http://localhost/LEVEL UP/04.Development/Level_Up";

const getAppeals = () => {
  axios
    .get("/Admin/Controller/AppealController/GetAppeals.php")
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const appealList = response.data.data.appeals;
        appeals = appealList;
        console.log(appealList);
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

const bindData = () => {
  if (appeals.length == 0) {
    $("#no-data").removeClass("is-hidden");
  } else {
    $("#no-data").addClass("is-hidden");
  }

  appeals.forEach((element) => {
    $("#tbl_appeals").append(
      `
            <tr>
            <td>${element.full_name}</td>
            <td>${moment(element.ctTime).format("DD/MM/YY")}</td>
            <td>${element.reason.substring(0, 20)}</td>
            <td><a class="button is-black is-size-7 has-text-weight-bold" href="./reviewAppeal.php?appID=${
              element.appealID
            }">Go To Form</a></td>
          </tr>
            `
    );
  });
};
