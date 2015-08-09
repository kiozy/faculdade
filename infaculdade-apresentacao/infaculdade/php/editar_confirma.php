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
		$codigo = $_POST['codigo'];
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$login = $_POST['login'];
		$senha = crypt($_POST['senha']);
		
		include('conecta.php'); //Conexao com BD ;
		$link = conecta(); //Recebe conexão com BD
		
		mysqli_set_charset($link, 'utf8');
		
		$sql = "update aluno set nome_aluno='$nome',cpf='$cpf' where cod_aluno='$codigo'";
		
		$query = $link->query($sql);
		
		$sql = "update usuario set login='$login', senha='$senha' where cod_usuario=(select cod_usuario from aluno where cod_aluno='$codigo')";
		
		$query = $link->query($sql);
		
		echo 'Aluno '.$nome.' alterado com sucesso! <a href="../asparadasdeeditar.php">clique aqui para voltar</a> ';
		
		mysqli_close($link);
		
		
	?>
	
	
</script>


</article>	

</body>
</html>