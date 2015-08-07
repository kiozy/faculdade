﻿<!DOCTYPE html>
<!--parada do login-->
﻿<?php  session_start();

 if(!(isset($_SESSION['login'])))
  header('Location:index.html'); //redireciona página 
 
?>
<!--end parada do login-->
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IN JUNIOR FACULDADE</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
			<a href="index.html"><img class="logo" src="images/logo2.png"></a>
				<li> 
					<a href="./index.html">Página Inicial</a>
				</li>
                <li>
                    <a href="sobre.html">Sobre</a>
                </li>
				
            </ul>
			
        </div>
        <!-- /#sidebar-wrapper -->
		
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-centered">
						<h1 class="logo text-center">Portal - UsuárioGod</h1> 
						
						<form method="post" action="cadastromasteruser.html">
							<input name="go" type="submit" value="Cadastrar novo Usuário" />
						</form>
						<br><br>
						<form method="post" action="criarmateria.html">
							<input name="go" type="submit" value="Criar Disciplina" />
						</form>
						<br><br>
						<form method="post" action="criarturma.html">
							<input name="go" type="submit" value="Criar Turma" />
						</form>
						<br><br>
						<form method="post" action="cadastromasteruser.html">
							<input name="go" type="submit" value="Editar Falta/Nota" />
						</form>
						<br><br>
						<form method="post" action="buscaaluno.html">
							<input name="go" type="submit" value="Buscar aluno" />
						</form>
						<br><br>
					</div>
		
                </div>
            </div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>