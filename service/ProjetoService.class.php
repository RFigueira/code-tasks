<?php

require 'AbstractConnection.class.php';

class ProjetoService extends AbstractConnection 
{

  function __construct() 
  {
    parent::__construct();
  }

  public function save($projeto) 
  {
    $parametros =  array(':titulo' => $projeto->titulo,
                         ':descricao' => $projeto->descricao,
                         ':ativo' => $projeto->ativo);

    $sql = "INSERT INTO projeto (titulo, descricao, ativo) ".
           " VALUES (:titulo, :descricao, :ativo)";

    $conn = $this->getPDO();
    $retorno = $conn->prepare($sql);
    $retorno->execute($parametros);
    
    return $conn->lastInsertId('projeto_id_seq');
  }

  public function find($filtro=null,$orderBy=null) 
  {
      $parametros = array();
      $sql = "SELECT * FROM projeto ";
      if(isset($filtro)) 
      {
          $sql .= " WHERE titulo ilike :filtro";
          $parametros[":filtro"] = "%".$filtro."%";
      }
      if(isset($orderBy)) 
      {
          $sql .= " ORDER BY ".$orderBy;
      }
      $lista = array();
      $query = $this->getPDO()->prepare($sql);

      $query->execute($parametros);
      while ($obj = $query->fetchObject()) 
      {
         $lista[] = $obj;
      }
      return $lista;
  } 

  public function findById($id) 
  {
    $sql = "SELECT * FROM projeto WHERE id=:id";
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

  public function delete($id) 
  {
    $sql = "DELETE FROM projeto WHERE id = :id";
    $retorno = $this->getPDO()->prepare($sql);
    $retorno->bindParam(":id", $id);
    $retorno->execute();
    return $retorno->rowCount();
  }

  public function update($projeto) 
  {
    $parametros =  array(':id' => $projeto->id,
                       ':titulo' => $projeto->titulo,
                       ':descricao' => $projeto->descricao,
                       ':ativo' => $projeto->ativo);

    $sql = "UPDATE projeto SET "
            . "titulo=:titulo, "
            . "descricao=:descricao, "
            . "ativo=:ativo "
            . "WHERE id=:id";
    $retorno = $this->getPDO()->prepare($sql);
    $retorno->execute($parametros);
    return $retorno->rowCount();
  }

  public function salvar($projeto) 
  {
    if($projeto->id == null || $projeto->id == 0) 
    {
      return $this->save($projeto);
    } 
    else 
    {
      $this->update($projeto);
    }
  }
}?>
