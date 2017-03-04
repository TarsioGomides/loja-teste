<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");
?>

<h1>Bem vindo!</h1>

<?php
    /*Verificando se um determinado cookie é enviado nas requisições*/
    if(usuarioEstaLogado()) { ?>
        <p class="alert-success">Você está logado como <?=usuarioLogado()?>
        <a href="logout.php">Deslogar</a></p>
<?php
    }?>

<?php
    //else {
    /*Verificando se um determinado cookie é enviado nas requisições*/
    if(!usuarioEstaLogado()) { ?>
        <h2>Login</h2>
        <form action="login.php" method="post">
            <table class="table">
                <tr>
                    <td>Email</td>
                    <td><input class="form-control" type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Senha</td>
                    <td><input class="form-control" type="password" name="senha"></td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary">Login</button></td>
                </tr>
            </table>
        </form>
<?php
    }?>
<?php include("rodape.php") ?>
