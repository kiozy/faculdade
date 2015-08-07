﻿<?php
function conecta (){
		$link = new mysqli('localhost','root','BananaPie','infaculdade');  //abre conexao com banco
		if ($link)
			return $link;
		else 
			die('Não foi possível conectar-se ao banco de dados.');
}

?>