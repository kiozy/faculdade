﻿<?php  
	session_start();
	session_destroy();  //destruir a sessão
	header('Location:../index.html'); 
?>