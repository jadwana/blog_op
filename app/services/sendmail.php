<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';


    if(isset($_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['object'],
    $_POST['message']) && !empty($_POST["surname"]) && !empty($_POST["firstname"]) && !empty($_POST["email"])
    && !empty($_POST["object"]) && !empty($_POST["message"])) {
        $firstname = strip_tags(trim($_POST['firstname']));
        $surname = strip_tags(trim($_POST['surname']));
        $name = $firstname." ".$surname;
        $object = strip_tags(trim($_POST['object']));
        $message = strip_tags(trim($_POST['message']));

        $mail =new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username='test2formjad@gmail.com';
        $mail->Password='#';
        $mail->SMTP='tls';
        $mail->Port=587;
        $mail->setFrom('test2formjad@gmail.com',$name);
        $mail->addReplyTo($_POST['email']);
        $mail->addAddress('testformjad@gmail.com');
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Subject= $object;
        $mail->WordWrap = 20;
        $mail->Body = $message;

        if(!$mail->send()){
            echo 'mail non envoyé';
            echo 'Erreurs: '.$mail->ErrorInfo;
        }else{
            ?>
            <script language="javascript"> 
            alert("Merci de m\'avoir contactée. Je vous répondrai très bientôt.");
            document.location.href = '../../index.php?';</script>
            <?php 
        }
    }else{
        ?>
        <script language="javascript"> 
        alert("vous devez remplir tous les champs !");
        document.location.href = '../../index.php?';</script>
        <?php 
    }





     
      
        
        
    

    
