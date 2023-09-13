
<div>
    <h2><?= $dados->livro_nome?></h2>
    <h2><?= var_dump($dados)?></h2>
    <img src="<?=URL?>/public/img/<?= $dados->img_path?>">
    <h4><?= $dados->autor_nome?> (<?= $dados->ano_publi?>)</h4>
    
    <a><?= $dados->cate_nome?></a>
    <h2>Sinopse</h2>
    <p><?= $dados->livro_sinopse?></p>
    
</div>
