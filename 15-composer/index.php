<?php 

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
  ->setUsername('webforcelille2@gmail.com')
  ->setPassword('W3bforce')
  ->setEncryption('tls')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['john@doe.com' => 'John Doe'])
  ->setTo(['clement.marescaux@gmail.com'])
  ->setBody('Mon bière Shop vous souhaite la bienvenue, vous trouverez la facture de 2000€ pour votre caisse de bière en pièce jointe. Vous souhaitant bonne réception. Danke schön ;)')
  ;

// Send the message
$result = $mailer->send($message);