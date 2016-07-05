<?php


class Tarefa 
{

  private $id;
  private $id_projeto;
  private $descricao;
  private $ativo;
  private $prazo;
  private $data_entrega;

  public function __construct() { }

  public function __get($chave) 
  {
    return $this->$chave;
  }

  public function __set($chave, $valor) 
  {
      $this->$chave = $valor;
  }

}

?>