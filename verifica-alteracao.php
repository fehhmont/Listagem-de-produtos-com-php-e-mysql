<?php
include("conexao.php");
include("banco-produto.php");

$produto_id = $_POST['id']; // Use 'id' para corresponder ao name do campo no formulário
$codigodebarra = $_POST['codigodebarra'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

if (alterar($conexao, $produto_id, $codigodebarra, $nome, $descricao, $preco)) {
    header('Location: lista-produto.php');
}
?>
