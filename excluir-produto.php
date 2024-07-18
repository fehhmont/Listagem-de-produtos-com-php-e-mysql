<?php
include("conexao.php");
include("banco-produto.php");

$id=$_GET['produto_id'];
if (excluir($conexao,$id)) {
    header('Location:lista-produto.php');
    die();
}
?>