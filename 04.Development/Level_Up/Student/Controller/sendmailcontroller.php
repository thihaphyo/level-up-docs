
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";
require_once "../View/messenge.php";


$mail = new PHPMailer(true);

//Enable SMTP debugging.


//Set PHPMailer to use SMTP.
$mail->isSMTP();

//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";

//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//Provide username and password     
$mail->Username = "myot0253@gmail.com";
$mail->Password = "aepvtuieusapjjex";

//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";

//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "myot0253@gmail.com";
$mail->FromName = "Myo Thiha";

$mail->addAddress("mushi17600@gmail.com", "Mushi");

$mail->isHTML(true);
$mail->Subject = "Contact Form Email";

// username,contact-no,email,question form contact form
$name = $_POST['full_name'];
$phone = $_POST['mobile_number'];
$email = $_POST['email'];
$messenge = $_POST['messenge'];

// add contact form
$mail->Body = "<table>
<tr><td>Name: </td><td>" . $name . "</td></tr>
<tr><td>Mobile No.: </td><td>" . $phone . "</td></tr>
<tr><td>Email: </td><td>" . $email . "</td></tr>
<tr><td>Your Question: </td><td>" . $messenge  . "</td></tr>
</table>
";;

try {
    $mail->send();
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}

?>

