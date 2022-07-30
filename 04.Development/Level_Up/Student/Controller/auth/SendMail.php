<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


class SendMail
{

    private $vcode;

    public function __construct($vcode)
    {
        $this->vcode = $vcode;
    }

   public function sendMail($to)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //var_dump('../../View/test.html');

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'laravelmailtestexbrain@gmail.com';      //SMTP username
            $mail->Password   = 'ltokjlmjswgxtqkn';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('laravelmailtestexbrain@gmail.com', 'Level Up');
            $mail->addAddress($to);      //Add a recipient
            $mail->addAddress('linnkoko1130@gmail.com');                     //Name is optional

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Level Up Verification';
            $email_template = '../../View/test.html';
            $message = file_get_contents($email_template);
            $message = str_replace('%display_link%', "http://www.levelup.com/verify", $message);
            $message = str_replace('%link_for_verify%', "http://localhost/level-up-docs/04.Development/Level_Up/Student/View/verifyemail.php?code=$this->vcode", $message);
            
            $mail->Body    =  $message;
            $mail->send();
            // $mail->Body    = 'Here is Your Verifcation Code : <br/>
            // <a href = "http://localhost/Register/Controller/VerifyController.php?code='.$this->vcode.'"> Verify </a>';
            // $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            var_dump($e);
           // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
