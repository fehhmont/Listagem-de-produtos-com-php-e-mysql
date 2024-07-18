<!doctype html>
<html lang="pt-br">
<head>
    <title>Cadastro de Produtos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Inclui o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="stylo.css"> -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cadastro de Produtos</h1>
        
        <?php if (isset($_GET['erro'])): ?>
            <div class="alert alert-danger">
                <?php
                if ($_GET['erro'] == 1) {
                    echo "Código de barra já existe!";
                } elseif ($_GET['erro'] == 2) {
                    echo "Erro ao cadastrar o produto.";
                }
                ?>
            </div>
        <?php elseif (isset($_GET['sucesso'])): ?>
            <div class="alert alert-success">
                Produto cadastrado com sucesso!
            </div>
        <?php endif; ?>
        
        <form id="produto" method="post" action="processodeenvio.php">
            <div class="form-group">
                <label for="codigoDeBarra">Código de Barra</label>
                <input type="text" class="form-control" id="codigoDeBarra" name="codigodebarra" maxlength="100" placeholder="Digite o código">
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" maxlength="100" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição">
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" maxlength="13" placeholder="EX: R$99,99">
            </div>
            <button type="submit" class="btn btn-primary" id="button" name="btn">Enviar</button>
        </form>
        <a href="lista-produto.php" class="btn btn-secondary mt-3">Listar Produtos</a>
    </div>
    <!-- Inclui o JS do Bootstrap e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>