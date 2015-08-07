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
	<article id="content">
		
		
		<?php	
			
			$editar = $_GET['editar']; //Recupera código passado do form , por meio de GET
			
			include('conecta.php'); //Conexao com BD ;
			$link = conecta(); //Recebe conexão com BD
			
			mysqli_set_charset($link, 'utf8'); 
			
			//Busca na tabela usuario
			$sql = "select * from aluno where cod_aluno='$editar'";
			
			$query = $link->query($sql); //executa a query 
			
			
			
			//Busca na tabela autenticação 
			
			$sql = "select * from usuario where cod_usuario= (select cod_usuario from aluno where cod_aluno = $editar)";
			
			$query2 = $link->query($sql); //executa a query 
			
			//---Fim da busca na tabela autenticação
			
			
			
			
			echo 'Dados atuais do usuário: <br><br>';
			
			//Por que não faço verificação se existe? Porque o código passado por GET já é de um usuário existente
			
			$dados = $query->fetch_array();  //imprimo o resultado da busca 
			
			echo 'Nome: ' . $dados['nome_aluno'] . '<br>';
			
			echo 'Matricula: ' . $dados['matricula_aluno'] . '<br>';
			
			echo 'CPF: ' . $dados['cpf'] . '<br>';
			
			$dados2 = $query2->fetch_array();  //imprimo o resultado da busca 
			
			echo 'Login: ' . $dados2['login'] . '<br>';
			
			echo 'Senha: ***** <br>';	
			
			echo '<br><br>';
			
			//Obs: readonly no campo codigo (form) -- comentar!
		?>
		
		<form method="POST" action="editar_confirma.php" enctype="multipart/form-data">
			<fieldset>
				<center>
					<legend>Editar Aluno</legend>
				</center>	
				
				
				<br><br>
				<label for="nome">Código</label>
				<input type="text" name="codigo" value="<?php echo  $dados['cod_aluno'] ;  ?>"/>
				<br><br>
				
				<label for="nome">Nome</label>
				<input type="text" name="nome" value="<?php echo  $dados['nome_aluno'] ;  ?>"/>
				
				<br><br>
				<label for="nome">CPF</label>
				<input type="text" name="cpf" value="<?php echo $dados['cpf'] ;  ?>" />
				<br><br>
				
				<label for="nome">Login</label>
				<input type="text" name="login" value="<?php echo  $dados2['login']; ?>"/>
				
				<br><br>
				
				<label for="senha">Senha</label>
				<input type="password" name="senha" value="<?php echo $dados2['senha'];  ?>"/>
				
				<br><br>
				
				<button type="submit">Salvar alterações</button>
			</fieldset>
		</form>
		
		<?php
			
			mysqli_free_result($query);
			
			mysqli_close($link);
			
			
		?>
		
	
		
		</footer>
</body>
</html>