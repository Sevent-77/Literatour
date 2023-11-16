<?php
class Paginas extends Controller
{

     public function __construct()
     {
          if (!Sessao::estaLogado()):
               //URL::redirecionar('usuarios/login');
          endif;

          $this->livroModel = $this->model('Livro');
          $this->usuarioModel = $this->model('Usuario');
     }

     public function index()
     {

          $dados = $this->livroModel->ultimasPostagens();
          $valor = $this->livroModel->ultimosEditados();

          $this->view('paginas/home', $dados, $valor);
     } //fim do método index
     public function resenhados()
     {

          $dados = $this->livroModel->ultimosEditados();

          $this->view('paginas/resenhados', $dados);
     } //fim do método index

     public function config()
     {
          $dados = [];
          $this->view('usuario/configs', $dados);
     } //fim do método index

     public function livro($id = Null)
     {

          if (is_numeric($id)):
               $dados = $this->livroModel->livroPorId($id);
               $valor = $this->livroModel->Resenha($id);
               $this->view('paginas/livro', $dados, $valor);
          else:
               echo "<script>alert('Não issira valores inválidos');</script>";
               URL::redirecionar('');
          endif;

     } // fim do método livro

     public function pesquisa()
     {
          // Página verifica se possui dados no input
          if (isset($_GET["entry-search"])) {
               // Cria uma váriavel para armezenar temporáriamento o valor do input
               $texto = ($_GET["entry-search"]);
               // Verifica se a variáve $tex possui valor
               if (isset($texto)) {
                    $dados = $this->livroModel->pesquisarLivros($texto);
                    $valor = $this->livroModel->resultados($texto);
               }

               // Puxa a view de pesquisa e joga o dados na view
               $this->view('paginas/pesquisa', $dados, $valor);
          } // fim do método pesquisa
     } //fim da classe
}