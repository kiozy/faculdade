<html>
	<head>
		<title>IN Faculdade</title>
		<meta charset="utf-8"/>
		<link href="css/style.css" 	title="style" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<article id="content">
		
		<?php	
		
		$parametro = $_POST['parametro'];
		$busca = $_POST['busca'];
		
		if($parametro == ''){
			echo 'Existe campo obrigatório em branco, <a href="buscar_aluno.html">clique aqui para tentar novamente</a>';
		}
		
		else{
			
			#include("conexao.php"); # conexão 
			$link = new mysqli('localhost','root','','infaculdade');
			
			if (mysqli_connect_errno()){ //Retorna o código de erro da ultima chamada a função connect
					die('Não foi possível conectar-se ao banco de dados.');
			}
			
			else{
				mysqli_set_charset($link, 'utf8'); //Define o conjunto de caracteres padrão a ser usado quando o envio de dados do servidor para o banco de dados.
				
				if($parametro == 'disciplinasMatriculadas' && $busca == ''){
					$sql = "select nome_disc,ementa from disciplina where cod_disciplina =
									(select cod_disciplina from turma where cod_turma=
										(select cod_turma from aluno where matricula_aluno = MATRICULA DO ALUNO QUE LOGOU))";
				}
				elseif ($parametro == 'disciplinasMatriculadas' && (!($busca=''))){
					$sql = "select nome_disc,ementa from disciplina where nome_disc='$busca' and cod_disciplina =
									(select cod_disciplina from turma where cod_turma=
										(select cod_turma from aluno where matricula_aluno = MATRICULA DO ALUNO QUE LOGOU))";
				}
				elseif ($parametro == 'avaliacao' && (busca == '')){
					$sql = "select nota,nome_disc from notafalta,disciplina where cod_disciplina = 
							(select cod_disciplina where cod_disciplina =
									(select cod_disciplina from turma where cod_turma=
										(select cod_turma from aluno where matricula_aluno = MATRICULA DO ALUNO QUE LOGOU)))";
				}
				elseif ($parametro == 'avaliacao' && (!(busca == ''))){
					$sql = "select nome_disc,nota from notafalta,disciplina where nome_disc='$busca' and cod_disciplina = 
							(select cod_disciplina where cod_disciplina =
									(select cod_disciplina from turma where cod_turma=
										(select cod_turma from aluno where matricula_aluno = MATRICULA DO ALUNO QUE LOGOU)))";
				}
				elseif ($parametro == 'notasEfaltas' && (busca == '')){
					$sql = "select nome_disc,nota,falta from disciplina, notafalta where cod_disciplina = 
							(select cod_disciplina where cod_disciplina =
									(select cod_disciplina from turma where cod_turma=
										(select cod_turma from aluno where matricula_aluno = MATRICULA DO ALUNO QUE LOGOU)))";
				}
				elseif ($parametro == 'notasEfaltas' && (!(busca == ''))){
					$sql = "select nome_disc,nota,falta from disciplina, notafalta where nome_disc='$busca' and cod_disciplina = 
							(select cod_disciplina where cod_disciplina =
									(select cod_disciplina from turma where cod_turma=
										(select cod_turma from aluno where matricula_aluno = MATRICULA DO ALUNO QUE LOGOU)))";
				}
				
				$query = $link->query($sql);

				if($query){
					
					echo 'Registros encontrados: '.$query->num_rows;
					
					if($query->num_rows > 0){
					
						echo '<br><br>Listagem de usuários: <br><br>';
						
						while ($dados = $query->fetch_array()) { # retorna uma matriz, indexação pelo nome ou indice
							//fetch_assoc : indice associativo
							//fetch_row : indice numerico
							
																				
							echo 'Disciplina: ' .$dados['nome_disc']  . '<br>';
							
							echo 'Ementa: ' . $dados['ementa'] . '<br>';
							
							echo 'Nota: '. $dados['nota'].'<br>';
							
							echo 'Falta: '.$dados['falta'].'<br>';
												
												
							echo '<br><br>';

						}
						
						mysqli_free_result($query); //Libera a memória associada ao resultado
				
						mysqli_close($link); //fecha conexao com BD
					}
					
				}
				else{ ?>
					Não foi possível realizar a busca dos dados. <a href="javascript:window.history.go(-1)">Clique aqui para tentar novamente</a>
				<?php }
				
			}
		}
		?>
		
		</article>	
	
	</body>
</html>