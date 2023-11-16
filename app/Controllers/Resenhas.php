<?php

class Resenhas extends Controller
{

    public function __construct()
    {
        if (!Sessao::estaLogado()):
            //URL::redirecionar('usuarios/login');
        endif;

        $this->resenhaModel = $this->model('Resenha');
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar($id)
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (!isset($_SESSION['usuario_id'])):
            echo "<script>alert('Cadastre-se ou entre antes de escrever a resenha!!');
            window.location.href = ('" . URL . "/paginas/livro/" . $id . "');</script>";
        endif;
        if (isset($formulario) && $_SESSION['usuario_id']):
            $dados = [
                'texto' => trim($formulario['texto']),
                'livro' => $id,
                'usuario_id' => $_SESSION['usuario_id']
            ];
            var_dump($dados);

            if (in_array("", $formulario)):

                if (empty($formulario['texto'])):
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;

            else:
                if ($this->resenhaModel->armazenar($dados)):
                    Sessao::mensagem('resenha', 'Resenha cadastrado com sucesso');
                    URL::redirecionar('paginas/livro/' . $id);
                else:
                    die("Erro ao armazenar resenha no banco de dados");
                endif;

            endif;
        else:
            $dados = [
                'titulo' => '',
                'texto' => '',
                'texto_erro' => ''
            ];
        endif;


    }
    public function cadastrarResposta($id, $livro)
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (!isset($_SESSION['usuario_id'])):
            echo "<script>alert('Cadastre-se ou entre antes de responder uma resenha!!');
            window.location.href = ('" . URL . "/paginas/livro/" . $livro . "');</script>";
        endif;
        if (isset($formulario) && $_SESSION['usuario_id']):
            $dados = [
                'texto' => trim($formulario['texto']),
                'resenha' => $id,
                'usuario_id' => $_SESSION['usuario_id']
            ];
            var_dump($dados);

            if (in_array("", $formulario)):

                if (empty($formulario['texto'])):
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;

            else:
                if ($this->resenhaModel->armazenarResposta($dados)):
                    Sessao::mensagem('resenha', 'Resenha cadastrado com sucesso');
                    URL::redirecionar('paginas/livro/' . $livro);
                else:
                    die("Erro ao armazenar resenha no banco de dados");
                endif;

            endif;
        else:
            $dados = [
                'titulo' => '',
                'texto' => '',
                'texto_erro' => ''
            ];

        endif;


    }
}