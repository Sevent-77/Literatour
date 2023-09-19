<?php
class Paginas extends Controller{
     public function index(){
          $dados = ['titulo'=>'Página Inicial',
                    'descricao'=>'Aula de PHP'
                    ];
          $this->view('paginas/home', $dados);
          }//fim do método index

     public function livro($id){
          include '../app/libraries/Database.php';
          $db = new Database;
          $db->query("CALL pc_search_livro(".$id.");");
          $dados = $db->resultado();
          $this->view('paginas/livro', $dados);
     }// fim do método livro

     public function pesquisa(){
          if(isset($_GET["entry-search"])){
               $tex = ($_GET["entry-search"]);
               $db = new Database;
               if (isset($tex)){
                    $db->query("CALL pc_search_livros('".$tex."')");
                    $dados = $db->resultados();}}
          $this->view('paginas/pesquisa', $dados);
     }// fim do método pesquisa
}//fim da classe


