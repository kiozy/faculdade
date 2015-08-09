﻿<?php  session_start();
	
	if(!(isset($_SESSION['login'])))
		header('Location:index.html'); //redirecina página 
	
?>
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
			<legend>Bem vindo, ó <?php echo $_SESSION['login'] ; ?>!</legend><br>
			<form method="post" action="cadastromasteruser.html">
			<input name="go" type="submit" value="Cadastrar novo Usuário" class="btn btn-default"/>
			</form>
			<br>
			<form method="post" action="criarmateria.html">
			<input name="go" type="submit" value="Criar Disciplina" class="btn btn-default"/>
			</form>
			<br>
			<form method="post" action="criarturma.html">
			<input name="go" type="submit" value="Criar Turma" class="btn btn-default"/>
			</form>
			<br>
			<form method="post" action="notafalta.html">
			<input name="go" type="submit" value="Editar Falta/Nota" class="btn btn-default"/>
			</form>
			<br>
			<form method="post" action="buscaaluno.html">
			<input name="go" type="submit" value="Buscar aluno" class="btn btn-default"/>
			</form>
			<br><br>
			<a href="php/logout.php">Sair</a>
		</div>
	</div>
		
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