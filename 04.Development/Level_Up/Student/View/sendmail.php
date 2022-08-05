<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    



<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

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
$mail->Subject = "Forget Password form level up";

$message = 
"
<table>

	<tr><td>Email: </td><td>" . $_POST["email"] . "</td></tr>
</table>

";

$mail->Body = $message;

try {
    $mail->send();
    echo "<h2>Message has been sent successfully</h2>";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?>
</body>
</html>