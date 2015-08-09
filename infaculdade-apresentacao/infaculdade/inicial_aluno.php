<!--parada do login-->
﻿<?php  session_start();

 if(!(isset($_SESSION['login'])))
  header('Location:index.html'); //redireciona página
  $usuario = $_SESSION['login'];
 
?>
<!--end parada do login-->
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IN JUNIOR FACULDADE</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="margin-top:-20px">
            <ul class="sidebar-nav">
			<a href="index.html"><img class="logo padpad" src="images/logo2.png"></a>
				<h2>Faculdade IN</h2>
				<li> 
					<a href="index.html">Página Inicial</a>
				</li>
                <li>
                    <a href="sobre.html">Sobre</a>
                </li>
				<li>
                    <a href="#">Contato</a>
                </li>
            </ul>
			
        </div>
        <!-- /#sidebar-wrapper -->
		
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-centered">
						<legend>Bem vindo, <?php echo $usuario ?></legend>
						
						O portal aluno está de greve e em manutenção, tente novamente mais tarde.<br><br>
						<a href="php/logout.php">Sair</a>
						
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