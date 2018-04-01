<?php
/*ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port",  1025 );
ini_set("sendmail_from", "constantinos.paparas@gmail.com");
ini_set("auth_username", "paparas.constantinos@gmail.com");
ini_set("auth_password", "01dec2007");*/

$lastname = htmlspecialchars($_POST['lastname']);
$firstname = htmlspecialchars($_POST['firstname']);
$email = htmlspecialchars($_POST['email']);
$messagemail = htmlspecialchars($_POST['message']);


$header = "From: $email\n"; //<=== soit ton e-mail ou l'email de la personne qui t'ecris
$header .= "MIME-Version: 1.0\n";

$destinataire = "costapaparas.danse@gmail.com"; // <=== ton adresse de reception


$titre = "Message du Site de la part de $lastname $firstname";

$message = "\n";
$message .="Nom : $lastname\n";
$message .="Préom : $firstname\n";
$message .="E-mail : $email\n";
$message .="Message : \n";
$message .="$messagemail\n";
$mail = mail($destinataire,$titre,$message,$header);
if ($mail)
  header('Location: validation_contact.html'); 
else {
	header('Location: erreur_contact.html'); 
}
?>