<?php
	
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$tel = $_POST['tel'];
	$login = $_POST['login'];
	$senha = crypt($_POST['senha']);
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$tipo = $_POST['tipo'];
	$matricula = $_POST['matricula'];
	
	//fazer esse peda�o no javascript
	if(!(is_numeric($tel)) || !(is_numeric($cpf)))
		echo 'O campo telefone ou cpf foi preenchido incorretamente, <a href="insere2.html">clique aqui para tentar novamente</a>';
	else{
		if( $nome == '' || $cpf == '' ||$tel == '' ){
			echo 'Existe(m) campo(s) obrigat�rio(s) em branco ou preenchidos incorretamente, <a href="insere2.html">clique aqui para tentar novamente</a>';
		}
	//
		else{
			$link = new mysqli('localhost','root','BananaPie','infaculdade');  //abre conexao com banco
			
			if (!$link) { //testa se a conex�o existe
				die('N�o foi poss�vel conectar: ' . mysql_error()); 
			}
			
			else{
				mysqli_set_charset($link, 'utf8'); #avisa para o banco qual a encoding  que ser� usado
				$sql = "insert into usuario (login,senha,tipo) values ('$login','$senha','$tipo')";
				
				$stmt = $link->prepare($sql);
				$ok = $stmt->execute(); #execute retorna um boolean
				
				if($ok){
					$query = $link->insert_id; //retorna o ultimo id gerado 
					
					if($query){
						$cod_usuario = $query;
						echo("$cod_usuario");
						
						if ($tipo == "aluno") {  //Insere outros dados na tabela aluno
							$sql = "insert into aluno (cod_usuario, cpf, matricula_aluno, nome_aluno) values ('$cod_usuario', '$cpf', '$matricula', '$nome')";
							echo("Add em aluno...");
						}
						else 
							$sql = "insert into professor (cod_usuario, cpf, matricula_prof, nome_prof) values ('$cod_usuario', '$cpf', '$matricula', '$nome')";
					
						$sql2 = "insert into endereco (cod_usuario, endereco, numero, bairro) values ('$query', '$endereco', '$numero', '$bairro')";
						
						$stmt = $link->prepare($sql);
						echo "$sql<br><br>";
						$ok = $stmt->execute(); //executa insers�o em aluno || professor
						$stmt = $link->prepare($sql2);
						echo "$sql2<br><br>";
						$ok2 = $stmt->execute(); //executa insers�o em endere�o
						
						if($ok && $ok2)
							echo 'Os dados foram inseridos com sucesso! <a href="cadastromasteruser.html">clique aqui para voltar</a>';
						
						/*if (crypt($_POST['senha'], $senha) == $senha) { 
							echo "Senha correta!";
						}
						*/
						
						else
							echo "N�o foi poss�vel realizar a inser��o dos dados de dentro"."<br><a href=\"cadastromasteruser.html\">clique aqui para tentar novamente</a>";
					}
				}
				else{
					echo "N�o foi poss�vel realizar a inser��o dos dados de fora"
					."<br><a href=\"cadastromasteruser.html\">clique aqui para tentar novamente</a>";
				}	
				mysqli_close($link); #fecha a conex�o com o banco de dados
			}
		}
	}
?>		