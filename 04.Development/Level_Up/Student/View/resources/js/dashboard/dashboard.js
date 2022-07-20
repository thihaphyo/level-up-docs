let tabIndex = "tab_learning";
axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";

$('document').ready(function () {
    navHightLight();
    loadData();
    fetchUserProfile();
});

$('#tab_learning,#tab_my_courses').click(function () {
    $('#tab_learning,#tab_my_courses').removeClass('is-active');
    $(this).addClass('is-active');
    if ($(this).attr('id') != tabIndex) {
        tabIndex = $(this).attr('id');
        loadData();
    }

});

const navHightLight = () => {
    $('#lnk_my_courses').addClass('active');
}

const loadData = () => {
    if (tabIndex == 'tab_learning') {
        fetchLearnings();
    } else {
        fetchMyCourses();
    }
}

const fetchUserInfo = () => {

}

const fetchLearnings = () => {
    $('.price').hide();
}

const fetchMyCourses = () => {
    $('.price').show();
}

const fetchUserProfile = () => {

    var bodyFormData = new FormData();
    bodyFormData.append('id', localStorage.getItem('access_token'));

    axios
    .post("/Student/Controller/auth/User.php", bodyFormData)
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const user = response.data.data.student;
        if (user.profile == null) {
            let firstName = user.fullName.split(" ")[0];
            let lastName = user.fullName.split(" ")[1];
            $('#profile_img').attr('src', 
            `https://ui-avatars.com/api/?name=${firstName}+${lastName}&background=0D8ABC&color=fff`
            )
            $('#userName').html(user.fullName);
            $('#email').html(user.email);
        }
        console.log(user.fullName);
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
    //    hideLoading();
    }); ;

}