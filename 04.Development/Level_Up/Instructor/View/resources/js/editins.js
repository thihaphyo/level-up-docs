class InstructorEditReq {
      static build(id,profilePic,name, bio,postion,email,socials,phone,address){
          return new InstructorEditReq(
              id,profilePic,name, bio,postion,email,socials,phone,address
          )
      }
      static build(){
          return new InstructorEditReq(
              null,null,null, null,null,null,null,null,null
          )
      }
    constructor(id,profilePic,name, bio,postion,email,socials,phone,address) {
      this.id = id;
      this.name = name;
      this.profilePic = profilePic;
      this.bio = bio;
      this.postion = postion;
      this.email = email;
      this.socials = socials;
      this.phone = phone;
      this.address = address;
    }
}

const urlParams = new URLSearchParams(window.location.search);
const insId = urlParams.get("insID");
var insReq = InstructorEditReq.build();
let socials = null;
let isPhotoDeleted = false;

function closeModal($el) {
  $el.classList.remove("is-active");
}

function closeAllModals() {
  (document.querySelectorAll(".modal") || []).forEach(($modal) => {
    closeModal($modal);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  // Functions to open and close a modal
  function openModal($el) {
    $el.classList.add("is-active");
  }

  // Add a click event on buttons to open a specific modal
  (document.querySelectorAll(".js-modal-trigger") || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);

    $trigger.addEventListener("click", () => {
      openModal($target);
    });
  });

  // Add a click event on various child elements to close the parent modal
  (
    document.querySelectorAll(
      ".modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button"
    ) || []
  ).forEach(($close) => {
    const $target = $close.closest(".modal");

    $close.addEventListener("click", () => {
      closeModal($target);
    });
  });

  // Add a keyboard event to close all modals
  document.addEventListener("keydown", (event) => {
    const e = event || window.event;

    if (e.keyCode === 27) {
      // Escape key
      closeAllModals();
    }
  });
});

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

        instructorResponse.socials.forEach((element) => {
          $("#links_container").append(
            `
                <a id="${element.socialID}" class="is-underlined has-text-black is-size-7 has-text-weight-bold mr-2" href="${element.social_url}">${element.socialName}</a>
                `
          );
        });

        $("#bio").val(instructorResponse.bio);
        $("#ins_name").val(instructorResponse.full_name);
        $("#position").val(instructorResponse.job_position);
        $("#email").val(instructorResponse.email);
        $("#phone").val(instructorResponse.phone);
        $("#address").val(instructorResponse.address);

        insReq.profilePic = instructorResponse.profile_image;
        insReq.id = Number(insId);
        insReq.name = instructorResponse.full_name;
        insReq.bio = instructorResponse.bio;
        insReq.postion = instructorResponse.job_position;
        insReq.socials = instructorResponse.socials;
        insReq.phone = instructorResponse.phone;
        insReq.address = instructorResponse.address;
        insReq.email = instructorResponse.email;

        console.log(insReq);
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      //    hideLoading();
    });
};

const getSocialNetworks = () => {
  axios
    .get("/Instructor/Controller/instructorSelectAndEdit/GetSocials.php")
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const socialResponse = response.data.data.socials;
        console.log(socialResponse);
        $("#sel_social").empty();
        socialResponse.forEach((element) => {
          $("#sel_social").append(
            `
                <option value="${element.id}">${element.name}</option>
                `
          );
        });

        $("#sel_social").val(socialResponse[0].id);
        socials = socialResponse;
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      //    hideLoading();
    });
};

$("document").ready(function () {
  getSocialNetworks();
  getInstructorDetails();
});

$("#btn_add_social").click(function () {
  closeAllModals();
  let linkTypeID = $("#sel_social").val();
  let linkStr = $("#social_url").val();
  if (linkTypeID == "" || linkStr == "") {
    return;
  }
  let obj = {socialID: Number(linkTypeID),
    social_url: linkStr,
    socialName: socials.filter(a => a.id == linkTypeID)[0].name};

    var removeIndex = insReq.socials.map(item => item.socialID).indexOf(Number(linkTypeID));
    if (removeIndex >= 0) {
        insReq.socials.splice(removeIndex, 1);
    }
    
    insReq.socials.push(
        obj
    );
    
    console.log(insReq);

    insReq.socials.sort((a, b) => a.socialID > b.socialID ? 1 : -1);

    $("#links_container").html("");
    insReq.socials.forEach((element) => {
        $("#links_container").append(
          `
              <a id="${element.socialID}" class="is-underlined has-text-black is-size-7 has-text-weight-bold mr-2" href="${element.social_url}">${element.socialName}</a>
              `
        );
      });
    
    $("#social_url").val("");
    $("#sel_social").val(socials[0].id);

});

$('#btn_cancel').click(function()  {
    closeAllModals();
});

$('#btnBack').click(function()  {
    window.history.back();
});

$('#btnUpload').on('click', function() {
    $('#file-input').trigger('click');
});

$('#btnDelete').click(function () {

    if (insReq.profilePic == null) {
        window.alert('No image already');
    } else {
        $("#profile_img").attr(
            "src",
            `https://ui-avatars.com/api/?name=${insReq.name}&background=0D8ABC&color=fff`
          );
        isPhotoDeleted = true; 
    }

    
});

$("#file-input").change(function(){
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);

        isPhotoDeleted = false;
    }
}

$('#btnSave').click(function() {

    insReq.name = $("#ins_name").val();
    insReq.bio =  $("#bio").val();
    insReq.postion =  $("#position").val();
    insReq.phone =  $("#phone").val();
    insReq.address = $("#address").val();
    insReq.email = $("#email").val();

    console.log(insReq);

    edit();
});

const edit = () => {

    if (isPhotoDeleted) {
        
        axios
              .post("/Instructor/Controller/instructorSelectAndEdit/RemovePhotoAndUpdate.php", JSON.stringify(insReq))
              .then((response) => {
                const statusCode = response.data.code;
                const message = response.data.message;
                if (statusCode == 200) {
                  console.log(statusCode);
                  insReq.profilePic = null; 
                  //redirect
                  window.location.replace(`./instructorprofile.php?insID=${insId}`);
                } else {
                  window.alert(message);
                }
              })
              .catch((error) => console.error(error))
              .then(function () {
                //    hideLoading();
        });

    } else {
        var input = document.querySelector('input[type="file"]');
        var data = new FormData();
        data.append('image', input.files[0]);
        data.append('id', insId);
        axios
            .post("/Instructor/Controller/instructorSelectAndEdit/UploadProfile.php",
             data, {
                headers: {
                "Content-Type": "multipart/form-data",
                },
            })
            .then((response) => {
                const statusCode = response.data.code;
                const message = response.data.message;
                if (statusCode == 201) {
                   insReq.profilePic = `../assets/${response.data.data.new_profile}`;
                   console.log(insReq);
                   editContent();
                  
                } else if  (statusCode == 200)  {
                    editContent();
                } else {
                  window.alert(message);
                }
            })
            .catch((err) => {
                console.log(err);
        });
    }
};

const editContent = () => {
    
    axios
        .post("/Instructor/Controller/instructorSelectAndEdit/EditContents.php", JSON.stringify(insReq))
        .then((response) => {
                const statusCode = response.data.code;
                const message = response.data.message;
                if (statusCode == 200) {
                  console.log(statusCode);
                  //Content updated
                  //redirect
                  window.location.replace(`./instructorprofile.php?insID=${insId}`);
                } else {
                  window.alert(message);
                }
              })
              .catch((error) => console.error(error))
              .then(function () {
                //    hideLoading();
        });
};

