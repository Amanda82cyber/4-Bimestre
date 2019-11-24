<?php
	include("conexao.php");
	
	$nome = $_POST["nome"];
	$cnpj = $_POST["cnpj"];
	$est = $_POST["estado"];
	$cid = $_POST["cidade"];
	$rua = $_POST["rua"];
	$pais = $_POST["pais"];
	$senha = $_POST["senha"];
	$email = $_POST["email"];
	
	$insercao = "INSERT INTO loja(nome,CNPJ,estado,cidade,rua,pais,senha,email) VALUES('$nome','$cnpj','$est','$cid','$rua','$pais','$senha','$email')";
	
	mysqli_query($conexao,$insercao) or die("0" . mysqli_error($conexao));
	
	echo "1";
?>