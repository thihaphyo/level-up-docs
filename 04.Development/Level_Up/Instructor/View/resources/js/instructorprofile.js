const urlParams = new URLSearchParams(window.location.search);
const insId = urlParams.get("insID");
$(document).ready(function () {
  getInstructorDetails();
});

let canSubmit = false;
axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";

const getInstructorDetails = () => {
  axios
    .get(
      "/Instructor/Controller/instructorSelectAndEdit/GetInstructorById.php",
      { params: { ins_id: Number(insId) } }
    )
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const instructorResponse = response.data.data.instructor;
        if (instructorResponse.profile_image == null) {
            $("#profile_img").attr(
                "src",
                `https://ui-avatars.com/api/?name=${instructorResponse.full_name}&background=0D8ABC&color=fff`
              );
        } else {
            $("#profile_img").attr("src", `${instructorResponse.profile_image}`);
        }
        
        $("#lbl_name").html(instructorResponse.full_name);
        $("#lbl_position").html(instructorResponse.job_position);
        $("#lbl_bio").html(instructorResponse.bio);

        instructorResponse.exps.forEach(element => {
            $("#exp_container").append(
                `
              <div class="column m-0 p-0">
              <div class="is-flex is-flex-direction-row mt-5">
                  <div class="column is-1 m-0 p-0">
                      <img src="./resources/img/info_badge.png" style="width: 37px;">
                  </div>
                  <div class="column m-0 p-0 ml-1">
                      <div class="column m-0 p-0 has-text-black has-text-weight-semibold ">
                          ${element.exp_title}
                      </div>
                      <div class="column m-0 p-0 has-text-black has-text-weight-semibold is-size-7">
                        ${element.exp_type}
                      </div>
                      <div class="column m-0 p-0 has-text-black has-text-weight-light is-size-7">
                        ${element.exp_duration} (${element.years} years)
                      </div>
                  </div>
                  </div>
              </div>
              `
              );
        });

        $('#email').html(instructorResponse.email);
        $('#phone').html(instructorResponse.phone);
        $('#address').html(instructorResponse.address);

      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      //    hideLoading();
    });
};

$('#btn_edit').click(function() {
    window.location.href = "./editInstructor.php?insID="+insId;
});

// window.onpageshow = function(event) {
//     //do something
//     getInstructorDetails();
// };