<?php
    function Gerar_item($array){
        echo('<div class="item" onclick="botaoClicado('."'".   URL  ."/'".  ','.$array->id_livro.')">
                <img src="'. URL .'/public/img/'.$array->img_path.'">
                <h2>'.$array->livro_nome.'</h2>
                <a>'.$array->cate_nome.'</a>
                <h4>'.$array->autor_nome.'</h4>
            </div>');
    }
?>
