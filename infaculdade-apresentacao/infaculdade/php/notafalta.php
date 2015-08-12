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
			
			$aluno = $_GET['notafalta']; //Recupera código passado do form , por meio de GET
			
			include('conecta.php'); //Conexao com BD ;
			$link = conecta(); //Recebe conexão com BD
			
			mysqli_set_charset($link, 'utf8'); 
			
			$sql = "select distinct nome_disc,nota,falta from disciplina,notafalta where cod_disciplina in
									(select cod_disciplina from turma where cod_turma in
										(select cod_turma from notafalta where cod_aluno = '$aluno')) group by nome_disc";

											
			echo $sql;
			
			$query = $link->query($sql); //executa a query 
			
	
			echo 'Notas e faltas atuais do aluno <br><br>';
			
			//Por que não faço verificação se existe? Porque o código passado por GET já é de um usuário existente
			
			while ($dados = $query->fetch_array()) {//imprimo o resultado da busca 
			
			echo 'Disciplina: ' . $dados['nome_disc'] . '<br>';
			
			echo 'Nota: ' . $dados['nota'] . '<br>';
			
			echo 'Faltas: ' . $dados['falta'] . '<br>';
			
			echo '<br><br>';
			}
					
			//Obs: readonly no campo codigo (form) -- comentar!
		?>
		
		<form method="POST" action="<?php echo "notafalta_confirma.php?aluno=$aluno" ?>" enctype="multipart/form-data">
			<fieldset>
				<center>
					<legend>Editar</legend>
				</center>	
				
				
				<br><br>
				<label for="nome">Disciplina (como escrito acima)</label>
				<input type="text" name="disciplina"/>
				<br><br>
				
				<label for="nome">Nova nota</label>
				<input type="text" name="nota"/>
				
				<br><br>
				<label for="nome">Novo nº de faltas</label>
				<input type="text" name="falta"/>
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