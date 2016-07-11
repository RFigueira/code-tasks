<?php

//require_once 'AbstractConnection.class.php';

class TarefaService extends AbstractConnection 
{

  function __construct() 
  {
    parent::__construct();
  }

  public function save($tarefa) 
  {
    $parametros =  array(':id_projeto' => $tarefa->id_projeto,
                         ':descricao' => $tarefa->descricao,
                         ':ativo' => $tarefa->ativo,
                         ':prazo' => $tarefa->prazo);

    $sql = "INSERT INTO tarefa (id_projeto, descricao, ativo, prazo) ".
           " VALUES (:id_projeto, :descricao, :ativo, :prazo)";

    $retorno = $this->getPDO()->prepare($sql);
    $retorno->execute($parametros);
    
    return $retorno->rowCount();
  }

  public function findById($id) 
  {
    $sql = "SELECT * FROM tarefa WHERE id=:id";
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

  public function findByIdProjeto($id) 
  {
    $parametros = array(':id' => $id);
    $sql = "SELECT * FROM tarefa WHERE id_projeto=:id";
    $lista = array();
      $query = $this->getPDO()->prepare($sql);

      $query->execute($parametros);
      while ($obj = $query->fetchObject()) {
         $lista[] = $obj;
      }
      return $lista;
  }

  public function delete($id) 
  {
    $sql = "DELETE FROM tarefa WHERE id = :id";
    $retorno = $this->getPDO()->prepare($sql);
    $retorno->bindParam(":id", $id);
    $retorno->execute();
    return $retorno->rowCount();
  }

  public function update($tarefa) 
  {
    $parametros =  array(':id' => $tarefa->id,
                         ':id_projeto' => $tarefa->id_projeto,
                         ':descricao' => $tarefa->descricao,
                         ':ativo' => $tarefa->ativo,
                         ':prazo' => $tarefa->prazo);

    $sql = "UPDATE tarefa SET "
            . "id_projeto=:id_projeto, "
            . "descricao=:descricao, "
            . "ativo=:ativo, "
            . "prazo=:prazo "
            . "WHERE id=:id";
    $retorno = $this->getPDO()->prepare($sql);
    $retorno->execute($parametros);
    return $retorno->rowCount();
  }

  public function salvar($tarefa) 
  {
    if($tarefa->id == null || $tarefa->id == 0) 
    {
      return $this->save($tarefa);
    } 
    else 
    {
      $this->update($tarefa);
    }
  }
}?>
