<?php

require 'AbstractConnection.class.php';

class PessoaService extends AbstractConnection {

  function __construct() {
    parent::__construct();
  }

  public function save($pessoa) {
    $parametros =  array(':nome' => $pessoa->nome,
                         ':email' => $pessoa->email,
                         ':senha' => $pessoa->senha,
                         ':perfil' => $pessoa->perfil,
                         ':ativo' => $pessoa->ativo);

    $sql = "INSERT INTO pessoa (nome, email, senha, perfil, ativo) ".
           " VALUES (:nome, :email, :senha, :perfil, :ativo)";
    $retorno = $this->pdo->prepare($sql);
    $retorno->execute($parametros);

    return $retorno->rowCount();
  }

  public function find($filtro=null,$orderBy=null) {

      $parametros = array();
      $sql = "SELECT * FROM pessoa ";
      if(isset($filtro)) {
          $sql .= " WHERE nome ilike :filtro";
          $parametros[":filtro"] = "%".$filtro."%";
      }
      if(isset($orderBy)) {
          $sql .= " ORDER BY ".$orderBy;
      }
      $lista = array();
      $query = $this->getPDO()->prepare($sql);

      $query->execute($parametros);
      while ($obj = $query->fetchObject()) {
         $lista[] = $obj;
      }
      return $lista;
  }

  public function findById($id) {
    $sql = "SELECT * FROM pessoa WHERE id=:id";
    $retorno = $this->getPDO()->prepare($sql);
    $retorno->bindParam(":id", $id);
    $retorno->execute();
    if($obj = $retorno->fetchObject())
    {
        return $obj;
    }
    else
    {
        return null;
    }

}

}





 ?>
