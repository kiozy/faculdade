<?php
	
	$nome = $_POST['nome'];
	$professor = $_POST['professor'];
	
	include("conecta.php"); # conexão
	$link = conecta();

	mysqli_set_charset($link, 'utf8'); #avisa para o banco qual a encoding  que será usado
	
	# retorna cod_professor para criar a turma
	$teste = "select cod_professor from professor where nome_prof = '$professor'";
	$dados = $link->query($teste);
	$resultado = $dados->fetch_array();
	
	#retorna cod_disciplina
	$teste = "select cod_disciplina from disciplina where nome_disc = '$nome'";
	$dados = $link->query($teste);
	$resultado2 = $dados->fetch_array();
	
	#cria turma com os dados retornados
	$sql = "insert into turma (cod_professor, cod_disciplina, num_alunos) values ('$resultado[cod_professor]','$resultado2[cod_disciplina]',0)";
	$stmt = $link->prepare($sql); 
	$ok = $stmt->execute(); #execute retorna um boolean
	
	if($ok)
		echo "Os dados foram inseridos com sucesso! Clique <a href=\"../asparadasdeeditar.php\">aqui</a> para voltar!";
						
	else
		echo "Não foi possível realizar a inserção dos dados de dentro"."<br><a href=\"../asparadasdeeditar.php\">clique aqui para tentar novamente</a>";
		
	
	mysqli_close($link); #fecha a conexão com o banco de dados
?>		