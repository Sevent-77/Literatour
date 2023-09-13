<?php
class Controller{
    public function model($model){
        require_once '../app/Model/'.$model.'.php';
        return new $model;
    }//fim da function model

    public function view($view, $dados = []){
        $arquivo = ('../app/View/'.$view.'.php');
        if(file_exists($arquivo)){
        require_once $arquivo;
        }else{
            die("O arquivo não existe");
        }//fim do else
    }//fim da function view
}//fim da classe