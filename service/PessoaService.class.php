<?php

require_once 'AbstractConnection.class.php';

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
    $retorno = $this->getPDO()->prepare($sql);
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
    if($obj = $retorno->fetchObject()) {
        return $obj;
    } else {
        return null;
    }
}

public function delete($id) {
    $sql = "DELETE FROM pessoa WHERE id = :id";
    $retorno = $this->getPDO()->prepare($sql);
    $retorno->bindParam(":id", $id);
    $retorno->execute();
    return $retorno->rowCount();
}



public function update($pessoa) {
  $parametros =  array(':id' => $pessoa->id,
                       ':nome' => $pessoa->nome,
                       ':email' => $pessoa->email,
                       ':senha' => $pessoa->senha,
                       ':perfil' => $pessoa->perfil,
                       ':ativo' => $pessoa->ativo);

    $sql = "UPDATE pessoa SET "
            . "nome=:nome, "
            . "email=:email, "
            . "senha=:senha,"
            . "perfil=:perfil,"
            . "ativo=:ativo "
            . "WHERE id=:id";
    $retorno = $this->getPDO()->prepare($sql);
    $retorno->execute($parametros);
    return $retorno->rowCount();
}

public function salvar($pessoa) {
  if($pessoa->id == null || $pessoa->id == 0) {
    $this->save($pessoa);
  } else {
    $this->update($pessoa);
  }
}


}?>
