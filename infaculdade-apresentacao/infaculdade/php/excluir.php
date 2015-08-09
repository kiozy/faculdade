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
				
				$excluir = $_GET['excluir'];
				
				include('conecta.php'); //Conexao com BD ;
				$link = conecta(); //Recebe conexão com BD
				
				mysqli_set_charset($link, 'utf8');
				
				
				//Busca na tabela aluno
				$sql = "select * from aluno where cod_aluno='$excluir'";
				
				$query = $link->query($sql); //executa a query 
				//---Fim da busca na tabela aluno
				
				
				//Busca na tabela usuario
				
				$sql = "select * from usuario where cod_usuario=(select cod_usuario from aluno where cod_aluno = '$excluir')";
				
				$query2 = $link->query($sql); //executa a query 
				
				//---Fim da busca na tabela usuario
				
				
				
				
				echo 'Deseja Realmente excluir esse usuário? <br><br>';
				
				$dados = $query->fetch_assoc() ; #indexação pelo nome  //mysqli_fetch_row() 
				
				echo 'Codigo: ' . $dados['cod_aluno'] . '<br>';
				
				echo 'Nome: ' . $dados['nome_aluno'] . '<br>';
				
				echo 'CPF: ' . $dados['cpf'] . '<br>';
				
				$dados2 = $query2->fetch_array();  //imprimo o resultado da busca 
				
				echo 'Login: ' . $dados2['login'] . '<br>';
				
				echo 'Senha: ***** <br>';	
				
				echo '<br><br>';
				
				echo '<a href="excluir_confirma.php?excluir='.$dados['cod_aluno'].'">Sim</a>';
				
				mysqli_free_result($query);
				
				mysqli_close($link);
				
				
			?>
			
		
</body>
</html>