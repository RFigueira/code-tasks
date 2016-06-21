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
                         ':perfil' => $pessoa->perfil);

    $sql = "INSERT INTO pessoa (nome, email, senha, perfil) ".
           " VALUES (:nome, :email, :senha, :perfil)";
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
      $query = $this->pdo->prepare($sql);

      $query->execute($parametros);
      while ($obj = $query->fetchObject()) {
         $lista[] = $obj;
      }
      return $lista;
  }

}





 ?>
