<?php
if(isset($_POST['submit'])) 
{
$message=
'Full Name:	'.$_POST['nome'].'<br />
Subject:	'.$_POST['assunto'].'<br />
Phone:	'.$_POST['telefone'].'<br />
Email:	'.$_POST['email'].'<br />
Comments:	'.$_POST['comentario'].'
';
    require "phpmailer/class.phpmailer.php"; //include phpmailer class
      
    // Inicializacao  
    // Caso Use email gmail é necessario Habilitar Aplicativos menos seguros:
    // Ative Sua conta usando Este link: https://myaccount.google.com/lesssecureapps?pli=1
    $mail = new PHPMailer();  
    $emailReal = "contatopreservsa@gmail.com"; // Seu Email Aqui
    $senhaReal = "heroku123@321"; // Sua Senha Aqui 
      
    // Set up SMTP  
    $mail->IsSMTP();                  
    $mail->SMTPAuth = true;         
    $mail->SMTPSecure = 'ssl';      // Conexao TLS  
    $mail->Host = "smtp.gmail.com";  //Endereco do Server SMTP GMAIL 
    $mail->Port = 465;  // Porta Gmail SMTP 
    $mail->Encoding = '7bit';
    
    // Autenticacao  
    $mail->Username   = $emailReal; // Email Real
    $mail->Password   = $senhaReal;// Senha Real
      
    // Compondo Email
    $mail->addCC($_POST['email']); // Enviar Copia para email do Formulario
    
    $mail->SetFrom($_POST['email'], "Nao Responda"); // Email Do Formulario + Nome do Email 
    
    $mail->Subject = "Nao Responda";      // Assunto, Nao obrigatório   
    $mail->MsgHTML($message);
 
    // Enviando  
    $mail->AddAddress($emailReal); // Pra onde Enviar 
    $result = $mail->Enviar();		// Send!  
	$message = $result ? 'Successfully Sent!' : 'Sending Failed!';      
	unset($mail);
    echo = "<meta http-equiv='Refresh' content='0;URL=contato.html>";

}
?>