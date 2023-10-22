<?php
class Paginas extends Controller{
     
     public function index(){
          $db = new Database;
          $db->query("SELECT * from livro l inner join categoria c 
          on l.id_categoria = c.id_categoria
          inner join autor a 
          on a.id_autor = l.id_autor order by livro_add_dt desc limit 8;");
          $dados = $db->resultados();
          $this->view('paginas/home', $dados);
          }//fim do método index

     public function login_cadastro(){
          $dados = [];
          $this->view('usuario/index', $dados);
          }//fim do método index

     public function config(){
          $dados = [];
          $this->view('usuario/configs', $dados);
          }//fim do método index
          
     public function livro($id){
          include '../app/libraries/Database.php';
          $db = new Database;
          $db->query("CALL pc_search_livro(".$id.");");
          $dados = $db->resultado();
          $this->view('paginas/livro', $dados);
     }// fim do método livro

     public function pesquisa(){
          // Página verifica se possui dados no input
          if(isset($_GET["entry-search"])){
               // Cria uma váriavel para armezenar temporáriamento o valor do input e instância o banco de dados
               $tex = ($_GET["entry-search"]);
               $db = new Database;
               // Verifica se a variáve $tex possui valor
               if (isset($tex)){
                    // Na instância do banco é executado a procedure
                    $db->query("CALL pc_search_livros(:tex)");
                    // Substitui o ":tex" pelo valor da variável $tex 
                    $db->bind("tex", $tex);
                    // Adiciona no array dados os resultados que retorna do banco de dados
                    $dados = $db->resultados();}}
          // Puxa a view de pesquisa e joga o dados na view
          $this->view('paginas/pesquisa', $dados);
     }// fim do método pesquisa
}//fim da classe


