<?php
include("conexao.php"); // Inclui o arquivo de conexão ao banco de dados
include("banco-produto.php"); // Inclui o arquivo de funções relacionadas aos produtos
$totalProdutos = contarProdutos($conexao); // Corrige o nome da variável para $totalProdutos
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <!-- Inclui o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de produtos</h1>
        <h2 class="mb-3">Menu</h2>
        <div class="mb-4">
            <a href="criar.php" class="btn btn-primary mr-2">Cadastrar outro produto</a>
            <a href="lista-produto.php" class="btn btn-secondary">Listar Produtos</a>
        </div>

        <div class="alert alert-info">
            <strong>Total de produtos no banco de dados: </strong> <?php echo $totalProdutos; ?>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Alterar</th>
                    <th>Excluir</th>
                    <th>ID</th>
                    <th>Código de barras</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $produtos = listarProdutos($conexao); // Chama a função para listar os produtos
                foreach ($produtos as $produto) { // Itera sobre cada produto
                ?>
                    <tr>
                        <td><a href="alterar-produto.php?produto_id=<?php echo $produto['produto_id']; ?>" class="btn btn-warning btn-sm">Alterar</a></td>
                        <td><a href="excluir-produto.php?produto_id=<?php echo $produto['produto_id']; ?>" class="btn btn-danger btn-sm">Excluir</a></td>
                        <td><?php echo $produto['produto_id']; ?></td>
                        <td><?php echo $produto['codigodebarra']; ?></td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo $produto['descricao']; ?></td>
                        <td><?php echo $produto['preco']; ?></td>
                    </tr>
                <?php
                } // Fecha o bloco do foreach
                ?>
            </tbody>
        </table>
    </div>
    <!-- Inclui o JS do Bootstrap e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>