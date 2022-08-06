let getNewAdminLink, getCloseLink, getCreateAdmin;

// link to display modal that is used for creating new admin
getNewAdminLink = document.getElementById("addNewAdmin");

// get the close link for create admin modal box
getCloseLink = document.getElementById("closeCreateAdminModal");

getCreateAdmin = document.getElementById("createNewAdmin");

//add hidden to the modal when close btn clicked
getNewAdminLink.addEventListener("click", () => {
  document
    .getElementsByClassName("create-admin-modal-box-bg")[0]
    .classList.remove("hidden");
});

//add hidden to the modal when close btn clicked
getCloseLink.addEventListener("click", () => {
  document
    .getElementsByClassName("create-admin-modal-box-bg")[0]
    .classList.add("hidden");
});

// send post request to server to store username and password
getCreateAdmin.addEventListener("click", (e) => {
  e.srcElement.disabled = true;

  axios
    .post(
      `http://localhost/LEVEL UP/04.Development/Level_Up/Admin/Controller/adminController/adminController.php`,
      {
        info: {
          username: document.querySelectorAll("input")[0].value,
          password: document.querySelectorAll("input")[1].value,
          path: "list",
        },
        timeout: 10000,
      }
    )
    .then((response) => {
      const { data } = response;
      document.getElementById("createAdminMessage").innerHTML = data;
      e.srcElement.style.display = "none";
      console.log(data);
    })
    .catch((err) => {
      document.getElementById("createAdminMessage").innerHTML = error;
      console.error(err);
    });
});
