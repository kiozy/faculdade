﻿<!--parada do login-->
﻿<?php  session_start();

	if(!(isset($_SESSION['login'])))
		header('Location:index.html'); //redirecina página 
		
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
		
		<div id="page-content-wrapper">
		<fieldset>
			<center>
				<legend>Bem vindo, professor <?php print $_SESSION['login']; ?>!</legend>
			</center>	
			<br><br>
				<form method="post" action="ponto.html">
				<input name="go" type="submit" value="Cadastrar novo Ponto" class="btn btn-default"/>
				</form>
				<br>
				<form method="post" action="notafalta.html">
				<input name="go" type="submit" value="Editar notas/faltas da Turma" class="btn btn-default" />
				</form>
				<br>
				<a href="php/logout.php">Sair</a>
		</fieldset>
		</div>

</body>
</html>