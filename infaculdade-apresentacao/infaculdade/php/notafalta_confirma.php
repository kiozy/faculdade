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
		$disciplina = $_POST['disciplina'];
		$nota = $_POST['nota'];
		$falta = $_POST['falta'];
		$cod_aluno = $_GET['aluno'];
		
		include('conecta.php'); //Conexao com BD ;
		$link = conecta(); //Recebe conexão com BD
		
		mysqli_set_charset($link, 'utf8');
		
		$sql = "update notafalta set nota='$nota', falta='$falta' where cod_turma=(
			select cod_turma from turma where cod_disciplina = (
			select cod_disciplina from disciplina where nome_disc='$disciplina'))
				and cod_aluno='$cod_aluno'";
		
		echo $sql;
		$query = $link->query($sql);
		
		echo 'Informações alteradas com sucesso! <a href="../asparadasdeeditar.php">clique aqui para voltar</a> ';
		
		mysqli_close($link);
		
		
	?>
	
	
</script>


</article>	

</body>
</html>