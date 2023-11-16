<?php

class Livro
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function ultimasPostagens(){

        $this->db->query("SELECT * from livro l inner join categoria c 
        on l.id_categoria = c.id_categoria
        inner join autor a 
        on a.id_autor = l.id_autor order by livro_add_dt desc limit 8;");
        $dados = $this->db->resultados();

        return $dados;
    }
    public function ultimosEditados(){

        $valor = [];
        if (isset($_SESSION["usuario_id"])) :
            $this->db->query("SELECT * from livro l inner join categoria c 
            on l.id_categoria = c.id_categoria
            inner join autor a on a.id_autor = l.id_autor
            inner join edicao e on e.edit_livro = l.id_livro
            where e.edit_user = ".$_SESSION['usuario_id']."
            order by e.edit_hora desc limit 4;");
            $valor = $this->db->resultados();
        endif;

        return $valor;
    }

    public function livroPorId($id){

        $this->db->query("CALL pc_search_livro(".$id.");");
        $dados = $this->db->resultado();

        return $dados;
    }
    public function pesquisarLivros($texto){

        // Na instância do banco é executado a procedure
        $this->db->query("CALL pc_search_livros(:tex)");
        // Substitui o ":tex" pelo valor da variável $tex 
        $this->db->bind("tex", $texto);
        // Adiciona no array dados os resultados que retorna do banco de dados
        $dados = $this->db->resultados();

        return $dados;
    }

    public function Resenha($id){
        if(isset($id)):
            $db = new Database;
            $db->query("CALL pc_search_resenha('".$id."')");
            $dados = $db->resultados();
            return $dados;
        endif;
    }

    public function Resposta($id){
        if(isset($id)):
            $this->db->query("CALL pc_search_resposta('".$id."')");
            $dados = $this->db->resultados();
            return $dados;
        endif;
    }
    public static function resultados($text){
        if(isset($text)):
            $db = new Database();
            $db->query("SELECT fc_resultado_pesquisa('".$text."') AS 'valor'");
            $dados = $db->resultado();
            return $dados->valor;
        endif;
    }
    
}
