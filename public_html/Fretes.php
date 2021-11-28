<?php

    require_once 'config.php' ;
    class Fretes 
    {

    public static function select(int $id)
    {
        $tabela = "fretes";
        $coluna = "codigo";
        
        $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        // conectando com o banco de dados através do PDO
        // pegando as informações do config.php (variáveis globais)

        $sql = "select * from $tabela where $coluna = :id" ;
        // comando que será executado no banco de dados para consultar

        $stmt = $connPdo->prepare($sql);
        // preparando o comando Select para ser executado

        $stmt->bindValue(':id' , $id) ;
        // configurando o parametro de busca

        $stmt->execute() ;
        // executando o comando select no banco de dados

        if ($stmt->rowCount() > 0)
        {
        // se houve retorno de dados
            //var_dump( $stmt->fetch(\PDO::FETCH_ASSOC) );

            return $stmt->fetch(\PDO::FETCH_ASSOC) ;
            // retornando os dados do banco de dados
        }else{
            // se não houve retorno de dados
            throw new \Exception("Sem registros dos fretes");
        }

    }

    public static function selectAll()
    {
        $tabela = "fretes";
        
        $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        $sql = "select * from $tabela"  ;
        $stmt = $connPdo->prepare($sql);
        $stmt->execute() ;

        if ($stmt->rowCount() > 0)
        {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC) ;
        }else{
            throw new \Exception("Sem registros");
        }

    }

    public static function insert($dados)
    {

        $tabela = "fretes";
        
        $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        $sql = "insert into $tabela (descricao,empresa,valor,peso,distancia,combustivelGasto,localColeta,dataColeta,localEntrega,dataEntrega) values (:descricao,:empresa,:valor,:peso,:distancia,:combustivelGasto,:localColeta,:dataColeta,:localEntrega,:dataEntrega)"  ;
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':descricao' , $dados['descricao']) ;
        $stmt->bindValue(':empresa' , $dados['empresa']) ;
        $stmt->bindValue(':valor' , $dados['valor']) ;
        $stmt->bindValue(':peso' , $dados['peso']) ;
        $stmt->bindValue(':distancia' , $dados['distancia']) ;
        $stmt->bindValue(':combustivelGasto' , $dados['combustivelGasto']) ;
        $stmt->bindValue(':localColeta' , $dados['localColeta']) ;
        $stmt->bindValue(':dataColeta' , $dados['dataColeta']) ;
        $stmt->bindValue(':localEntrega' , $dados['localEntrega']) ;
        $stmt->bindValue(':dataEntrega' , $dados['dataEntrega']) ;
        $stmt->execute() ;

        if ($stmt->rowCount() > 0)
        {
            return 'Dados cadastrados com sucesso!';
        }else{
            throw new \Exception("Erro ao  inserir os dados!!");
        }
    }

    public static function alterar($id, $dados)
    {

        $tabela = "fretes";
        $coluna = "codigo";
        
        $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        $sql = "update $tabela  set descricao=:descricao, empresa=:empresa, valor=:valor, peso=:peso, distancia=:distancia, combustivelGasto=:combustivelGasto, localColeta=:localColeta, dataColeta=:dataColeta, localEntrega=:localEntrega, dataEntrega=:dataEntrega where $coluna = :id"  ;
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id' , $id) ;
        $stmt->bindValue(':descricao' , $dados['descricao']) ;
        $stmt->bindValue(':empresa' , $dados['empresa']) ;
        $stmt->bindValue(':valor' , $dados['valor']) ;
        $stmt->bindValue(':peso' , $dados['peso']) ;
        $stmt->bindValue(':distancia' , $dados['distancia']) ;
        $stmt->bindValue(':combustivelGasto' , $dados['combustivelGasto']) ;
        $stmt->bindValue(':localColeta' , $dados['localColeta']) ;
        $stmt->bindValue(':dataColeta' , $dados['dataColeta']) ;
        $stmt->bindValue(':localEntrega' , $dados['localEntrega']) ;
        $stmt->bindValue(':dataEntrega' , $dados['dataEntrega']) ;
        $stmt->execute() ;

        if ($stmt->rowCount() > 0)
        {
            return 'Dados alterados com sucesso!';
        }else{
            throw new \Exception("Erro ao  alterar os dados!!");
        }
    }

    public static function delete(int $id)
    {
        $tabela = "fretes";
        $coluna = "codigo";

        $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        $sql = "delete from $tabela where $coluna = :codigo"  ;
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':codigo' , $id) ;
        $stmt->execute() ;

        if ($stmt->rowCount() > 0)
        {
            return 'Dados excluídos com sucesso!';
        }else{
            throw new \Exception("Erro ao excluir os dados!!");
        }
    }

}