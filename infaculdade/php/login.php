﻿<?php	
	session_start();
	
	include("conecta.php"); # conexão 
	$link = conecta(); //Recebe conexão com BD
	
	if(isset($_POST['login'])){ $login = $_POST['login']; }
	if(isset($_POST['senha'])){ $senha = $_POST['senha']; }
	
	// echo $login;
	// echo "<br>";
	// echo $senha;
	// echo "<br>";

	
	# checa so login inicialmente porque precisa da outra senha pra descriptar
	$sql ="select * from usuario where login='$login'";

	echo $sql;
	
	$query = $link->query($sql);
	
	$senhoso = $query->fetch_array();

	if($query->num_rows > 0){
		#checador mágico de senhas
		
		if (crypt($senha, $senhoso['senha']) == $senhoso['senha']) {
			//Armazenar variaveis na Session
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			
			$dados = $query->fetch_array();
			
			$_SESSION['id'] = $dados['cod_usuario'];
			
			if ($senhoso['tipo'] == alun)
				header('Location:../homealuno.html');
			if ($senhoso['tipo'] == prof)
				header('Location:../homeprof.html');
			if ($senhoso['tipo'] == deus)
				header('Location:../asparadasdeeditar.html');
			}
		else
			echo 'Senha incorreta. <a href="../login.html">Tente novamente</a> ou contate o administrador';	
	}
		else {
			echo 'Não foi possível se conectar. <a href="../login.html">Tente novamente</a> ou contate o administrador';
		}
?>

</body>
</html>