<?php

require_once 'AbstractConnection.class.php';

class ProjetoPessoaService extends AbstractConnection 
{

  function __construct() 
  {
    parent::__construct();
  }

  public function save($projeto) 
  {
    $parametros =  array(':id_projeto' => $projeto->id_projeto,
                         ':id_pessoa' => $projeto->id_pessoa);

    $sql = "INSERT INTO projeto_pessoa (id_projeto, id_pessoa) ".
           " VALUES (:id_projeto, :id_pessoa)";

    $conn = $this->getPDO();
    $retorno = $conn->prepare($sql);
    $retorno->execute($parametros);
    
    return $conn->lastInsertId('projeto_pessoa_id_seq');
  }

  public function findByIdProjeto($id_projeto) 
  {
    $parametros = array(':id_projeto' => $id_projeto);
    $sql = "SELECT pp.id, p.nome FROM projeto_pessoa pp ".
          " INNER JOIN pessoa p ON p.id = pp.id_pessoa ".
          " WHERE pp.id_projeto=:id_projeto ".
          " ORDER BY p.nome ASC ";

    $lista = array();
    $query = $this->getPDO()->prepare($sql);

    $query->execute($parametros);
    while ($obj = $query->fetchObject()) 
    {
       $lista[] = $obj;
    }
    return $lista;
  }

  public function delete($id) 
  {
    $sql = "DELETE FROM projeto_pessoa WHERE id = :id";
    $retorno = $this->getPDO()->prepare($sql);
    $retorno->bindParam(":id", $id);
    $retorno->execute();
    return $retorno->rowCount();
  }
}

?>