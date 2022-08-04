let tabIndex = "tab_learning";
let chunkSize = 4;
let pageCount = 0;
axios.defaults.baseURL =
  "http://localhost/level-up-docs/04.Development/Level_Up";

$("document").ready(function () {
  //navHightLight();
  let svgContainer = document.querySelector(".bodymovinanim");
  let animItem = bodymovin.loadAnimation({
    wrapper: svgContainer,
    animType: "svg",
    loop: true,
    path: "https://assets6.lottiefiles.com/packages/lf20_qjosmr4w.json",
  });
  hideLoading();

  loadData();
  fetchUserProfile();

  
});
$("#tab_learning,#tab_my_courses").click(function () {
  $("#tab_learning,#tab_my_courses").removeClass("is-active");
  $(this).addClass("is-active");
  if ($(this).attr("id") != tabIndex) {
    tabIndex = $(this).attr("id");
    loadData();
  }
});

const navHightLight = () => {
  $("#lnk_my_courses").addClass("active");
};

const loadData = () => {
  if (tabIndex == "tab_learning") {
    fetchLearnings();
  } else {
    fetchMyCourses();
  }
};

const fetchUserInfo = () => {};

const fetchLearnings = () => {
  $(".price").hide();
  getPageSizeForLearning();
};

const fetchMyCourses = () => {
  $(".price").show();
  getPageSizeForWishList();
};

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
          let firstName = user.fullName.split(" ")[0];
          let lastName = user.fullName.split(" ")[1];
          $("#profile_img").attr(
            "src",
            `https://ui-avatars.com/api/?name=${user.fullName}&background=0D8ABC&color=fff`
          );
          $("#userName").html(user.fullName);
          $("#email").html(user.email);
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

const getPageSizeForLearning = () => {
  showLoading();
  axios
    .get("/Student/Controller/dashboard/GetPageSizeForLearning.php", {
      params: { uid: localStorage.getItem("access_token") },
    })
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const size = response.data.data.totalSize.size;
        //10/2 => 5 (total/chunk) => pageCount
        pageCount = Math.round(Math.ceil(size / chunkSize));
        buildPaginationForLearnig(
          "/Student/Controller/dashboard/GetLearningList.php?uid=" +
            localStorage.getItem("access_token")
        );
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      hideLoading();
    });
};

const getPageSizeForWishList = () => {
  showLoading();
  axios
    .get("/Student/Controller/dashboard/GetPageSizeWishList.php", {
      params: { uid: localStorage.getItem("access_token") },
    })
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        const size = response.data.data.totalSize.size;
        //10/2 => 5 (total/chunk) => pageCount
        if (size > 0 ){
            pageCount = Math.round(Math.ceil(size / chunkSize));
        buildPaginationForWishList(
          "/Student/Controller/dashboard/GetWishList.php?uid=" +
            localStorage.getItem("access_token")
        );
        } else {
            $('#item_container').empty();
            $("#pagination_container").hide();
        }
        
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      hideLoading();
    });
};

function buildPaginationForLearnig(url) {
  let pagings = "";

  for (let index = 0; index < pageCount; index++) {
    let page = (index - 1) * chunkSize + 1;
    pagings += `
        <li><a class="pagination-link ${
          index == 0 ? "is-current" : ""
        }" aria-label="Goto page 1" value=${url + "&pageNo=" + Number(page)} ${
      index == 0 ? 'aria-current="page"' : ""
    } id=${url + "&pageNo=" + Number(page)} onclick="onChangePage(this)">${
      index + 1
    }</a></li>
        `;
  }

  $("#paging_list").html(pagings);

  $("#pagination_container").show();

  getLearningList(url + "&pageNo=0");
}

