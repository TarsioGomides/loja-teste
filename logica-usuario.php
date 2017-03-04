<?php
session_start();//Se a session já existe, então ela é usada, caso não exista, ela será criada

function logaUsuario($email) {
    //setcookie("usuario_logado", $email, time() + 60);//(nomedocookie, valordocookie, tempoduraçãodocookie)
    $_SESSION["usuario_logado"] = $email;//Adicionando coisas na session
}

/*Retorna o usuário logado*/
function usuarioLogado() {
    //return $_COOKIE["usuario_logado"];
    return $_SESSION["usuario_logado"];
}

function usuarioEstaLogado() {
    //return isset($_COOKIE["usuario_logado"]);
    return isset($_SESSION["usuario_logado"]);
}

function verificaLogin() {
    if(!usuarioEstaLogado()) {
        $_SESSION["danger"] = "Você não tem acesso a esta funcionlidade";
        header("Location: index.php");
        die();
    }
}

/*Faz o logout do usuário*/
function logout() {
    //unset($_SESSION["usuario_logado"]);
    session_destroy();
    session_start();//Cria uma nova sessão para o próximo que tentar logar
}
