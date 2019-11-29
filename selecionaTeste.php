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
  		<li><a class="active" href="#">Relatórios</a></li>
  		<li><a href="sobre.php">Sobre</a></li>
  		<li id="sair"><a href="logout.php">Sair</a></li>
	</ul>
	</div>

	<main id="pagina">
		<center>
		<form id="formulario" method="post" action="select.php">
			<select name="SelectOptions" id="SelectOptions" required>
                <option value="" disabled selected>Selecione</option>
                <option name="seletor" value="Diario">Diario</option>
                <!--<option name="seletor" value="Periodo">Periodo</option>-->
                <option name="seletor" value="Mensal">Mensal</option>
                <option name="seletor" value="Anual">Anual</option>
        	</select><br><br>
  		<!-- <input type="radio" class="radio" name="seletor" value="Diario" > Diario<br>
  		<input type="radio" class="radio" name="seletor" value="Periodo"> Periodo<br>
  		<input type="radio" class="radio" name="seletor" value="Mensal"> Mensal<br><br> -->
  		
  		
  		<!--  -->

  			<div id="DivPai" class="DivPai">
  				<div id="Diario">
  					<label for="dataDiario">Selecione a Data: </label><br>
  					<input id="dataDiario" class="esconde" type="date" name="dataDiario"><br><br>
  				</div>
            	<!--<div id="Periodo">
            		<label for="dataIni">Data Inicial: </label><br>
                	<input id="dataIni" class="esconde" type="date" name="dataIni"><br><br>
                	<label for="dataFim">Data Final: </label><br>
  					<input id="dataFim" class="esconde" type="date" name="dataFim"><br><br>
            	</div>-->
    
            	<div id="Mensal">
            		<select name="mesSelect" id="mesSelect">
            			<option value="" disabled selected>Selecione o mes</option>
            			<option name="mesOption" value="01">Janeiro</option>
            			<option name="mesOption" value="02">Fevereiro</option>
            			<option name="mesOption" value="03">Março</option>
            			<option name="mesOption" value="04">Abril</option>
            			<option name="mesOption" value="05">Maio</option>
            			<option name="mesOption" value="06">Junho</option>
            			<option name="mesOption" value="07">Julho</option>
            			<option name="mesOption" value="08">Agosto</option>
            			<option name="mesOption" value="09">Setembro</option>
            			<option name="mesOption" value="10">Outubro</option>
            			<option name="mesOption" value="11">Novembro</option>
            			<option name="mesOption" value="12">Dezembro</option>
	            		
    	        	</select>
        	    	<select name="anoSelect" id="anoSelect">
            			<option value="" disabled selected>Selecione o ano</option>
            			<?php  
            				$ano = mysqli_query($_SESSION['conexao'], "SELECT DISTINCT substring(registro, 1, 4) as ano from entrada order by ano asc");
            				while ($fetch = mysqli_fetch_array($ano)) {
		
							//echo "\n";
								echo '<option name="anoOption" value="'.$fetch["ano"].'">'.$fetch["ano"].'</option>';
							}
            			?>
            		</select>
            	
                
            	</div>
    
            	<div id="Anual">
            		<select name="anoSelect" id="anoSelect">
            			<option value="" disabled selected>Selecione o ano</option>
            			<?php  
            				$ano = mysqli_query($_SESSION['conexao'], "SELECT DISTINCT substring(registro, 1, 4) as ano from entrada order by ano asc");
            				while ($fetch = mysqli_fetch_array($ano)) {
		
							//echo "\n";
								echo '<option name="anoOption" value="'.$fetch["ano"].'">'.$fetch["ano"].'</option>';
							}
        	    		?>
            		</select>
            	</div>
    	    </div>
    	</div>
				

  		<br><br>
  		<input type="submit" name="submit" class="button" value="Enviar">
		<br>
	</form>
	</center>

	

</body>
</html>
<?php

	


?>