<!DOCTYPE html>
<html>
<head>
  <meta http-equiv='refresh' content='5'>
	<title></title>
	<script type="text/javascript" src='jquery-3.4.1.min.js'></script>
	<script type="text/javascript" src='javascript.js'></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
		require_once("conexao_bd.php");
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header('location:login.html');
    }
	?>
</head>
<header>
  
</header>
<body>
	<div id="barraNavegacao">
	<ul id="navbar">
  		<li><a class="active" href="inicio.php">Inicio</a></li>
  		<li><a href="selecionaTeste.php">Relatórios</a></li>
  		<li><a href="sobre.php">Sobre</a></li>
  		<li id="sair"><a href="logout.php">Sair</a></li>
	</ul>
	</div>
 

	<main id="pagina">
    <center>
      <h1>Usuários na Biblioteca:</h1><br><br>
      <?php 
         $contagem = mysqli_query($_SESSION['conexao'], "SELECT (SELECT count(registro) as contagem from entrada where substring(registro, 1, 10) = (select substring(now(),1,10))) - (SELECT count(registro) as contagem from saida where substring(registro, 1, 10) = (select substring(now(),1,10))) as cont");
        //print_r ($contagem);
        $resu = array();
          while ($fetch = mysqli_fetch_array($contagem)) {
    
              echo "\n";
              array_push($resu, $fetch["cont"]);
              
          }
          echo "<h1>".$resu[0]."</h1>";
    //print_r($hora);

    

  
          

         ?>
    </center>
    <left>
      
       <h1> Usuários na última hora: </h1><br><br>
       
      <?php 
         $contage = mysqli_query($_SESSION['conexao'], "SELECT ((SELECT count(registro) as contagem from entrada where substring((current_time -1),8) - (SELECT count(registro) as contagem from saida where substring((current_time -1),8))) as cont");
            print_r ($contage);
        $resu = array();
          while ($fetch = mysqli_fetch_array($contage)) {
    
              echo "\n";
              array_push($resu, $fetch["cont"]);
              
          }
          echo "<h1>" . $resu[0]."</h1>";
          print_r($fetch);

    
          ?> 
    
    </left>      

<center>    
  <div id="logo">
      <h1>
        <center>
          <img src=data:image/png;base64,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 />
        </center>     
      </h1>
    
  </div>
</center>
    

       


    
	
  </main>

	

</body>

</html>