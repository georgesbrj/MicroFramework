<?php

class Database {

    private $host = DB['HOST'];
    private $usuario = DB['USUARIO'];
    private $senha = DB['SENHA'];
    private $banco = DB['BANCO'];
    private $porta = DB['PORTA'];
    private $dbh;
    private $stmt;

    public function __construct()
    {
        //fonte de dados ou DNS contem as informacoes necessarias para conectar com o banco 
        $dsn =  'mysql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
        $opcoes = [
          //armazena em cache a conexao para ser reutilizada   
          PDO::ATTR_PERSISTENT => TRUE,
          //lanca uma pdo exception se ocorrer um erro 
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
         // cria a instancia do PDO    
         $this->dbh = new PDO($dsn,$this->usuario,$this->senha,$opcoes);

           
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }



    final private function __clone()
    {

    }


    public function query($sql)
    {
       $this->stmt = $this->dbh->prepare($sql);
    }


    public function bind($parametro,$valor,$tipo = null)
    {
       if(is_null($tipo)):

        switch(true):
          case is_int($valor):
            $tipo = PDO::PARAM_INT;
          break;
          case is_bool($valor):
           $tipo = PDO::PARAM_BOOL;
          break;
          case is_null($valor):
            $tipo = PDO::PARAM_NULL;
          break;
          default:
          $tipo = PDO::PARAM_STR;
       endswitch;
       endif;

       $this->stmt->bindValue($parametro,$valor,$tipo); 
    }

    public function executa()
    {
      return $this->stmt->execute();
    }

    public function resultado()
    {
        $this->executa();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function resultados()
    {
        $this->executa();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function totalLinhas()
    {
        return $this->stmt->rowCount();
    }


    public function ultimoId()
    {
        return $this->dbh->lastInsertId();
    }


}

