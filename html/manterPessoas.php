<?php
    include 'index.php';

    setlocale(LC_CTYPE, 'ptb', 'BR', 'pt_BR', 'Portuguese_Brazil.1252');
    date_default_timezone_set('America/Sao_Paulo');
    ini_set('default_charset', 'UTF-8');
    ini_set('display_errors', true);
    error_reporting(E_ERROR | E_WARNING);
    error_reporting(E_ALL);

    require_once '../service/PessoaService.class.php';
    require_once '../model/Pessoa.class.php';

    $e='';
    $msg = '';
    $teste ='';
    $pessoaService = new PessoaService;
    $pessoa = new Pessoa();
    if(isset($_GET["id"])) {
        if(isset($_GET["nome"])) {
            $pessoa = $pessoaService->findById($_GET["id"]);
            $e = '$("#myModal").modal("show");';

        }
        else {
            $pessoaService->delete($_GET["id"]);
            //header("location: manterPessoas.php");
        }
    }
    else {
        if(isset($_POST["txt-nome"])  ||
         isset($_POST["txt-senha"]) ||
         isset($_POST["txt-email"]) ||
         isset($_POST["txt-senha-confirmacao"])) {

            $pessoa->id = $_POST["txt-id"];
            $pessoa->nome = $_POST["txt-nome"];
            $pessoa->senha = $_POST["txt-senha"];
            $pessoa->email = $_POST["txt-email"];
            $pessoa->perfil = 'ALUNO';
            $pessoa->ativo = 't';

            if($msg == null){
              $pessoaService->salvar($pessoa);

            }
        }
    }
    
    $pessoas = $pessoaService->find(null, null);

?>


        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Listagem de pessoas
                        </h1>
                    </div>
                </div>
                <?php if($msg == 10) {?>
                    <div class="bs-callout bs-callout-info" id="callout-modal-youtube">
                      <h3>Sucesso!</h3>
                    </div>
                <?php  } ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <button onclick="newPessoa();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-check"></i> Novo cadastro</button>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-offset-6">
                              <div class="form-group input-group">
                                  <input type="text" class="form-control">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Ativo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($pessoas as $obj) { ?>
                                  <tr>
                                        <td><?php echo $obj->id?></td>
                                        <td><?php echo $obj->nome?></td>
                                        <td><?php echo $obj->email?></td>
                                        <td><?php echo 'Sim'?></td>
                                        <td>
                                            <div class="pull-right">
                                                <a href="manterPessoas.php?id=<?php echo $obj->id?>&nome=<?php echo $obj->nome?>"
                                                  type="button" class="btn btn-success">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                    Editar
                                                </a>
                                                <a href="manterPessoas.php?id=<?php echo $obj->id?>" type="button" class="btn btn-danger">
                                                  <i class="glyphicon glyphicon-trash"></i>
                                                  Excluir
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                    <div class="row">
                        <div class="col-lg-offset-8 ">
                          <ul class="pagination">
                              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button active"><a href="#">1</a></li>
                              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button "><a href="#">2</a></li>
                              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button "><a href="#">3</a></li><li tabindex="0" aria-controls="dataTables-example" class="paginate_button "><a href="#">4</a></li>
                              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button "><a href="#">5</a></li>
                              <li tabindex="0" aria-controls="dataTables-example" class="paginate_button "><a href="#">6</a></li>
                              <li id="dataTables-example_next" tabindex="0" aria-controls="dataTables-example" class="paginate_button next"><a href="#">Next</a></li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Modal -->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"> Cadastro</h4>
                        </div>
                        <form id="form" action="manterPessoas.php" method="post">
                          <input id="txt-id" type="hidden" name="txt-id" value="<?php echo $pessoa->id ?>" />
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Nome</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-user"></i>
                                            </button>
                                        </span>
                                        <input id="txt-nome" type="text" class="form-control" name="txt-nome" value="<?php echo $pessoa->nome?>" >
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-envelope"></i>
                                            </button>
                                        </span>
                                        <input id="txt-email" type="text" class="form-control" name="txt-email" value="<?php echo $pessoa->email?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Senha</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-asterisk"></i>
                                            </button>
                                        </span>
                                        <input id="txt-senha" type="password" class="form-control" name="txt-senha" value="<?php echo $pessoa->senha?>" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Repetir senha</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-asterisk"></i>
                                            </button>
                                        </span>
                                        <input id="txt-senha-confirmacao" type="password" class="form-control" name="txt-senha-confirmacao" >
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-primary" name="salvar" type="submit">
                                <i class="glyphicon glyphicon-ok"></i>
                                Salvar
                            </button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
</body>
<script><?php echo $e ?>;</script>
<script>
  function newPessoa() {
    document.getElementById("txt-nome").value ='';
    document.getElementById("txt-id").value ='';
    document.getElementById("txt-email").value ='';
    document.getElementById("txt-senha").value ='';
    document.getElementById("txt-senha-confirmacao").value ='';
  };
</script>
</html>
