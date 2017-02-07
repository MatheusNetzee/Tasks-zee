<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <title>Tasks-Zee</title>      
        <link rel="stylesheet" type="text/css" href="<?= URL ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?= URL ?>css/simple-sidebar.css">
        <link rel="stylesheet" type="text/css" href="<?= URL ?>css/style.css">
        <link rel="icon" type="image/gif" href="<?= URL ?>img/completed-tasks.png">        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">               
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <!-- <div class="fundo-index"><img src="img/codigo.jpg" alt=""></div> -->
    <div id="wrapper">
         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <a id="menu-toggle" class="title-white" href="#" class="glyphicon glyphicon">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a class="title-white" href="<?= URL ?>">Tasks-zee</a>
                    </div>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= URL?>">Home</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
            <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
                    <li class="sidebar-brand"></li>  
                    <li class="sidebar-brand">
                        <a href="<?= URL ?>">Start Tasks</a>
                    </li>
                    <li class="tarefa">
                        <a href="<?= URL ?>tarefas">Tarefas</a>
                    </li>
                    <li class="tag">
                        <a href="<?= URL ?>tag">Tags</a>
                    </li>
                <!--<li class="profile">
                        <a href="profile">Profile</a>
                    </li> -->
<!--                     <li class="email">
                        <a href="<?= URL ?>enviaEmail">Enviar email</a>
                    </li> -->
                </ul>
            </nav>
        </div>
        <div id="page-content-wrapper">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">                       
                        <div class="col-md-8">                        
    		              <?= $this->content(); ?>
                            <div class="clear"></div>           

                	   </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="<?= URL ?>js/jquery.js"></script>
        <script src="<?= URL ?>js/index.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?= URL ?>js/bootstrap.min.js"></script>
        <!-- Menu Toggle Script -->
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>
    </body>
</html>
