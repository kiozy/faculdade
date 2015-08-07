﻿<!DOCTYPE html>
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
<body>	(select cod_usuario from aluno where cod_aluno = '$excluir')

			
			
			<?php	
				
				$excluir = $_GET['excluir'];
				include('conecta.php'); //Conexao com BD ;
				$link = conecta(); //Recebe conexão com BD
				
				mysqli_set_charset($link, 'utf8');
				
				$sql = "set foreign_key_checks=0";
				$query = $link->prepare($sql);
				$query->execute();
				
				$sql = "delete from usuario where cod_usuario='$excluir'";
				echo $sql;
				
				$query = $link->prepare($sql);
				
				if($query->execute()){
					echo "Entrei no outro delete";
					$sql = "delete from aluno where cod_usuario='$excluir'";
					
					$query = $link->prepare($sql);
					
					if($query->execute())
						echo 'Usuário excluido com sucesso! Quantidade de registros excluidos: '. $query->affected_rows;
					else
						echo 'Deu ruim...';
				}
				else {
					echo 'Não executei o de fora porque sou mala';
					}
				
				$sql = "set foreign_key_checks=1";
				$query = $link->prepare($sql);
				$query->execute();
				
				mysqli_close($link);
				
			?>
			
</body>
</html>