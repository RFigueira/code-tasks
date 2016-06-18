<?php
require_once '../model/Pessoa.class.php';


class PessoaController
{

  public function savePessoaAction(){
      $pessoa = new Pessoa();
      $pessoa->__set(nome, $_POST['txt-nome']);
      $pessoa->__set(email, $_POST['txt-email']);
      $pessoa->__set(senha, $_POST['txt-senha']);
      $pessoa->__set(perfil, $_POST['txt-perfil']);

      $pessoa->save();

      $view = new View('../html/manterContato.html');
      $view->setParams(array('pessoa' => $pessoa));
      $view->showContents();
  }
}




 ?>
