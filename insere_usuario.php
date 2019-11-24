<?php
	include("conexao.php");
	
	$cpf = $_POST["cpf"];
	$cidade = $_POST["cidade"];
	$rua = $_POST["rua"];
	$estado = $_POST["estado"];
	$data_nascimento = $_POST["data_nascimento"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$pais = $_POST["pais"];
	$sexo = $_POST["sexo"];
	$cartao_credito = $_POST["cartao"];
	$senha = $_POST["senha"];
	
	$insercao = "INSERT INTO usuario(cpf,cidade,rua,estado,data_nascimento,nome,email,pais,sexo,cartao_credito,senha)
				 VALUES('$cpf','$cidade','$rua','$estado','$data_nascimento','$nome','$email','$pais','$sexo','$cartao_credito','$senha')";
				
	mysqli_query($conexao,$insercao) or die("0" . mysqli_error($conexao));
	
	echo "1";
?>