<?php  
	
	require_once("conexao_bd.php");


	$login = $_POST["login"];
	$senha = $_POST["senha"];

	$selecao = mysqli_query($_SESSION[conexao], "SELECT * FROM cadastro WHERE login = '$login' AND senha = '$senha'");

	$row = mysqli_fetch_array($selecao);

	if ($row == ""){
		//echo "<br> login invalido</center>";
		//echo "<br><br>";
		//echo "tente novamente";
		
		//echo "javascript:window.location='selecionaTeste.php';</script>";
		//echo "<script>alert(1)</script>";
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		header('Location: login.html');
	}else{
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		echo "<script> alert(1) </script>";
		header('Location: inicio.php');
	}


?>