function buildPaginationForWishList(url) {
  let pagings = "";

  for (let index = 0; index < pageCount; index++) {
    let page = (index - 1) * chunkSize + 1;
    pagings += `
          <li><a class="pagination-link ${
            index == 0 ? "is-current" : ""
          }" aria-label="Goto page 1" value=${
      url + "&pageNo=" + Number(page)
    } ${index == 0 ? 'aria-current="page"' : ""} id=${
      url + "&pageNo=" + Number(page)
    } onclick="onChangePage(this)">${index + 1}</a></li>
          `;
  }

  $("#paging_list").html(pagings);

  $("#pagination_container").show();

  getWishList(url + "&pageNo=0");
}

function onChangePageWishList(obj) {
    let pageUrl = obj.id;
    getWishList(pageUrl);
    $(".pagination-link").removeClass("is-current");
    document.getElementById(obj.id).classList.add("is-current");
  }

function onChangePage(obj) {
  let pageUrl = obj.id;
  getLearningList(pageUrl);
  $(".pagination-link").removeClass("is-current");
  document.getElementById(obj.id).classList.add("is-current");
}

const getLearningList = (pageUrl) => {
  showLoading();
  axios
    .get(pageUrl)
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        console.log(response.data.data.learnings);

        const perChunk = 2; // items per chunk

        const inputArray = response.data.data.learnings;

        const result = inputArray.reduce((resultArray, item, index) => {
          const chunkIndex = Math.floor(index / perChunk);

          if (!resultArray[chunkIndex]) {
            resultArray[chunkIndex] = []; // start a new chunk
          }

          resultArray[chunkIndex].push(item);

          return resultArray;
        }, []);

        $("#item_container").empty();

        for (let i = 0; i < result.length; i++) {
          const element = result[i];

          var container = `<div id=${i} class="row is-flex">`;

          for (let j = 0; j < element.length; j++) {
            const innerElement = element[j];
            var ietm = `
                <div class="column is-one-third">
                <div id=${
                  innerElement.cID
                } class="card" onclick="goToCourseDetails(this)" style="cursor:pointer;">
                    <div class="card-image">
                        <figure class="image is-4by1">
                            <img src="./resources/img/header_footer/course image.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="details is-flex is-justify-content-space-between">
                            <div class="detail is-size-7">
                                <ion-icon name="bar-chart-outline"></ion-icon>
                                <div class="content has-text-primary-light">
                                    <span>Level</span>
                                    <h5 class="has-text-primary-light">${
                                      innerElement.level
                                    }</h5>
                                </div>
                            </div>
                            <div class="detail ml-4 mr-4 is-size-7">
                                <ion-icon name="alarm-outline"></ion-icon>
                                <div class="content has-text-primary-light">
                                    <span>Hours</span>
                                    <h5 class="has-text-primary-light">${
                                      innerElement.duration
                                    } Hours</h5>
                                </div>
                            </div>
                            <div class="detail is-size-7">
                                <ion-icon name="clipboard-outline"></ion-icon>
                                <div class="content has-text-primary-light">
                                    <span>Lectures</span>
                                    <h5 class="has-text-primary-light">${
                                      innerElement.lectureCount
                                    } Lectures</h5>
                                </div>
                            </div>
                        </div>
                        <div class="content has-text-primary has-text-weight-bold no-margin-bot">
                            ${innerElement.course_title}
                        </div>

                        <div class="content no-margin-bot mt-2">
                            <progress class="progress is-yellow short-progress" value=${
                              innerElement.progress
                            } max="100">${innerElement.progress}%</progress>

                        </div>

                        <div class="content no-margin-bot mt-2">
                            <div class="is-flex is-justify-content-space-between">
                                <div class="has-text-primary-light mt-2 is-size-7">
                                    By ${innerElement.full_name}
                                </div>
                                <div class="has-text-primary mt-2 is-size-7">
                                    <img src="./resources/img/header_footer/Rating.svg" alt="" style="width: 10px; height:10px;" /> ${
                                      Math.round(
                                        ((innerElement.total_rating * 5) /
                                          (innerElement.total_rated * 5)) *
                                          10
                                      ) / 10
                                    }/5
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
                `;

            container += ietm;
          }

          container += `</div>`;

          $("#item_container").append(container);
        }

        // console.log(result[0][0]);
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      hideLoading();
    });
};

