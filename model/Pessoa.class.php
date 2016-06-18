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

  public function save (){

    if(is_null($id)){
      $st_query = "INSERT INTO pessoa(id,nome,email,senha,perfil)
                      VALUES('$nome','$senha','$email','$perfil');";
    }
      $this->pdo->lastInsertId();
  }
}

?>
