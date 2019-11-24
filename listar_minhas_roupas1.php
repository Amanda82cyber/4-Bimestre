<?php
	header("Content-Type: Application/json");
	
	include("conexao.php");
	
	$p = $_GET["pagina"];
	
	$consulta = "SELECT marca, 
						id_roupa,
						l.CNPJ as CNPJ,
						tamanho, 
						preco, 
						cor, 
						tipo, 
						material, 
						quantidade, 
						l.nome as nome_loja, 
						genero, 
						foto, 
						ano_lancamento
				 FROM roupa r
				 INNER JOIN loja l
				 ON l.CNPJ = r.CNPJ
				 ORDER BY marca
				 LIMIT $p, 2";
	
	$resultado = mysqli_query($conexao,$consulta) or die("0" .mysqli_error($conexao));
	
	while($linha = mysqli_fetch_assoc($resultado)){
		$matriz["roupa"][] = $linha;
	}
	
	echo json_encode($matriz);
?>