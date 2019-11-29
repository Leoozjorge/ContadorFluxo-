<?php 
	
	session_start();

	$var = 3;
	
	$a = $var.':';
	
////////// Arrays recebidos de select.php adicionados em arrays locais ////////// 
	$arrayE = $_SESSION['eixoxE'];
///////// arrayE = periodos que ocorreram entradas///////
	$contagemE = $_SESSION['contagemE'];
//////// / contagemE = Quantidade de entradas no periodo especificado por arrayE//////
	$arrayS = $_SESSION['eixoxS'];
/////// arrayS = periodo que ocorreram saidas//////
	$contagemS = $_SESSION['contagemS'];
////// contagemS = quantidade de saidas que ocorreram no periodo especificado por arrayS/////

	$label1 = array("01","02","03","04","05","06","07","08","09","10","11","12");

	$label2 = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
	//$label2 = array("07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00");

	//print_r($arrayS);
	//print_r($arrayE);
	//echo $arrayE[0];
	//print_r($contagemS);
	//print_r($contagemE);
	//print_r($label);

	//$var = $_POST["SelectOptions"];
	//print_r($var);

	$arrayzito = array();
	$a = array();
	$y = array();
	$cont = 0;

//loop para varrer os dois arrays de entrada (arrayE e contagemE) e  preencher o array de visualização (arrayzito)//
	foreach($label1 as $y){ 
		if($cont == sizeof($arrayE))
			break;
        if($y == $arrayE[$cont]){
        	
        	array_push($arrayzito, $contagemE[$cont].",");	
        	$cont++;	
    	}else{
            array_push($arrayzito, "0, ");

        }

    }
    $cont1=0;
//loop para varrer os dois arrays de saida (arrayS contagemS) e  preencher o array de visualização (a)//
    foreach($label1 as $z){ 
//
		if($cont1 == sizeof($arrayS))
			break;

        if($z == $arrayS[$cont1]){
        	array_push($a, $contagemS[$cont1].",");	
        	$cont1++;	
    	}else{
            array_push($a, "0, ");
        }

    }
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="./Chartjs/Chart.min.js"></script>
	<script src="./Chartjs/utils.js"></script>
	<script src="./jspdf.min.js"></script>
	<script src="./html2canvas.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		//function geraPDF() {
		//	console.log(1);
		//	var doc = new jsPDF();
		//	doc.text('dsdnfjnfjsdfnj',20,20);
		//	doc.save('teste.pdf');
		//	html2canvas(document.body, {
		//		onrendered: function(canvas){
		//			console.log(2);
		//			var img = canvas.toDataURL();
		//			window.open(img);
		//			var doc = new jsPDF();
		//			doc.addImage(img, 'JPEG',20,20);
		//			doc.save('test.pdf');
		//		}
		//	});
		//}
		//$(function () {
      	//	var doc = new jsPDF();
     	//	var specialElementHandlers = {
        //		'#editor': function (element, renderer) {
          //		return true;
       		//}   
      	//};

      	//$('#cmd').click(function () {
        //	doc.fromHTML($('#container').html(), 15, 15, {
          //		'width': 170,
          	//	'elementHandlers': specialElementHandlers
        //	});
        //	doc.save('sample-file.pdf');
      //	});
    	//});
	</script>
</head>
<body>
	<div id="editor"></div>
	<button id="cmd">generate PDF</button>
	<!-- <a id="baixar" onclick="geraPDF()" href="#">Baixar</a> -->
	<div id="barraNavegacao">
	<ul id="navbar">
  		<li><a href="inicio.php">Inicio</a></li>
  		<li><a class="active" href="selecionaTeste.php">Relatórios</a></li>
  		<li><a href="sobre.php">Sobre</a></li>
  		<li id="sair"><a href="logout.php">Sair</a></li>
	</ul>
	</div>

	<main id="pagina">
	<center>
		<div id="container" style="width: 60%">
		<?php  
		//print_r ($contagem);
			if ($contagemE == NULL){
				echo "<h2>Não existem registros na data especificada<h2>";
			}else{
				echo "<canvas id="."myChart> </canvas>";
			}

		//print_r($arrayzito);
		//print_r($a);
		?>
	
		

	</div>
	</center>
	</main>
	<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: '<?php echo "bar";?>',

    // The data for our dataset
    data: {
        
        labels: [<?php foreach($label2 as $x){ echo /*",".*/"'".$x."'"."," ;}?>],
        datasets: [{
            label: 'Entradas ',
            backgroundColor: '#30446e',
            borderColor: '#30446e',
            data: [<?php foreach($arrayzito as $k){ echo (int)$k.",";}?>]

        },
        {
            label: 'Saidas ',
            backgroundColor: '#D73438',
            borderColor: '#D73438',
            data: [<?php foreach($a as $v){ echo (int)$v. ",";}?>]
        }
        ],
    },

    options: {
    	
    }
});

//<?php

//print_r($arrayzito);
		//print_r($a);

?>		
	
</script>

</body>

</html>