<?php
/*
OBS:
1 - require_once garante que o arquivo vai ser incluso uma única vez
2 - require dá erro se você não tem o arquivo e o include da warning
*/
require_once("cabecalho.php");
require_once("crud-produtos.php");
require_once("logica-usuario.php");

    /*Evita que usuários não logados consigam adicionar produtos*/
    verificaLogin();

    $nome = $_POST["nome"]; //a variável recebe o que foi passado no parâmetro nome
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $categoria_id = $_POST["categoria_id"];

    if(array_key_exists("usado", $_POST)) {//verifica se dentro do array associativo existe um valor atribuido ao campo "usado"
        $usado = "true";
    } else {
        $usado = "false";
    }

    if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
        <p class="alert-success"> produto <?php echo $nome ?> adicionado com sucesso! </p>

    <?php
    } else {
        $msg = mysqli_error($conexao);
    ?>
        <p class="alert-danger"> produto <?php echo $nome ?> não foi adicionado: <?php echo $msg ?></p>

    <?php
    }
    /*
    * Fecha a conexao
    * o PHP fecha a conexão ao terminar de executar toda a págiana, portanto não é obrigatório fechar a conexão
    */
    mysqli_close($conexao);
?>
<?php include("rodape.php") ?>
