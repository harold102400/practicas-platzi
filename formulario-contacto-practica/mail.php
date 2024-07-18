<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();


function sendMail($subject, $body, $email, $name, $html = false)
{
    $phpmailer = new PHPMailer();

    $phpmailer->isSMTP();

    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';

    $phpmailer->SMTPAuth = true;

    $phpmailer->Port = 2525;

    $phpmailer->Username = '6c7b662f6a4ddc';

    $phpmailer->Password = 'e4d3ba55a2b66a';


    //Destinatarios
    $phpmailer->setFrom('harold@harolddev.com', 'Harold Dev');
    $phpmailer->addAddress($email, $name);

    ///Contenido del email
    $phpmailer->isHTML($html);                                 
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;

    $phpmailer->send();
}
