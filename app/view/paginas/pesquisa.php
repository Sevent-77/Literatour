<?php include '../app/view/header.php';?>
<link rel="stylesheet" href="<?=URL?>/public/css/style.css" type="text/css">
<link rel="stylesheet" href="<?=URL?>/public/css/style1.css" type="text/css">

<h1>Pesquisa</h1>

<div class = "container-flexbox">
<?php 
// Verifica dados se existem no banco de dados
if ($dados == Null):
    echo"<h3>Nenhum livro com este nome encontrado!</h3>";
else:
    // Caso tiver dados, será gerados divs para cada resultado
    foreach ($dados as $key):?>
        <div class="item" onclick="botaoClicado('<?=URL?>/',<?=$key->id_livro?>)">
            <img src="<?=URL?>/public/img/<?=$key->img_path?>">
            <h2><?=$key->livro_nome?></h2>
            <a><?=$key->cate_nome?></a>
            <h4><?=$key->autor_nome?></h4>
        </div>
    <?php endforeach;
endif;?>
</div>
