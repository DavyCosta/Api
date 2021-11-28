<?php

// arquivo de controle

include 'Fretes.php';
class FretesService 
{
    // funcão para consulta de dados
    public function get( $id = null)
    {
        if ($id){
        // se existe id
          return Fretes::select($id) ;
        }else{
          return Fretes::selectAll() ;
        }

    }

    // funcão para inclusão de dados
    public function post()
    {   
        // pega as informações para incluir no banco
        //$dados = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
        $dados = json_decode(file_get_contents('php://input'), true, 512);
        if($dados == null) {
          throw new \Exception("Faltou as informações para incluir");
        }
        return Fretes::insert($dados);

    }

    // funcão para alteração de dados
    public function put($id = null)
    {
        if($id == null ){
          throw new \Exception("Falta o código");
        }
        // pega as informações para atualizar no banco
        $dados = json_decode(file_get_contents('php://input'), true, 512);
        if($dados == null ){
          throw new \Exception("Faltou as informações para alterar");
        }
        return Fretes::alterar( $id, $dados);              
    }

    // funcão para exclusão de dados
    public function delete($id = null)
    {
        if($id == null ){
          throw new \Exception("Falta o código");
        }
        return Fretes::delete( $id );   
    }
}