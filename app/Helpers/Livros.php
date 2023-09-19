<?php 

class Livros{
    public static function Resenha($id){
        if(isset($id)):
            $db = new Database;
            $db->query("CALL pc_search_resenha('".$id."')");
            $dados = $db->resultados();
            return $dados;
        endif;
    }
    public static function checaResenha($id){
        if(isset($id)):
            $db = new Database;
            $db->query("CALL pc_search_resenha('".$id."')");
            $db->executa();
            if($db->totalResultados() == 0):
                return TRUE;
            else:
                return FALSE;
            endif;
        endif;
    }
    public static function checaResposta($id){
        if(isset($id)):
            $db = new Database;
            $db->query("CALL pc_search_resposta('".$id."')");
            $db->executa();
            if($db->totalResultados() == 0):
                return TRUE;
            else:
                return FALSE;
            endif;
        endif;
    }
    public static function Resposta($id){
        if(isset($id)):
            $db = new Database;
            $db->query("CALL pc_search_resposta('".$id."')");
            $dados = $db->resultados();
            return $dados;
        endif;
    }
}

?>