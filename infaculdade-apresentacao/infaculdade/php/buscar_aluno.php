<!--parada do login-->
﻿<?php  session_start();

	if(!(isset($_SESSION['login'])))
		header('Location:index.html'); //redirecina página 
	
?>
<!--end parada do login-->
<html>
	<head>
		<title>IN Faculdade</title>
		<meta charset="utf-8"/>
		<link href="css/style.css" 	title="style" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<article id="content">
		
		<?php	
		$usuario = $_SESSION['login'];
		
		$parametro = $_POST['parametro'];
		$busca = $_POST['busca'];
		#echo $busca;
		
		if($parametro == ''){
			echo 'Existe campo obrigatório em branco, <a href="../buscar_aluno.html">clique aqui para tentar novamente</a>';
		}
		
		else{
			
			#include("conexao.php"); # conexão 
			$link = new mysqli('localhost','root','BananaPie','infaculdade');
			
			if (mysqli_connect_errno()){ //Retorna o código de erro da ultima chamada a função connect
					die('Não foi possível conectar-se ao banco de dados.');
			}
			
			else{
				mysqli_set_charset($link, 'utf8'); //Define o conjunto de caracteres padrão a ser usado quando o envio de dados do servidor para o banco de dados.
				
				if($parametro == 'Disciplinas Matriculadas' && $busca == ''){
					$sql = "select distinct nome_disc,ementa from disciplina where cod_disciplina in
									(select cod_disciplina from turma where cod_turma in
										(select cod_turma from notafalta where cod_aluno = 
											(select cod_aluno from aluno where cod_usuario = 
											  (select cod_usuario from usuario where login = '$usuario'))))";
					#echo $sql;
					
					$query = $link->query($sql);

					if($query){
						echo 'Registros encontrados: '.$query->num_rows;
						
						if($query->num_rows > 0){
						
							echo '<br><br>Listagem de matérias: <br><br>';
							
							while ($dados = $query->fetch_array()) { # retorna uma matriz, indexação pelo nome ou indice
								//fetch_assoc : indice associativo
								//fetch_row : indice numerico							
								echo 'Disciplina: ' .$dados['nome_disc']  . '<br>';
								echo 'Ementa: ' . $dados['ementa'] . '<br>';
								echo '<br><br>';

							}
					
						} else { 
							echo 'Não foi possível realizar a busca dos dados. <a href="javascript:window.history.go(-1)">Clique aqui para tentar novamente</a>';
						}
					} 
				} 
				
				elseif ($parametro == 'Disciplinas Matriculadas' && (!($busca== ''))){
					$sql = "select distinct nome_disc,ementa from disciplina where nome_disc='$busca' and cod_disciplina in
									(select cod_disciplina from turma where cod_turma in
										(select cod_turma from notafalta where cod_aluno = 
											(select cod_aluno from aluno where cod_usuario = 
											  (select cod_usuario from usuario where login = '$usuario'))))";
					#echo $sql;
									
					$query = $link->query($sql);

					if($query){
						echo 'Registros encontrados: '.$query->num_rows;
						
						if($query->num_rows > 0){
						
							echo '<br><br>Listagem de matérias: <br><br>';
							
							while ($dados = $query->fetch_array()) { # retorna uma matriz, indexação pelo nome ou indice
								//fetch_assoc : indice associativo
								//fetch_row : indice numerico							
								echo 'Disciplina: ' .$dados['nome_disc']  . '<br>';
								echo 'Ementa: ' . $dados['ementa'] . '<br>';
								echo '<br><br>';

							}
					
						} else { 
						echo 'Não foi possível realizar a busca dos dados. <a href="javascript:window.history.go(-1)">Clique aqui para tentar novamente</a>';
						}
					} 
				} 
				
				elseif ($parametro == 'Avaliação nas disciplinas' && ($busca == '')){
					$sql = "select distinct nome_disc,nota from disciplina,notafalta where cod_disciplina in
									(select cod_disciplina from turma where cod_turma in
										(select cod_turma from notafalta where cod_aluno = 
											(select cod_aluno from aluno where cod_usuario = 
											  (select cod_usuario from usuario where login = '$usuario')))) group by nome_disc";
					#echo $sql;
					
					$query = $link->query($sql);

					if($query){
						echo 'Registros encontrados: '.$query->num_rows;
						
						if($query->num_rows > 0){
						
							echo '<br><br>Listagem de matérias: <br><br>';
							
							while ($dados = $query->fetch_array()) { # retorna uma matriz, indexação pelo nome ou indice
								//fetch_assoc : indice associativo
								//fetch_row : indice numerico							
								echo 'Disciplina: ' .$dados['nome_disc']  . '<br>';
								echo 'Nota: ' . $dados['nota'] . '<br>';
								echo '<br><br>';

							}
					
						} else { 
							echo 'Não foi possível realizar a busca dos dados. <a href="javascript:window.history.go(-1)">Clique aqui para tentar novamente</a>';
							}
					} 
					
				}
				elseif ($parametro == 'Avaliação nas disciplinas' && (!($busca == ''))){
					$sql = "select distinct nome_disc,nota from notafalta,disciplina where nome_disc='$busca' and cod_disciplina in 
							(select cod_disciplina from turma where cod_turma in
									(select cod_turma from notafalta where cod_aluno = 
										(select cod_aluno from aluno where cod_usuario = 
										  (select cod_usuario from usuario where login = '$usuario')))) group by nome_disc";
					#echo $sql;
					
					$query = $link->query($sql);

					if($query){
						echo 'Registros encontrados: '.$query->num_rows;
						
						if($query->num_rows > 0){
						
							echo '<br><br>Listagem de matérias: <br><br>';
							
							while ($dados = $query->fetch_array()) { # retorna uma matriz, indexação pelo nome ou indice
								//fetch_assoc : indice associativo
								//fetch_row : indice numerico							
								echo 'Disciplina: ' .$dados['nome_disc']  . '<br>';
								echo 'Nota: ' . $dados['nota'] . '<br>';
								echo '<br><br>';

							}
					
						} else { 
							echo 'Não foi possível realizar a busca dos dados. <a href="javascript:window.history.go(-1)">Clique aqui para tentar novamente</a>';
						}	
					} 				  
										  
				}
				elseif ($parametro == 'Notas e faltas' && ($busca == '')){
					$sql = "select distinct nome_disc,nota,falta from disciplina, notafalta where cod_disciplina in 
							(select cod_disciplina from turma where cod_turma in
									(select cod_turma from notafalta where cod_aluno = 
										(select cod_aluno from aluno where cod_usuario = 
										  (select cod_usuario from usuario where login = '$usuario')))) group by nome_disc";
					#echo $sql;
					
					$query = $link->query($sql);

					if($query){
						echo 'Registros encontrados: '.$query->num_rows;
						
						if($query->num_rows > 0){
						
							echo '<br><br>Listagem de matérias: <br><br>';
							
							while ($dados = $query->fetch_array()) { # retorna uma matriz, indexação pelo nome ou indice
								//fetch_assoc : indice associativo
								//fetch_row : indice numerico							
								echo 'Disciplina: ' .$dados['nome_disc']  . '<br>';
								echo 'Nota: ' . $dados['nota'] . '<br>';
								echo 'Faltas: ' . $dados['falta'] . '<br>';
								echo '<br><br>';

							}
					
						} else { 
							echo 'Não foi possível realizar a busca dos dados. <a href="javascript:window.history.go(-1)">Clique aqui para tentar novamente</a>';
						}
					}					  
				}
				elseif ($parametro == 'Notas e faltas' && (!($busca == ''))){
					$sql = "select distinct nome_disc,nota,falta from disciplina, notafalta where nome_disc='$busca' and cod_disciplina in 
							(select cod_disciplina from turma where cod_turma in
									(select cod_turma from notafalta where cod_aluno = 
										(select cod_aluno from aluno where cod_usuario = 
										  (select cod_usuario from usuario where login = '$usuario')))) group by nome_disc";
										  
					#echo $sql;
					
					$query = $link->query($sql);

					if($query){
						echo 'Registros encontrados: '.$query->num_rows;
						
						if($query->num_rows > 0){
						
							echo '<br><br>Listagem de matérias: <br><br>';
							
							while ($dados = $query->fetch_array()) { # retorna uma matriz, indexação pelo nome ou indice
								//fetch_assoc : indice associativo
								//fetch_row : indice numerico							
								echo 'Disciplina: ' .$dados['nome_disc']  . '<br>';
								echo 'Nota: ' . $dados['nota'] . '<br>';
								echo 'Faltas: ' . $dados['falta'] . '<br>';
								echo '<br><br>';

							}
					
						} else { 
							echo 'Não foi possível realizar a busca dos dados. <a href="javascript:window.history.go(-1)">Clique aqui para tentar novamente</a>';
						}
					} 					  
				}
				
				mysqli_free_result($query); //Libera a memória associada ao resultado
		
				mysqli_close($link); //fecha conexao com BD
				
				echo 'Clique <a href="../inicial_aluno.php">aqui</a> para voltar'
						
				}
				
				
			}
		?>
		
		</article>	
	
	</body>
</html>