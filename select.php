<?php  
	
	require_once 'conexao_bd.php';

	$var = $_POST["SelectOptions"];
	echo $var;

	switch ($var) {
		case "Mensal":
			$mes = $_POST["mesSelect"];
			$ano = $_POST["anoSelect"];
			echo $mes;
			$selecaoEntrada = mysqli_query($conexao, "SELECT count(registro) as contagem, substring(registro, 9, 2) as eixox from entrada where substring(registro, 6, 2) = '$mes' and substring(registro,1,4) = '$ano' GROUP by substring(registro, 9, 2) ORDER BY eixox ASC");
			$selecaoSaida = mysqli_query($conexao, "SELECT count(registro) as contagem, substring(registro, 9, 2) as eixox from saida where substring(registro, 6, 2) = '$mes' and substring(registro,1,4) = '$ano' GROUP by substring(registro, 9, 2) ORDER BY eixox ASC");

			break;

		case "Periodo":
			$ini = $_POST["dataIni"];
			$fim = $_POST["dataFim"];

			echo $fim;
			echo $ini;
			$selecaoEntrada = mysqli_query($conexao, "SELECT count(registro) as contagem, substring(registro, 12, 2) as eixox from entrada where registro BETWEEN $ini AND $fim GROUP by substring(registro, 12, 2) ORDER BY eixox ASC");
			$selecaoSaida = mysqli_query($conexao, "SELECT count(registro) as contagem, substring(registro, 12, 2) as eixox from saida where registro BETWEEN $ini AND $fim GROUP by substring(registro, 12, 2) ORDER BY eixox ASC");
			
			break;

		case "Diario":
			echo $_POST["dataDiario"];
			$dia =substr($_POST["dataDiario"], 0, 10);
			echo $dia;
			$selecaoEntrada = mysqli_query($conexao, "SELECT count(registro) as contagem, substring(registro, 12, 2) as eixox from entrada where substring(registro, 1, 10) = '$dia' GROUP by substring(registro, 12, 2) ORDER BY eixox ASC");
			$selecaoSaida = mysqli_query($conexao, "SELECT count(registro) as contagem, substring(registro, 12, 2) as eixox from saida where substring(registro, 1, 10) = '$dia' GROUP by substring(registro, 12, 2) ORDER BY eixox ASC");
			
			break;

		case "Anual":
			$ano = $_POST["anoSelect"];
			$selecaoEntrada = mysqli_query($conexao, "SELECT count(registro) as contagem, substring(registro, 6, 2) as eixox from entrada where substring(registro, 1, 4) = '$ano' GROUP by substring(registro, 6, 2) ORDER BY eixox ASC");
			$selecaoSaida = mysqli_query($conexao, "SELECT count(registro) as contagem, substring(registro, 6, 2) as eixox from saida where substring(registro, 1, 4) = '$ano' GROUP by substring(registro, 6, 2) ORDER BY eixox ASC");
			
			break;
	}

	$contagemE = array();
	$horaE = array();
	$contagemS = array();
	$horaS = array();
	while ($fetch = mysqli_fetch_array($selecaoEntrada)) {
		
		echo "\n";
		array_push($contagemE, $fetch["contagem"]);
		if($var == "Diario"){
			//echo 0000000;
			array_push($horaE, $fetch["eixox"].":00");
		}else{
			array_push($horaE, $fetch["eixox"]);
		}
		
	}
	while ($fetch = mysqli_fetch_array($selecaoSaida)) {
		
		echo "\n";
		array_push($contagemS, $fetch["contagem"]);
		if($var == "Diario"){
			//echo 0000000;
			array_push($horaS, $fetch["eixox"].":00");
		}else{
			array_push($horaS, $fetch["eixox"]);
		}
		
	}
	
	$_SESSION['contagemE'] = $contagemE;
	$_SESSION['eixoxE'] = $horaE;
	$_SESSION['contagemS'] = $contagemS;
	$_SESSION['eixoxS'] = $horaS;


	//header("Location: testaChartJS - Copia.php");
	
	?>
	
<?php   switch ($var){
		case "Anual": ?>	
			<?php header ("Location: testaChartJS - Anual.php"); ?> 
			<?php	break;  ?>
	<?php	case "Mensal": ?>
			<?php header ("Location: testaChartJS - Mensal.php");  ?>
	        <?php	break; ?> 
	<?php	case "Diario": ?>
			<?php	header ("Location: testaChartJS - Diario.php");  ?>
			<?php	break; ?>
	<?php	case "Periodo": ?>
			<?php	echo ("não implementado")  ?>
			<?php	break; ?>
	<?php   case (T_CASE): ?>
			<?php break;  }; ?> 

?>