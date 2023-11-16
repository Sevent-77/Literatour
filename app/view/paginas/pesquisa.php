<?php include '../app/view/header.php'; ?>
<link rel="stylesheet" href="<?= URL ?>/public/css/style.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style1.css" type="text/css">

<h1>Pesquisa</h1>

<h1 id="result" style="font-size: 25px;">
    <?= $valor ?>
</h1>
<div class="container-flexbox">
    <?php

    // Verifica dados se existem no banco de dados
    if ($dados != Null):
        // Caso tiver dados, será gerados divs para cada resultado
        foreach ($dados as $key): ?>
            <div class="item" onclick="botaoClicado('<?= URL ?>/',<?= $key->id_livro ?>)">
                <img src="<?= URL ?>/public/img/<?= $key->img_path ?>">
                <h2>
                    <?= $key->livro_nome ?>
                </h2>
                <a>
                    <?= $key->cate_nome ?>
                </a>
                <h4>
                    <?= $key->autor_nome ?>
                </h4>
            </div>
        <?php endforeach;
    endif; ?>
</div>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget();
</script>