<?php
	sleep(2);

	include("conexao.php");
	session_start();
	
	$quant = $_POST["quant"];
	$CPF = $_SESSION["autorizado"];
	$id_roupa = $_POST["id_roupa"];
	
	$consulta = "SELECT IF(quantidade<0, quantidade*-1, quantidade) FROM roupa WHERE id_roupa=$id_roupa";
	
	$resultado = mysqli_query($conexao,$consulta) or die("0" .mysqli_error($conexao));
	
	if($resultado > $quant){
		
		$insercao = "INSERT INTO comprar(CPF,id_roupa,quantidade) VALUES('$CPF','$id_roupa','$quant')";
		
		mysqli_query($conexao,$insercao) or die("0" .mysqli_error($conexao));

		$update = "UPDATE roupa SET quantidade=(quantidade - $quant) WHERE id_roupa=$id_roupa";
		
		mysqli_query($conexao,$update) or die("0" .mysqli_error($conexao));

		echo "1";
	}else{
		echo"2";
	}
?>