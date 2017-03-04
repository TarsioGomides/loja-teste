<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

require_once("PHPMailer/PHPMailerAutoload.php");

$email_a_enviar = new PHPMailer();
$email_a_enviar->isSMTP();

//$email_a_enviar->SMTPDebug = 4;

$email_a_enviar->Host = 'smtp.gmail.com';//informa o servidor de SMTP
$email_a_enviar->Port = 587;//informa a porta do servidor de SMTP e essa porta depende do servidor escolhido
$email_a_enviar->SMTPSecure = 'tls';//usa o protocolo de segurança tls
$email_a_enviar->SMTPAuth = true;//informando que deseja usar autenticação
$email_a_enviar->Username = "";
$email_a_enviar->Password = "";


$email_a_enviar->setFrom("", "ADM da loja");//aqui vem quem tá enviando o email
$email_a_enviar->addAddress("");//Aqui vem quem vai receber esse email
$email_a_enviar->Subject = "Testando o envio de email";//Título do email
$email_a_enviar->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mesagem}</html>");
$email_a_enviar->AltBody = "de: {$nome}\nemail: {$email}\nmensagem: {$mesagem}";//para emails que não mostram o HTML da linha acima, ou seja, uma alternativa

//enviando o email
if ($email_a_enviar->send()) {
    $_SESSION['success'] = "Email enviado com sucesso";
    header("Location: index.php");
} else {
    $_SESSION['danger'] = "Falha ao enviar email" . $email_a_enviar->ErrorInfo;
    header("Location: contato.php");
}

die();
