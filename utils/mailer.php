<?php

/** Handles the parameters send by the contact.php page 
* and send an email to the project owner with the given parameters.
* @author Anthony Hombiat
* @version 2012/07/03 
*/

// email the message will be send to
$hostEmail = "dentdecrolles@hotmail.fr";

// subject of the email
$subject = "[SITE WEB Centre Canin de la Dent de Crolles] Un internaute vous a envoyé un message";

// gets the POST parameters (name, email and message of the client)
$clientName = $_POST['name'];
$clientEmail = $_POST['email'];
$clientMessage = $_POST['message'];

// builds the html message
$htmlMessage = "".
	"<html>".
		"<head><title>Message de la part d'un internaute</title></head>".
		"<body style='background-color:#fafafa;color:#555555 !important;padding:40px'>".
			"<div id='wrapper' style='background-color:#eeeeee;width:600px;margin:auto; padding:10px 40px;border: solid 10px #ffffff;text-shadow: 0px 1px 0px #ffffff;box-shadow:0px 0px 8px #aaaaaa;'>".
				"<h1>Message de la part d'un internaute</h1>".
				"<p>Un message vous a &eacute;t&eacute; envoy&eacute; par un internaute via le site web du Centre canin de la Dent de Crolles</p>".
				"<p>En voici le d&eacute;tail : </p>".
				"<ul>".
			    	"<li>Nom : <strong>".$clientName."</strong></li>".
				   	"<li>Email : <strong>".$clientEmail."</strong></li>".
					"<li>Message : <strong>".$clientMessage."</strong></li>".
				"</ul>".
			"</div>".
		"</body>".
	"</html>";
//echo $htmlMessage;
	
$headers  = 'MIME-Version: 1.0' . "\r\n" .
	'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
	'To: Christophe Mangano <' . $hostEmail . '>' . "\r\n" .
	'From: ' . $clientName . ' <' . $clientEmail . '>' . "\r\n";
//echo $headers;

// sends the mail
$deliverySuccess = mail($hostEmail,$subject,$htmlMessage,$headers);

if($deliverySuccess == '' || $deliverySuccess){
	
	// redirects to the home page
	header('Location: ../mail_success.html');
	
}else{
	
	// display an error message with a link to go back to the home page
	print("<html><body>");
	print("<p>L'envoi du mail &agrave; &eacute;chou&eacute;.</p>");
	print("<p>Veuillez r&eacute;essayer plus tard ou contacter le webmaster à l'adresse suivante : <a href='mailto:".$hostEmail."'>".$hostEmail."</a></p>");
	print("<p><a href='../accueil.html'>Retour &agrave; l'accueil du site</a></p>");
	print("</body></html>");
	
} 

?>