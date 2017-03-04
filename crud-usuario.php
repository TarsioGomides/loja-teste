<?php
require_once("conecta.php");

    function buscaUsuario($conexao, $email, $senha) {
        $senhaMd5 = md5($senha);//criptografa a senha do usuário pra md5
        //protege do SQL injection, tratando aspas como caracteres de escape (\'), para que as aspas não sejam interpretadas pela query
        $email = mysqli_real_escape_string($conexao, $email);
        $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);//retorna o usuário
    }
