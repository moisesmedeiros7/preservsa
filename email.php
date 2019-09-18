<?php

require '/PHPMailer/PHPMailer.php';
        
      if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
                  $assunto = $_POST['assunto'];
       }
       if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
                  $mensagem = $_POST['mensagem'];
       }
        
    $mail = new PHPMailer;
     
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'exemplo@gmail.com';
    $mail->Password = 'senha';
    $mail->Port = 587;
     
    $mail->setFrom('email@gmail.com', 'Contato');
    $mail->addAddress('email@mail.com.br');
     
    $mail->isHTML(true);
     
    $mail->Subject = $assunto;
    $mail->Body    = nl2br($mensagem);
    $mail->AltBody = nl2br(strip_tags($mensagem));
     
    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    } else {
         header('Location: index.php?enviado');
    }


?>
 
 