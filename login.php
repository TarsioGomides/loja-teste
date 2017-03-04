<?php
require_once("crud-usuario.php");
require_once("logica-usuario.php");

$usuario = buscaUsuario($conexao, $_POST['email'], $_POST['senha']);

//Verifica se algum usuário foi retornado, para fizer se o login foi aprovado ou não
if($usuario == null) {
    $_SESSION["danger"] = "Usuário ou senha inválido";
    header("Location: index.php");
} else {
    $_SESSION["success"] = "Usuário logado com sucesso";
    logaUsuario($usuario["email"]);
    header("Location: index.php");
}
die();
