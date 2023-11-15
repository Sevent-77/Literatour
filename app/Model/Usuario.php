<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checarEmail($email)
    {
        $this->db->query("SELECT user_email FROM usuario WHERE user_email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO usuario(user_nome, user_email, user_senha, ativo) VALUES (:nome, :email, :senha, :ativo)");

        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);
        $this->db->bind("ativo", "A");

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function checarLogin($email, $senha)
    {
        $this->db->query("SELECT * FROM usuario WHERE user_email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) : 
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->user_senha)): 
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }

    public function lerUsuarioPorId($id){
        $this->db->query("SELECT * FROM usuario WHERE id_usuario = :id");
        $this->db->bind('id', $id);
        return $this->db->resultado();
    }
}
