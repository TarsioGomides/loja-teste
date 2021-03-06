<?php
require_once("cabecalho.php");
require_once("crud-produtos.php");

    $id = $_POST['id'];
    $nome = $_POST["nome"]; //a variável recebe o que foi passado no parâmetro nome
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $categoria_id = $_POST["categoria_id"];

    if(array_key_exists("usado", $_POST)) {//verifica se dentro do array associativo existe um valor atribuido ao campo "usado"
        $usado = "true";
    } else {
        $usado = "false";
    }

    if (alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
        <p class="alert-success"> produto <?php echo $nome ?> alterado com sucesso! </p>

    <?php
    } else {
        $msg = mysqli_error($conexao);
    ?>
        <p class="alert-danger"> produto <?php echo $nome ?> não foi alterado: <?php echo $msg ?></p>

    <?php
    }
    /*
    * Fecha a conexao
    * o PHP fecha a conexão ao terminar de executar toda a págiana, portanto não é obrigatório fechar a conexão
    */
    mysqli_close($conexao);
?>
<?php include("rodape.php") ?>
