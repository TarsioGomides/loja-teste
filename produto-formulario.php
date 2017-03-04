<?php
require_once("cabecalho.php");
require_once("crud-categoria.php");
require_once("logica-usuario.php");

    /*Evita que usuários não logados consigam acessar o formulário para adicionar produtos*/
    verificaLogin();

    $produto = array("nome" => "", "desricao" => "", "preco" => "", "categoria_id" => "1");
    $usado = "";
    $categorias = listaCategorias($conexao);
?>

    <h1> Formulario de produto </h1>
    <form action="adiciona-produto.php" method="post"> <!--sua ação é ir para essa página -->
        <table class="table">

            <?php include("produto-formulario-base.php"); ?>

            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </td>
            </tr>
        </table>
    </form>
<?php include("rodape.php") ?>
