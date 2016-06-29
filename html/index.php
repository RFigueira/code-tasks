<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="outros/startbootstrap-sb-admin-1.0.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="outros/startbootstrap-sb-admin-1.0.4/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="outros/startbootstrap-sb-admin-1.0.4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Meus estilos -->
    <link href="css/estilo.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="outros/startbootstrap-sb-admin-1.0.4/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="outros/startbootstrap-sb-admin-1.0.4/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">codePampa</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Tainã Milano <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> Meu perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-off "></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="manterPessoas.php"><i class="glyphicon glyphicon-user"></i> Pessoas</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#projetos">
                            <i class="glyphicon glyphicon-folder-open"></i> Projetos <i class="glyphicon glyphicon-chevron-down"></i>
                        </a>
                        <ul id="projetos" class="collapse">
                            <li>
                                <a href="manterProjetos.php"><i class="glyphicon glyphicon-plus"></i> Novo projeto</a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#tarefas">
                                    <i class="glyphicon glyphicon-th-list"></i> Projeto 1 <i class="glyphicon glyphicon-chevron-down"></i>
                                </a>
                                <ul id="tarefas" class="collapse nav ml-30">
                                    <li>
                                        <a href="manterTarefas.php"><i class="glyphicon glyphicon-minus "></i> Tarefa 1</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="glyphicon glyphicon-minus "></i> Tarefa 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>