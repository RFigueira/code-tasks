<?php


class Pessoa extends Connection
{

  private $id;
  private $nome;
  private $senha;
  private $email;
  private $perfil

  public function __construct(){
    parent::__construct();

  }

  public function __get($chave){
    return $this->$chave;
  }

  public function __set($chave, $valor){
      $this->$chave = $valor;
  }

}

?>
