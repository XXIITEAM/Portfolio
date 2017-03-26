<?php

// $email and $message are the data that is being
// posted to this page from our html contact form

$nom = $_REQUEST['NomPrenom'] ;
$email = $_REQUEST['Email'] ;
$message = $_REQUEST['Message'] ;

include("../lib/PHPMailer/class.phpmailer.php");
include("../lib/PHPMailer/class.smtp.php"); // note, this is optional - gets called from main class if not already loaded

$mail             = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port

$mail->Username   = "jean.marc.hericher@gmail.com";  // GMAIL username
$mail->Password   = "EnmodeXXII@";            // GMAIL password

$mail->From       = $email;
$mail->FromName   = $nom;
$mail->Subject    = "Contact PortFolio";
$mail->Body       = $message;
$mail->AltBody    = $message; //Text Body
$mail->WordWrap   = 50; // set word wrap


//$mail->AddReplyTo("jean.marc.hericher@gmail.com","Webmaster");

//$mail->AddAttachment("/path/to/file.zip");             // attachment
//$mail->AddAttachment("/path/to/image.jpg", "new.jpg"); // attachment

$mail->AddAddress("jean.marc.hericher@gmail.com","Hericher Jean-Marc");

$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo 'Validation';
}