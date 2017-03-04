<?php
require_once("cabecalho.php");
require_once("crud-produtos.php");
require_once("logica-usuario.php");


$id = $_POST['id'];
removeProduto($conexao, $id);
$_SESSION["success"] = "Produto removido com sucesso";
header("Location: produto-lista.php");
die();//Pare por aqui nessa página PHP, não execute mais nada abaixo.
?>
