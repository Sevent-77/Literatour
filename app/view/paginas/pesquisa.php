<h1>Pesquisa</h1>
<!-- Coment -->
<div class = "container-flexbox">
<?php 
if ($dados == Null):
    echo"<h3>Nenhum livro com este nome encontrado!</h3>";
else:
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
