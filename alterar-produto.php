<?php
include("conexao.php");
include("banco-produto.php");

$produto_id = $_GET['produto_id'];
$produto = buscarProduto($conexao, $produto_id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Alterar Produto</h1>
        <div class="mb-4">
            <a href="criar.php" class="btn btn-primary mr-2">Cadastrar outro produto</a>
            <a href="lista-produto.php" class="btn btn-secondary">Listar Produtos</a>
        </div>
        <form method="post" action="verifica-alteracao.php">
            <input type="hidden" name="id" value="<?php echo $produto['produto_id']; ?>">
            <div class="form-group">
                <label for="codigodebarra">Código de Barras</label>
                <input type="text" class="form-control" id="codigodebarra" name="codigodebarra" value="<?php echo $produto['codigodebarra']; ?>">
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $produto['nome']; ?>">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $produto['descricao']; ?>">
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" value="<?php echo $produto['preco']; ?>">
            </div>
            <button type="submit" class="btn btn-success" name="btnAlterar">Alterar</button>
        </form>
    </div>
    <!-- Inclui o JS do Bootstrap e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>