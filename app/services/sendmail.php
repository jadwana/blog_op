<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\PostGlobal;
require '../../vendor/autoload.php';
require 'configmail.php';

if (null !==Postglobal::get('firstname') && null !==Postglobal::get('surname') && null !==Postglobal::get('email') &&
 null !==Postglobal::get('object') && null !==Postglobal::get('message') && null !==Postglobal::get('surname')
    && !empty(Postglobal::get('firstname')) && !empty(Postglobal::get('email'))
    && !empty(Postglobal::get('object')) && !empty(Postglobal::get('message')))
 {
        $firstname = strip_tags(trim(Postglobal::get('firstname')));
        $surname = strip_tags(trim(Postglobal::get('surname')));
        $name = $firstname." ".$surname;
        $object = strip_tags(trim(Postglobal::get('object')));
        $message = strip_tags(trim(Postglobal::get('message')));

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $mailadd;
        $mail->Password = $mailpass;
        $mail->SMTP ='tls';
        $mail->Port = 587;
        $mail->setFrom($mailadd, $name);
        $mail->addReplyTo($_POST['email']);
        $mail->addAddress($mailsend);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Subject = $object;
        $mail->WordWrap = 20;
        $mail->Body = $message;

    if (!$mail->send()) {
        throw new \Exception('Mail non envoyé !');
    } else {
        ?>
        <script language="javascript"> 
        alert("Merci de m\'avoir contactée. Je vous répondrai très bientôt.");
        document.location.href = '../../index.php?';</script>
        <?php
    }
} else {
    ?>
    <script language="javascript"> 
    alert("Vous devez remplir tous les champs !");
    document.location.href = '../../index.php?';</script>
    <?php
}
