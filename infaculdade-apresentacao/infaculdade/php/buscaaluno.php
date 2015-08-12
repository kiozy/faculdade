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
		
		$parametro = $_POST['parametro'];
		$busca = $_POST['busca'];
		
		if($parametro == ''){
			echo 'Existe campo obrigatório em branco, <a href="busca.html">clique aqui para tentar novamente</a>';
		}
		
		else{
			
			include("conecta.php"); # conexão
			$link = conecta();
			
	
				mysqli_set_charset($link, 'utf8'); //Define o conjunto de caracteres padrão a ser usado quando o envio de dados do servidor para o banco de dados.
				
				if($busca == ''){
					$sql = "select * from aluno";
				}
				else{
					$sql = "select * from aluno where $parametro='$busca'";
				}
				
				$query = $link->query($sql);
				
				if($query){
					
					echo 'Registros encontrados: '.$query->num_rows;
					
					if($query->num_rows > 0){
					
						echo '<br><br>Listagem de alunos: <br><br>';
						
						while ($dados = $query->fetch_array()) { # retorna uma matriz, indexação pelo nome ou indice
							//fetch_assoc : indice associativo
							//fetch_row : indice numerico
											
							echo 'Nome: ' . $dados['nome_aluno'] . '<br>';
												
							echo 'CPF: ' . $dados['cpf'] . '<br>';
							
							echo 'Matrícula: ' . $dados['matricula_aluno'] . '<br>';
				
							echo '<a href="editar.php?editar='.$dados['cod_aluno'].'">Editar</a> &nbsp;&nbsp;';
							
							echo '<a href="excluir.php?excluir='.$dados['cod_aluno'].'">Excluir</a> &nbsp;&nbsp;';
							
							echo '<a href="notafalta.php?notafalta='.$dados['cod_aluno'].'">Editar notas e faltas</a>';
							
							echo '<br><br>';
							

						}
						echo '<a href="../asparadasdeeditar.php">Voltar</a>';
						
						mysqli_free_result($query); //Libera a memória associada ao resultado
				
						mysqli_close($link); //fecha conexao com BD
					}
					
				}
				else{ ?>
					Não foi possível realizar a busca dos dados. <a href="javascript:window.history.go(-1)">Clique aqui para tentar novamente</a>
				<?php }
				
			}
		
	?>

	</article>	
	
</body>
</html>