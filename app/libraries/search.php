<?php

    if (isset($_POST["entry-search"]))
    Pesquisa($_POST["entry-search"]); 


    function Pesquisa($tex){
        include '../app/view/iten.php';
        $db2 = new Database;
        if (isset($tex)){
            $db2->query("call pc_search_livros('".$tex."')");
            $array = $db2->resultados();
            foreach ($array as $key => $value){
                Gerar_item($array[$key]);
            }}
}


?>
