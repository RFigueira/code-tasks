<?php
 include 'index.php';
?>
        <div id="page-wrapper">
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
                                <input type="text" class="form-control" disabled="true">                                      
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <label>Titulo</label>
                            <div class="form-group">                                          
                                <input type="text" class="form-control">                                      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-8">
                            <label>Descrição</label>
                            <div class="form-group">                                          
                                <textarea class="form-control" rows="3" > </textarea>                                  
                            </div>
                        </div>
                    </div>
                </div>                
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
                                        <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Inserir</button>
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
                                <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Inserir</button>
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
                <div class="row ">
                    <div class="col-lg-12 mt-15">
                        <div class="pull-left">
                            <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Gerenciar tarefas</button>
                        </div>
                        <div class="pull-right">
                            <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</button>
                            <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="outros/startbootstrap-sb-admin-1.0.4/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="outros/startbootstrap-sb-admin-1.0.4/js/bootstrap.min.js"></script>

</body>

</html>
