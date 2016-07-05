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

    $msg = '';
    $id_projeto = 0;
    $projetoService = new ProjetoService;
    $projeto = new Projeto();

    function get_post_action($name)
    {
        $params = func_get_args();
        
        foreach ($params as $name) {
            if (isset($_POST[$name])) {
                return $name;
            }
        }
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
            //publish article and redirect
            break;

        default:
        //no action sent
    }

    if(isset($_GET["id_projeto"])) {
        $id_projeto = $_GET["id_projeto"];
        $projeto = $projetoService->findById($id_projeto);
    }
?>

<script>
function changeVisible(divid) {
    var div = document.getElementById(divid);
    var disp = div.style.display;
    div.style.display = disp == 'none' ? 'block' : 'none';
}
</script>
        <div id="page-wrapper">
            <form action="manterProjetos.php" method="post">
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
                                    <input type="text" class="form-control">
                                </div>
                            </div>                         
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="half">
                                    <div class="mw-100">
                                        <label>Data</label>
                                        <div class="form-group">               
                                            <input type="text" class="form-control">         
                                        </div>
                                    </div>  
                                    <div class="mw-80">
                                        <label>Hora</label>
                                        <div class="form-group">               
                                            <input type="text" class="form-control">                
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
                                                        <th>Ativo</th>
                                                        <th ></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Tarefa 1</td>
                                                        <td>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input value="" type="checkbox">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i> Excluir</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Tarefa 2</td>
                                                        <td>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input value="" type="checkbox">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i> Excluir</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Tainã Milano</td>
                                                        <td>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input value="" type="checkbox">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i> Excluir</button>
                                                        </td>
                                                    </tr>
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
