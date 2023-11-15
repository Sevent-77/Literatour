<?php

class Resenha
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO resenha(id_usuario, id_livro, resen_texto) VALUES (:usuario_id, :livro, :texto)");

        $this->db->bind("usuario_id", $dados['usuario_id']);
        $this->db->bind("livro", $dados['livro']);
        $this->db->bind("texto", $dados['texto']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
    public function armazenarResposta($dados)
    {
        $this->db->query("INSERT INTO resposta(id_usuario, id_resenha, resposta_text) VALUES (:usuario_id, :resenha, :texto)");

        $this->db->bind("usuario_id", $dados['usuario_id']);
        $this->db->bind("resenha", $dados['resenha']);
        $this->db->bind("texto", $dados['texto']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }
}
