<?php // templates/veiculos/nao-encontrado.php ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width:800px; margin:0 auto; padding:20px; }
        a { color:#1565C0; text-decoration:none; }
    </style>
</head>
<body>
    <h1>Veiculo nao encontrado</h1>
    <p>O veiculo pedido nao existe ou ja nao esta disponivel.</p>
    <p><a href="<?= htmlspecialchars($baseUrl ?: '/') ?>">Voltar ao catalogo</a></p>
</body>
</html>
