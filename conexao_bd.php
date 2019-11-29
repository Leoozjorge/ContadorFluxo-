<?php 
	session_start();

	//PC-Leo
	/*
	$servidor = "10.0.1.64";
	$usuario = "'interface'";
	$senha = '1234';
	$db = "contadordefluxo";
	*/

	//RASP
	/*
	$servidor = "10.0.1.104";
	$usuario = "interface";
	$senha = '1234';
	$db = "contadordefluxo";
	//*/

		


 	//
	
	$servidor = "127.0.0.1";
	$usuario = "root";
	$senha = '';
	$db = "fluxo";
	//*/

	$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

	$_SESSION['conexao'] = $conexao;

	if (mysqli_connect_errno($conexao)){
		echo "ERRO";
	}else{
		//echo "OK";
	}
	


?>