<?php
    include 'index.php';

    setlocale(LC_CTYPE, 'ptb', 'BR', 'pt_BR', 'Portuguese_Brazil.1252');
    date_default_timezone_set('America/Sao_Paulo');
    ini_set('default_charset', 'UTF-8');
    ini_set('display_errors', true);
    error_reporting(E_ERROR | E_WARNING);
    error_reporting(E_ALL);

    require_once '../service/ProjetoService.class.php';
    require_once '../model/Projeto.class.php';
    require_once '../service/TarefaService.class.php';
    require_once '../model/Tarefa.class.php';

    $msg = '';
    $id_projeto = 0;
    $projetoService = new ProjetoService;
    $projeto = new Projeto;
    $tarefaService = new TarefaService;
    $tarefa = new Tarefa;
    $tarefas = array();

    function get_post_action($name)
    {
        $params = func_get_args();
        
        foreach ($params as $name) {
            if (isset($_POST[$name])) {
                return $name;
            }
        }
    }

    if(isset($_GET["id_projeto"])) 
    {
        $id_projeto = $_GET["id_projeto"];
    }

    if(isset($_GET["id_tarefa"])) 
    {
        $tarefaService->delete($_GET["id_tarefa"]);
    }

    switch (get_post_action('salvar', 'inserir_pessoas', 'inserir_tarefas')) 
    {
        case 'salvar':
            
            if(isset($_POST["txt-id"]))
            {
                $projeto->id = $_POST["txt-id"];
            }

            if(isset($_POST["txt-titulo"])) 
            {               
               $projeto->titulo = $_POST["txt-titulo"];              
            }

            if(isset($_POST["txt-descricao-proj"]))
            {
               $projeto->descricao = $_POST["txt-descricao-proj"];
            }

            $projeto->ativo = 't';
            $id_projeto = $projetoService->salvar($projeto);
            //$projeto->id = $id_projeto

            break;

        case 'inserir_pessoas':
            //save article and redirect
            break;

        case 'inserir_tarefas':
            if(isset($_GET["id_tarefa"]))
            {
                $tarefa->id = $_GET["id_tarefa"];
            }

            if(isset($_POST["txt-idh"]))
            {
                $tarefa->id_projeto = $_POST["txt-idh"];
            }

            if(isset($_POST["txt-descricao-tarefa"]))
            {
                $tarefa->descricao = $_POST["txt-descricao-tarefa"];
            }

            $data = '';
            $hora = '';
            if(isset($_POST["txt-prazo"])) 
            {               
               $data = $_POST["txt-prazo"];              
            }

            if(isset($_POST["txt-hora-limite"]))
            {
               $hora = $_POST["txt-hora-limite"];
            }

            $tarefa->prazo = $data.' '.$hora;
            $tarefa->ativo = 't';
            $tarefaService->salvar($tarefa);
            break;

        default:
        //no action sent
    }

    if($id_projeto > 0) 
    {
        $projeto = $projetoService->findById($id_projeto);
        $tarefas = $tarefaService->findByIdProjeto($id_projeto);
    }
?>

        <div id="page-wrapper">
            <form action="manterProjetos.php?id_projeto=<?php echo $id_projeto?>" method="post">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Cadastrar projeto
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-1">
                            <label>Código</label>
                            <div class="form-group">                                          
                                <input type="hidden" class="form-control"  name="txt-idh" value="<?php echo $projeto->id?>">    
                                 <input type="text" class="form-control" disabled="true" name="txt-id" value="<?php echo $projeto->id?>">                                      
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <label>Titulo</label>
                            <div class="form-group">                                          
                                <input type="text" class="form-control" name="txt-titulo" value="<?php echo $projeto->titulo?>">                                      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-8">
                            <label>Descrição</label>
                            <div class="form-group">                                          
                                <textarea class="form-control" rows="3" name="txt-descricao-proj"><?php echo $projeto->descricao?></textarea>                                  
                            </div>
                        </div>
                    </div>
                </div>  
                <?php if($id_projeto > 0) {?>
                <div class="col-lg-12 fundo-cinza">
                    <div class="col-lg-7">
                    <h3>Tarefas</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Descrição da tarefa</label>
                                <div class="form-group">                                          
                                    <input type="text" class="form-control" name="txt-descricao-tarefa">
                                </div>
                            </div>                         
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="half">
                                    <div class="mw-100">
                                        <label>Prazo</label>
                                        <div class="form-group">               
                                            <input type="text" class="form-control" name="txt-prazo" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" maxlength="10">         
                                        </div>
                                    </div>  
                                    <div class="mw-80">
                                        <label>às</label>
                                        <div class="form-group">               
                                            <input type="text" class="form-control" name="txt-hora-limite" pattern="[0-9]{2}:[0-9]{2}$"  maxlength="5">                
                                        </div>
                                    </div>
                                </div>
                                <div class="half">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary" name="inserir_tarefas"><i class="glyphicon glyphicon-ok"></i> Inserir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Descrição</th>
                                                        <th>Prazo</th>
                                                        <th>Ativo</th>
                                                        <th ></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($tarefas as $obj) { ?>
                                                    <tr>
                                                        <td><?php echo $obj->id?></td>
                                                        <td><?php echo $obj->descricao?></td>
                                                        <td><?php echo $obj->prazo?></td>
                                                        <td><?php echo $obj->ativo == 'TRUE' ? 'SIM' : 'NÃO'?></td>
                                                        <td>
                                                            <a href="manterProjetos.php?id_projeto=<?php echo $id_projeto?>?id_tarefa=<?php echo $obj->id?>" type="button" class="btn btn-danger">
                                                                <i class="glyphicon glyphicon-trash"></i> 
                                                                Excluir
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">    
                    <h3>Pessoas envolvidas</h3> 
                        <div class="row">
                            <div class="col-lg-9">
                                <label>Pessoas</label>
                                <div class="form-group">                                          
                                    <input type="text" class="form-control">
                                </div> 
                            </div>              
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-primary" name="inserir_pessoas" ><i class="glyphicon glyphicon-ok"></i> Inserir</button>
                            </div>                            
                        </div> 
                        <div class="row">
                            <div class="col-lg-12">
                                <span class="label label-primary">Tainã Milano</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Rodrigo Freitas</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Patric Dutra</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Marcelo Siedler</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Tainã Milano</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Rodrigo Freitas</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Patric Dutra</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Marcelo Siedler</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Tainã Milano</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Rodrigo Freitas</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Patric Dutra</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                                <span class="label label-primary">Marcelo Siedler</span><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                            </div>                            
                        </div>                  
                    </div>
                </div>
                <?php  } ?>
                <div class="row ">
                    <div class="col-lg-12 mt-15">
                    <?php if($id_projeto > 0) {?>
                        <div class="pull-left">
                            <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Gerenciar tarefas</button>
                        </div>
                        <?php  } ?>
                        <div class="pull-right">
                        <?php if($id_projeto > 0) {?>
                            <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</button><?php  } ?>
                            <button type="submit" class="btn btn-primary" name="salvar"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="outros/startbootstrap-sb-admin-1.0.4/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="outros/startbootstrap-sb-admin-1.0.4/js/bootstrap.min.js"></script>

</body>

</html>
