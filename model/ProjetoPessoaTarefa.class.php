<?php


class ProjetoPessoaTarefa 
{

  private $id;
  private $id_projeto_pessoa;
  private $id_tarefa;
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