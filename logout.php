<?php  
	require_once 'conexao_bd.php';

	
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header('location:login.html');
    




?>