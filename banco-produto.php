<?php

function inserir($conexao, $codigodebarra, $nome, $descricao, $preco) {
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $sql = "INSERT INTO produtos (codigodebarra, nome, descricao, preco, data_cadastro) VALUES ('$codigodebarra', '$nome', '$descricao', '$preco', NOW())";
    return mysqli_query($conexao, $sql);
}

function listarProdutos($conexao) { // Corrigir o nome da função para listarProdutos
    $produtos = array();
    $sql = "SELECT * FROM produtos";
    $resultado = mysqli_query($conexao, $sql);
    
    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    return $produtos;
}

function excluir($conexao, $produto_id) {
    $sql = "DELETE FROM produtos WHERE produto_id = $produto_id";
    return mysqli_query($conexao, $sql);
}

function alterar($conexao, $produto_id, $codigodebarra, $nome, $descricao, $preco) {
    // Use mysqli_real_escape_string para evitar problemas de segurança e sintaxe
    $codigodebarra = mysqli_real_escape_string($conexao, $codigodebarra);
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $preco = mysqli_real_escape_string($conexao, $preco);

    // Formate o preço corretamente para evitar problemas de sintaxe
    $preco = number_format((float)$preco, 2, '.', '');

    $sql = "UPDATE produtos SET codigodebarra='$codigodebarra', nome='$nome', descricao='$descricao', preco='$preco' WHERE produto_id=$produto_id";
    return mysqli_query($conexao, $sql);
}

function buscarProduto($conexao, $produto_id) {
    $sql = "SELECT * FROM produtos WHERE produto_id = $produto_id";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}

function contarProdutos($conexao) {
    $query = "SELECT COUNT(*) as total FROM produtos";
    $resultado = $conexao->query($query);
    
    if ($resultado) {
        $linha = $resultado->fetch_assoc();
        return $linha['total'];
    } else {
        return 0;
    }
}
?>