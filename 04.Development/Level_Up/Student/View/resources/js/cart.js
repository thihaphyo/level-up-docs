let myCart, checkState, priceTag, removeBtn, deleteItem;
myCart = document.getElementsByClassName("my-cart");
priceTag = document.getElementsByClassName("course-price-tag");
removeBtn = document.getElementsByClassName("remove-item");
deleteItem = document.getElementById("deleteCartItem");

function openModal($el) {
  $el.classList.add("is-active");
}

function closeModal($el) {
  $el.classList.remove("is-active");
}

function closeAllModals() {
  (document.querySelectorAll(".modal") || []).forEach(($modal) => {
    closeModal($modal);
  });
}

const loadTheCart = () => {
  axios
    .post(
      `http://localhost/LEVEL UP/04.Development/Level_Up/Student/Controller/cartController.php`,
      {
        info: {
          route: "getCart",
        },
        timeout: 10000,
      }
    )
    .then((response) => {
      const { data } = response;
      console.log(data);

      document.getElementsByClassName("my-cart-items")[0].innerHTML = "";
      if (data.data == undefined || data.data == null) {
        document.getElementsByClassName(
          "my-cart-items"
        )[0].innerHTML += `<div class='no-item'><h3>No Item Yet</h3></div>`;
        document
          .getElementsByClassName("go-to-checkout")[0]
          .classList.add("is-hidden");
      }
      if (data.status == 200) {
        document
          .getElementsByClassName("go-to-checkout")[0]
          .classList.remove("is-hidden");
        for (const key in data.data) {
          document.getElementsByClassName("my-cart-items")[0].innerHTML += `
              <div class="my-cart">
              <input type="checkbox" value="${data.data[key].course_id}">
              <img src="./resources/img/courseinfo/${
                data.data[key].course_cover_image
              }" alt="course"></img>
              <div class="course-info">
                  <a href="#">${data.data[key].course_title}</a>
                  <div class="instructor-rating">
                      <p>By ${data.data[key].full_name} - </p>
                      <div>
                          <img src="./resources/img/header_footer/Rating.svg" alt="rating"></img>
                          <p>${data.course_rating.rating[key]}/<span>(${
            data.course_rating.numberOfRating[key]
          })</span></p>
                      </div>
                  </div>
                    <div class="price-remove">
                        <p class="course-price-tag">${Number(
                          data.data[key].price
                        ).toLocaleString("en-US")} Ks</p>
                        <a class="link js-modal-trigger remove-item" data-target="modal-js-example" id="${
                          data.data[key].cart_id
                        }">Remove</a>
                    </div>
                </div>
              </div>
              `;
        }
      }
      // Add a click event on buttons to open a specific modal
      (document.querySelectorAll(".js-modal-trigger") || []).forEach(
        ($trigger) => {
          const modal = $trigger.dataset.target;
          const $target = document.getElementById(modal);

          $trigger.addEventListener("click", () => {
            openModal($target);
          });
        }
      );

      // Add a click event on various child elements to close the parent modal
      (
        document.querySelectorAll(
          ".modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button,.cancel-item"
        ) || []
      ).forEach(($close) => {
        const $target = $close.closest(".modal");

        $close.addEventListener("click", () => {
          closeModal($target);
        });
      });

      for (const btn of removeBtn) {
        btn.onclick = function () {
          deleteItem.value = `${this.id}`;
          //   console.log(document.getElementById("remove-confirmed").href);
        };
      }
    })
    .catch((err) => {
      console.error(err);
    });
};
loadTheCart();

deleteItem.onclick = function () {
  axios
    .post(
      `http://localhost/LEVEL UP/04.Development/Level_Up/Student/Controller/cartController.php?delete=${this.value}`,
      {
        timeout: 10000,
      }
    )
    .then((response) => {
      const { data } = response;
      loadTheCart();
      console.log(data);
    })
    .catch((err) => {
      console.error(err);
    });
};

document.getElementById("checkout-now-btn").onclick = function () {
  let courseIdCollection = [];
  for (const checkboxInput of document.querySelectorAll(
    "input[type='checkbox']:checked"
  )) {
    courseIdCollection.push(checkboxInput.value);
    axios
      .post(
        `http://localhost/LEVEL UP/04.Development/Level_Up/Student/Controller/cartController.php`,
        {
          info: {
            total_course_id: courseIdCollection,
            route: "checkout",
          },
          timeout: 10000,
        }
      )
      .then((response) => {
        const { data } = response;
        window.location.replace("./checkout.php");
        console.log(data);
      })
      .catch((err) => {
        console.error(err);
      });
  }
};
