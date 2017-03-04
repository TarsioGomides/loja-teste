<?php
require_once("cabecalho.php");
require_once("crud-categoria.php");
require_once("crud-produtos.php");

    $id = $_GET['id'];
    $produto = buscaProduto($conexao, $id);
    $categorias = listaCategorias($conexao);
    $usado = $produto['usados'] ? "checked='checked'" : "";
?>

    <h1> Altera produto </h1>
    <form action="altera-produto.php" method="post"> <!--sua ação é ir para essa página -->
        <input type="hidden" name="id" value="<?=$produto['id']?>">
        <table class="table">

            <?php include("produto-formulario-base.php"); ?>

            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">Alterar</button>
                </td>
            </tr>
        </table>
    </form>
<?php include("rodape.php") ?>
