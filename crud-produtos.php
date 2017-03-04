<?php
require_once("conecta.php");

/********************************************
Retorna todos os produtos existentes no BD
********************************************/
function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p
join categorias as c on c.id=p.categoria_id");

    //mysqli_fetch_assoc() criará um array, com os dados de um produto
    while($produto = mysqli_fetch_assoc($resultado)) {
        //echo $produto['nome'] . "</br>";
        array_push($produtos, $produto);//Adiciona um $produto por vez ao array $produtos
    }

    return $produtos;
}

/********************************************
Insere um produto no BD
********************************************/
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
    //maneira trabalhosa
    //$query = "insert into produtos (nome, preco) values (" . $nome . "," . $preco . ")";
    //maneira mais simples
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usados) values
('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";

    return mysqli_query($conexao, $query);
}

/********************************************
Remove um produto no BD
********************************************/
function removeProduto($conexao, $id) {
    $query = "delete from produtos where id={$id}";

    return mysqli_query($conexao, $query);
}

/********************************************
Busca um produto no BD
********************************************/
function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id={$id}";

    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

/********************************************
Altera um produto no BD
********************************************/
function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
    $query = "update produtos set nome='{$nome}', preco={$preco}, descricao='{$descricao}',
categoria_id={$categoria_id}, usados={$usado} where id ={$id}";

    return mysqli_query($conexao, $query);
}
