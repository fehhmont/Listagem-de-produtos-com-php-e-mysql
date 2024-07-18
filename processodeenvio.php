<?php
include("conexao.php");
include("banco-produto.php");

if(isset($_POST['btn'])) {
    $codigodebarra = $_POST['codigodebarra'] ?? "";
    $nome = $_POST['nome'] ?? "";
    $descricao = $_POST['descricao'] ?? "";
    $preco = $_POST['preco'] ?? "";

    if (codigoDeBarraExiste($conexao, $codigodebarra)) {
        header("Location: criar.php?erro=1");
        exit;
    } else {
        if (inserir($conexao, $codigodebarra, $nome, $descricao, $preco)) {
            header("Location: criar.php?sucesso=1");
            exit;
        } else {
            header("Location: criar.php?erro=2");
            exit;
        }
    }
}

function codigoDeBarraExiste($conexao, $codigodebarra) {
    $query = "SELECT COUNT(*) FROM produtos WHERE codigodebarra = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $codigodebarra);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    return $count > 0;
}
?>