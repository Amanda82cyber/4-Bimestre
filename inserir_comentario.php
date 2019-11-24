<?php
	sleep(3);
	//include("menu.php");
	include("conexao.php");
	
	$coment = $_POST["coment"];
	$CPF = $_POST["cpf"];
	$id_roupa = $_POST["id_roupa"];
	$data = date('d/m/y');
	$hora = date('H:i:s');
	
	if($CPF==""){
		$insercao = "INSERT INTO comentario(CPF,id_roupa,comentario,data,hora) VALUES(NULL,'$id_roupa','$coment','$data','$hora')";		
	}else{
		$insercao = "INSERT INTO comentario(CPF,id_roupa,comentario,data,hora) VALUES('$CPF','$id_roupa','$coment','$data','$hora')";
	}

	mysqli_query($conexao,$insercao) or die("0" . mysqli_error($conexao));
	
	//include("rodape.php");
	echo "1";
?>