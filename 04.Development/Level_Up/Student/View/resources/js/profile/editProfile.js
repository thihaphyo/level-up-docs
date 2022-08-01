axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";

const fetchUserProfile = () => {
  showLoading();
  var bodyFormData = new FormData();
  bodyFormData.append("id", localStorage.getItem("access_token"));

  axios
    .post("/Student/Controller/auth/User.php", bodyFormData)
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const user = response.data.data.student;
        if (user.profile == null) {
          $("#profile_img").attr(
            "src",
            `https://ui-avatars.com/api/?name=${user.fullName}&background=0D8ABC&color=fff`
          );
          $("#lbl_name").html(user.fullName);
          $("#username").val(user.fullName);
          $("#email").val(user.email);
        }
        console.log(user.fullName);
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      hideLoading();
    });
};

const editProfile = () => {
  showLoading();

  axios
    .post("/Student/Controller/auth/EditProfile.php", {
        id: localStorage.getItem("access_token"),
        email: $("#email").val(),
        userName: $("#username").val(),
    })
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        window.location.href = "./dashboard.php?screen_mode=profile";
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      hideLoading();
    });
};

$("document").ready(function () {
  let svgContainer = document.querySelector(".bodymovinanim");
  let animItem = bodymovin.loadAnimation({
    wrapper: svgContainer,
    animType: "svg",
    loop: true,
    path: "https://assets6.lottiefiles.com/packages/lf20_qjosmr4w.json",
  });
  hideLoading();
  fetchUserProfile();
});

const showLoading = () => {
  $("#loading_container").removeClass("is-hidden");
};

const hideLoading = () => {
  $("#loading_container").addClass("is-hidden");
};

$('#btnEdit').click(function() {
    if ($('#username').val() == null || $('#username').val() == "") {
        window.alert('Username cannot be empty!');
    } else if ($('#email').val() == null || $('#email').val() == "") {
        window.alert('Username cannot be empty!');
    } else {
        editProfile();
    }
});