const getWishList = (pageUrl) => {
  showLoading();
  axios
    .get(pageUrl)
    .then((response) => {
      const statusCode = response.data.code;
      const message = response.data.message;
      if (statusCode == 200) {
        console.log(response.data.data.wishList);

        const perChunk = 2; // items per chunk

        const inputArray = response.data.data.wishList;

        const result = inputArray.reduce((resultArray, item, index) => {
          const chunkIndex = Math.floor(index / perChunk);

          if (!resultArray[chunkIndex]) {
            resultArray[chunkIndex] = []; // start a new chunk
          }

          resultArray[chunkIndex].push(item);

          return resultArray;
        }, []);

        $("#item_container").empty();

        for (let i = 0; i < result.length; i++) {
          const element = result[i];

          var container = `<div id=${i} class="row is-flex">`;

          for (let j = 0; j < element.length; j++) {
            const innerElement = element[j];
            var ietm = `
                  <div class="column is-one-third">
                  <div id=${
                    innerElement.cID
                  } class="card" onclick="goToCourseDetails(this)" style="cursor:pointer;">
                      <div class="card-image">
                          <figure class="image is-4by1">
                              <img src="./resources/img/header_footer/course image.png" alt="Placeholder image">
                          </figure>
                      </div>
                      <div class="card-content">
                          <div class="details is-flex is-justify-content-space-between">
                              <div class="detail is-size-7">
                                  <ion-icon name="bar-chart-outline"></ion-icon>
                                  <div class="content has-text-primary-light">
                                      <span>Level</span>
                                      <h5 class="has-text-primary-light">${
                                        innerElement.level
                                      }</h5>
                                  </div>
                              </div>
                              <div class="detail ml-4 mr-4 is-size-7">
                                  <ion-icon name="alarm-outline"></ion-icon>
                                  <div class="content has-text-primary-light">
                                      <span>Hours</span>
                                      <h5 class="has-text-primary-light">${
                                        innerElement.duration
                                      } Hours</h5>
                                  </div>
                              </div>
                              <div class="detail is-size-7">
                                  <ion-icon name="clipboard-outline"></ion-icon>
                                  <div class="content has-text-primary-light">
                                      <span>Lectures</span>
                                      <h5 class="has-text-primary-light">${
                                        innerElement.lectureCount
                                      } Lectures</h5>
                                  </div>
                              </div>
                          </div>
                          <div class="content has-text-primary has-text-weight-bold no-margin-bot">
                              ${innerElement.course_title}
                          </div>

                          <div class="content no-margin-bot mt-2">
                              <div class="is-flex is-justify-content-space-between">
                                  <div class="has-text-primary-light mt-2 is-size-7">
                                      By ${innerElement.full_name}
                                  </div>
                                  <div class="has-text-primary mt-2 is-size-7">
                                      <img src="./resources/img/header_footer/Rating.svg" alt="" style="width: 10px; height:10px;" /> ${
                                        Math.round(
                                          ((innerElement.total_rating * 5) /
                                            (innerElement.total_rated * 5)) *
                                            10
                                        ) / 10
                                      }/5
                                  </div>
                              </div>
                              <div class="price">
                                <p><span>${innerElement.price}</span> Ks</p>
                             </div>
                          </div>
                      </div>
                  </div>
              </div>
                  `;

            container += ietm;
          }

          container += `</div>`;

          $("#item_container").append(container);
        }

        // console.log(result[0][0]);
      } else {
        window.alert(message);
      }
    })
    .catch((error) => console.error(error))
    .then(function () {
      hideLoading();
    });
};

const showLoading = () => {
  $("#loading_container").removeClass("is-hidden");
};

const hideLoading = () => {
  $("#loading_container").addClass("is-hidden");
};

function goToCourseDetails(obj) {
  window.alert(obj.id);
}
