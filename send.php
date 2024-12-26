<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$usertoken = $_POST["usertoken"];
$apisrc= "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . $usertoken ;

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = "almeldingroub@gmail.com";
$mail->Password = "scqemfmoqwvlnbeb";
$mail->setFrom("ahmedabubakr148@gmail.com");
$mail->addAddress("ahhmedabubakr1482@gmail.com");
$mail->addAddress("elkhiouty@hotmail.com");
$mail->Subject = 'PHPMailer GMail SMTP test';
// $mail->msgHTML("test body"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->isHTML(true);
$mail->Body = 'HTML messaging supported <img src="TIEClogoHP.png" >';
// $mail->addAttachment('TIEClogoHP.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}