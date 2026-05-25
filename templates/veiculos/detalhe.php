<?php // templates/veiculos/detalhe.php ?>
<?php
$placeholder = 'data:image/svg+xml;charset=UTF-8,' . rawurlencode(
    '<svg xmlns="http://www.w3.org/2000/svg" width="900" height="540" viewBox="0 0 900 540"><rect width="900" height="540" fill="#eef2f7"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#64748b" font-family="Arial" font-size="30">Sem imagem</text></svg>'
);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width:960px; margin:0 auto; padding:20px; }
        a { color:#1565C0; text-decoration:none; }
        .detalhe { display:grid; grid-template-columns:minmax(0,1.4fr) minmax(260px,.8fr); gap:24px; align-items:start; }
        img { width:100%; aspect-ratio:5/3; object-fit:cover; background:#eee; border-radius:8px; }
        .painel { border:1px solid #ddd; border-radius:8px; padding:18px; }
        .preco { font-size:1.7rem; font-weight:bold; color:#1565C0; margin:12px 0; }
        dl { display:grid; grid-template-columns:120px 1fr; gap:10px; margin:0; }
        dt { font-weight:bold; color:#555; }
        dd { margin:0; }
        @media (max-width: 760px) { .detalhe { grid-template-columns:1fr; } }
    </style>
</head>
<body>
    <p><a href="<?= htmlspecialchars($baseUrl ?: '/') ?>">Voltar ao catalogo</a></p>
    <h1><?= htmlspecialchars($veiculo['marca'] . ' ' . $veiculo['modelo']) ?></h1>

    <div class="detalhe">
        <img src="<?= !empty($veiculo['imagem']) ? '/uploads/' . htmlspecialchars((string) $veiculo['imagem']) : $placeholder ?>"
             alt="<?= htmlspecialchars($veiculo['marca'] . ' ' . $veiculo['modelo']) ?>">

        <section class="painel">
            <div class="preco"><?= number_format((float) $veiculo['preco'], 2, ',', '.') ?> EUR</div>
            <dl>
                <dt>Marca</dt>
                <dd><?= htmlspecialchars((string) $veiculo['marca']) ?></dd>
                <dt>Modelo</dt>
                <dd><?= htmlspecialchars((string) $veiculo['modelo']) ?></dd>
                <dt>Ano</dt>
                <dd><?= htmlspecialchars((string) $veiculo['ano']) ?></dd>
                <dt>Km</dt>
                <dd><?= number_format((float) $veiculo['quilometros'], 0, '.', '.') ?> km</dd>
                <dt>Combustivel</dt>
                <dd><?= htmlspecialchars((string) $veiculo['combustivel']) ?></dd>
            </dl>
        </section>
    </div>
</body>
</html>
