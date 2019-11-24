<?php
	header("Content-type: application/json");
	include("conexao.php");
	
	$p = $_POST["pg"];
	
	$consulta = "SELECT * FROM roupa";
	
	/*if(isset($_POST["nome_filtro"])){
		$nome = $_POST["nome_filtro"];
		$consulta .= " WHERE c.nome LIKE '%$nome%'";
	}*/
	
	$consulta .= " LIMIT $p,2";
	
	$resultado = mysqli_query($conexao,$consulta);
		 
	while($linha = mysqli_fetch_assoc($resultado)){
		$matriz[] = $linha;
	}
	
	echo json_encode($matriz);
?>