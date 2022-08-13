var paypalCard = document.getElementById("paypalImg");
var masterCard = document.getElementById("mastercardImg");
var visaCard = document.getElementById("visaImg");
var submitBtn = document.getElementById("btnSubmit");
/*
 *Create: Zin Min Htet(2022/07/22)
 *Update:
 *click payment card to change style
 *Parameter: none
 *Return: none
 */
function cardPaypal() {
        paypalCard.style.opacity = "1";
        masterCard.style.opacity = "0.3";
        visaCard.style.opacity = "0.3";
}
function cardMastercard() {
        paypalCard.style.opacity = "0.3";
        masterCard.style.opacity = "1";
        visaCard.style.opacity = "0.3";
}
function cardVisa() {
        paypalCard.style.opacity = "0.3";
        masterCard.style.opacity = "0.3";
        visaCard.style.opacity = "1";
}
function paymentMethod() {
        
        console.log($("#totalAmount").text());
        var postData = {
                totalAmount: $("#totalAmount").text(),
        };
        $.ajax({
                url: "../Controller/addOrderListController.php",
                type: "POST",
                data: { send: JSON.stringify(postData) },
                success: function (res) {
                        Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Payment Successfully ^_^",
                                showConfirmButton: false,
                                timer: 1500,
                        });
                        location.url = res;
                },
                error: function (err) {
                        Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Payment Fail ",
                                showConfirmButton: false,
                                timer: 1500,
                        });
                        console.log(err);
                },
        });
}
