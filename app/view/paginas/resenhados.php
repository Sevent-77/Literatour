<?php include '../app/view/header.php'; ?>
<link rel="stylesheet" href="<?= URL ?>/public/css/style.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style1.css" type="text/css">
<main>
    <div class="ontem">
        <br><br><br>
        <?php if ($dados != []): ?>
            <h1>Ultimos resenhados</h1> <br>
            <div id="menu-h">
                <?php foreach ($dados as $key): ?>
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
                <?php endforeach; ?>
            </div>
        <?php
        elseif (!isset($_SESSION["usuario_id"])): ?>
            <h1>Entre ou Cadastre-se</h1> <br>
        <?php else: ?>
            <h1>Nenhuma resenha ou resposta feita.</h1> <br>
            <?php
        endif; ?>
</main>
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