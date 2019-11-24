<?php
	
	if(!(isset($_SESSION["CliOuLoja"]))){
		echo "<h2>Você não está autorizado a visualizar esta página \'-'/</h2>";
		echo "<h2>Faça o <a href = 'login.php'>Login</a></h2>";
		echo "</body></html>";
		die(); // die acaba com o algoritmo no ponto que foi colocado.
	}

?>