<?php
	header("Content-Type: Application/json");
	
	include("conexao.php");
	
	$p = $_GET["pagina"];
	$id_roupa = $_GET["id_roupa"];
	
	$con1 = "SELECT usuario.nome as nome_usuario,
					usuario.CPF as CPF,
					data,
					hora,
					comentario,
					material,
					cor, 
					tipo
			 FROM comentario
				LEFT JOIN usuario 
				ON comentario.CPF = usuario.CPF 
				INNER JOIN roupa 
				ON roupa.id_roupa = comentario.id_roupa 
				AND comentario.id_roupa = $id_roupa
				ORDER BY data
				LIMIT $p, 4";
				
	$resultado = mysqli_query($conexao,$con1) or die("0" .mysqli_error($conexao));
	
	while($linha = mysqli_fetch_assoc($resultado)){
		$matriz["coment"][] = $linha;
	}
	
	echo json_encode($matriz);
?>