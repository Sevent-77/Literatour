<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        if (isset($formulario)):
            $dados = [
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha'])/*,
                'confirma_senha' => trim($formulario['confirma_senha']),*/
            ];

            if (in_array("", $formulario)):

                if (empty($formulario['nome'])):
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;

                if (empty($formulario['email'])):
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($formulario['senha'])):
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

                
            else:
                if (Checa::checarNome($formulario['nome'])):
                    $dados['nome_erro'] = 'O nome informado é invalido';
                elseif (Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido';

                elseif ($this->usuarioModel->checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado já está cadastrado';
                elseif (strlen($formulario['senha']) < 6):
                    $dados['senha_erro'] = 'A senha deve ter no minimo 6 caracteres';
                
                else:
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if ($this->usuarioModel->armazenar($dados)):
                        Sessao::mensagem('usuario', 'Cadastro realizado com sucesso');
                        URL::redirecionar('usuarios/cadastrar');
                    else:
                        die("Erro ao armazenar usuario no banco de dados");
                    endif;

                endif;

            endif;
        else:
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];

        endif;


        $this->view('usuario/index', $dados);
    }

    public function login()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)):
            $dados = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
            ];

            if (in_array("", $formulario)):

                if (empty($formulario['email'])):
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($formulario['senha'])):
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

            else:
                if (Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido';
                else:

                    $usuario = $this->usuarioModel->checarLogin($formulario['email'], $formulario['senha']);

                    if ($usuario):
                        $this->criarSessaoUsuario($usuario);
                    else:
                        Sessao::mensagem('usuario', 'Usuario ou senha invalidos', 'alert alert-danger');
                    endif;

                endif;

            endif;
        else:
            $dados = [
                'email' => '',
                'senha' => '',
                'email_erro' => '',
                'senha_erro' => ''
            ];

        endif;


        $this->view('usuario/index', $dados);
    }

    private function criarSessaoUsuario($usuario)
    {
        $_SESSION['usuario_id'] = $usuario->id_usuario;
        $_SESSION['usuario_nome'] = $usuario->user_nome;
        $_SESSION['usuario_email'] = $usuario->user_email;
        URL::redirecionar("");

    }
    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();

        URL::redirecionar('usuarios/cadastrar');
    }


}
