﻿<?php  session_start();
	
	if(!(isset($_SESSION['login'])))
		header('Location:index.html'); //redirecina página 
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IN Faculdade</title>
		<meta charset="utf-8"/>
		<link 
		href="css/style.css" 
		title="style" 
		type="text/css" 
		rel="stylesheet"/>
	</head>
</head>
<body>
			<?php
			
			include('conecta.php'); //Conexao com BD ;
			$link = conecta(); //Recebe conexão com BD
			
			# seta timezone para entrar o dia certo no bd
			date_default_timezone_set('America/Sao_Paulo');
			
			$entrada = $_POST['entrada'];
			$saida = $_POST['saida'];
			
			mysqli_set_charset($link, 'utf8'); 
			
			// echo $entrada;
			// echo "<br>";
			// echo $saida;
			// echo date("Y-m-d");
			
			//Deixando as strings bonitinhas para enfiar no bd
			$inicio = date("Y-m-d")." ".$entrada.":00";
			$fim = date("Y-m-d")." ".$saida.":00";
			
			$login = $_SESSION['login'];
			
			# pegar o codigo do professor porque eu nao consegui em 1 query em tempo habil
			$sql = "SELECT cod_professor FROM professor WHERE cod_usuario = (select cod_usuario from usuario where login = '$login')";
			$query = $link->query($sql); //executa a query
			$pudim = $query->fetch_array();
			
			$login = $pudim['cod_professor'];
			
			$sql = "INSERT INTO ponto (cod_prof, hi, hf) VALUES ('$login','$inicio','$fim')";

			$query = $link->query($sql);
			$id_op = $link->insert_id; #retorna id pra fazer alguma checagem de erro e calcular o timedif
			
			if ($id_op) {
				$sql = "update infaculdade.ponto set ht=(select timediff(hf,hi)) where cod_ponto = '$id_op'";
				$query = $link->query($sql);
				
				echo 'Ponto adicionado! Clique <a href="../homeprof.php">aqui</a> para voltar!';
			}
			else
				echo 'Ocorreu um erro na adição do ponto. Clique <a href="../homeprof.php">aqui</a> para voltar.';
			
		?>
</body>
</html>