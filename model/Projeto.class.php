<?php


class Projeto 
{

  private $id;
  private $titulo;
  private $descricao;
  private $ativo;
  private $pessoas;
  private $tarefas;

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