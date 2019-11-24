<?php
	include("conexao.php");
	
	$id = $_POST["id_roupa"];
	$tabela = $_POST["tabela"];
	
	$remocao = "DELETE FROM $tabela WHERE id_$tabela='$id'";
	
	// mysqli_error($conexao)
	mysqli_query($conexao,$remocao) or die("0".mysqli_error());
	
	echo "1";
?>