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
          std_id: 1,
          SecretCon: true,
        },
        timeout: 10000,
      }
    )
    .then((response) => {
      const { data } = response;
      document.getElementsByClassName("my-cart-items")[0].innerHTML = "";

      for (const info of data) {
        if (info.is_deleted != 1) {
          document.getElementsByClassName("my-cart-items")[0].innerHTML += `
            <div class="my-cart">
            <input type="checkbox">
            <img src="./resources/img/courseinfo/${
              info.course_cover_image
            }" alt="course"></img>
            <div class="course-info">
                <a href="#">${info.course_title}</a>
                <div class="instructor-rating">
                    <p>By ${info.full_name} - </p>
                    <div>
                        <img src="./resources/img/header_footer/Rating.svg" alt="rating"></img>
                        <p>4.5/5<span>(5)</span></p>
                    </div>
                </div>
                  <div class="price-remove">
                      <p class="course-price-tag">${Number(
                        info.price
                      ).toLocaleString("en-US")} Ks</p>
                      <a class="link js-modal-trigger remove-item" data-target="modal-js-example" id="${
                        info.id
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
