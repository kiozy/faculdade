<?php
	
	$nome = $_POST['nome'];
	$ementa = $_POST['ementa'];
	
	//fazer esse pedaço no javascript
	
	include("conecta.php"); # conexão
	$link = conecta();

	mysqli_set_charset($link, 'utf8'); #avisa para o banco qual a encoding  que será usado
	$sql = "insert into disciplina (nome_disc, ementa) values ('$nome', '$ementa')";
	
	$stmt = $link->prepare($sql); #Fatal error: Call to a member function execute() on a non-object in C:\wamp\www\infaculdade\php\criamateria.php on line 16
	$ok = $stmt->execute(); #execute retorna um boolean
	
	if($ok)
		echo "Os dados foram inseridos com sucesso! Clique <a href=\"../asparadasdeeditar.html\">aqui</a> para voltar!";
						
	else
		echo "Não foi possível realizar a inserção dos dados de dentro"."<br><a href=\"../asparadasdeeditar.html\">clique aqui para tentar novamente</a>";
		

	mysqli_close($link); #fecha a conexão com o banco de dados
?>		