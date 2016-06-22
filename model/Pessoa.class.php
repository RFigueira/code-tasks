<?php


class Pessoa {

  private $id;
  private $nome;
  private $senha;
  private $email;
  private $perfil;
  private $ativo;

  public function __construct() {
  }

  public function __get($chave){
    return $this->$chave;
  }

  public function __set($chave, $valor){
      $this->$chave = $valor;
  }

}

?>
