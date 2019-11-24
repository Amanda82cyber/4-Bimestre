<?php
	header("Content-type: application/json");
	include("conexao.php");
	
	$p = $_POST["pg"];
	
	$consulta = "SELECT r.marca as roupa_marca, 
						c.quantidade as quant_compra,
						r.preco as preco,
						cor, 
						tipo,
						(c.quantidade * r.preco) as total
				 FROM usuario u 
				 INNER JOIN comprar c
				 ON u.CPF = c.CPF
				 INNER JOIN roupa r
				 ON r.id_roupa = c.id_roupa
				 LIMIT $p,3";
	
	$resultado = mysqli_query($conexao,$consulta) or die ("Erro" .mysqli_error($conexao));

	while($linha = mysqli_fetch_assoc($resultado)){
		$matriz[] = $linha;
	}

	echo json_encode($matriz);
?>