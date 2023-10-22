<?php include '../app/view/header.php'; ?>
<link rel="stylesheet" href="<?= URL ?>/public/css/style.css" type="text/css">
<link rel="stylesheet" href="<?= URL ?>/public/css/style1.css" type="text/css">
<main>
    <div class="ontem">
        <br><br><br>
        <h1>ÚLTIMAS POSTAGENS</h1> <br>
        <nave id="menu-h">
            <?php foreach ($dados as $key): ?>
                <div class="item" onclick="botaoClicado('<?= URL ?>/',<?= $key->id_livro ?>)">
                    <img src="<?= URL ?>/public/img/<?= $key->img_path ?>">
                    <h2><?= $key->livro_nome ?></h2>
                    <a><?= $key->cate_nome ?></a>
                    <h4><?= $key->autor_nome ?></h4>
                </div>
            <?php endforeach; ?>
        </nave>
</main>