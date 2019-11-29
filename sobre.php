<!DOCTYPE html>
<html>
<head>
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
<body>
  <div id="barraNavegacao">
  <ul id="navbar">
      <li><a href="inicio.php">Inicio</a></li>
      <li><a href="selecionaTeste.php">Relatórios</a></li>
      <li><a class="active" href="sobre.php">Sobre</a></li>
      <li id="sair"><a href="logout.php">Sair</a></li>
  </ul>
  </div>

  <main id="pagina">
    <center>
      
      
    </center>
    
  </main>

  

</body>

</html>
