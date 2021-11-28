<?php

    require_once 'config.php' ;
    class Usuario 
    {

    public static function select(int $id)
    {
        $tabela = "usuario";
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
            throw new \Exception("Sem registros dos usuario");
        }

    }

    public static function selectAll()
    {
        $tabela = "usuario";
        
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

        $tabela = "usuario";
        
        $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        $sql = "insert into $tabela (cpf,nome,usuario,cep,celular,telefone,cnh,categoria,marca,modelo,carroceria,placa,media,senha) values (:cpf,:nome,:usuario,:cep,:celular,:telefone,:cnh,:categoria,:marca,:modelo,:carroceria,:placa,:media,:senha)"  ;
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':cpf' , $dados['cpf']) ;
        $stmt->bindValue(':nome' , $dados['nome']) ;
        $stmt->bindValue(':usuario' , $dados['usuario']) ;
        $stmt->bindValue(':cep' , $dados['cep']) ;
        $stmt->bindValue(':celular' , $dados['celular']) ;
        $stmt->bindValue(':telefone' , $dados['telefone']) ;
        $stmt->bindValue(':cnh' , $dados['cnh']) ;
        $stmt->bindValue(':categoria' , $dados['categoria']) ;
        $stmt->bindValue(':marca' , $dados['marca']) ;
        $stmt->bindValue(':modelo' , $dados['modelo']) ;
        $stmt->bindValue(':carroceria' , $dados['carroceria']) ;
        $stmt->bindValue(':placa' , $dados['placa']) ;
        $stmt->bindValue(':media' , $dados['media']) ;
        $stmt->bindValue(':senha' , $dados['senha']) ;
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

        $tabela = "usuario";
        $coluna = "codigo";
        
        $connPdo = new \PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
        $sql = "update $tabela  set cpf=:cpf, nome=:nome, usuario=:usuario, cep=:cep, celular=:celular, telefone=:telefone, cnh=:cnh, categoria=:categoria, marca=:marca, modelo=:modelo, carroceria=:carroceria, placa=:placa, media=:media, senha=:senha where $coluna = :id"  ;
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id' , $id) ;
        $stmt->bindValue(':cpf' , $dados['cpf']) ;
        $stmt->bindValue(':nome' , $dados['nome']) ;
        $stmt->bindValue(':usuario' , $dados['usuario']) ;
        $stmt->bindValue(':cep' , $dados['cep']) ;
        $stmt->bindValue(':celular' , $dados['celular']) ;
        $stmt->bindValue(':telefone' , $dados['telefone']) ;
        $stmt->bindValue(':cnh' , $dados['cnh']) ;
        $stmt->bindValue(':categoria' , $dados['categoria']) ;
        $stmt->bindValue(':marca' , $dados['marca']) ;
        $stmt->bindValue(':modelo' , $dados['modelo']) ;
        $stmt->bindValue(':carroceria' , $dados['carroceria']) ;
        $stmt->bindValue(':placa' , $dados['placa']) ;
        $stmt->bindValue(':media' , $dados['media']) ;
        $stmt->bindValue(':senha' , $dados['senha']) ;
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
        $tabela = "usuario";
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