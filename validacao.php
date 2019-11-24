<?php
	include("conexao.php");
	
	$usuario = $_POST["usuario"];
	$oq = $_POST["oq"];
	$senha = $_POST["senha"];
	
	if($oq == "loja"){
		$consulta1 = "SELECT * FROM loja
					  WHERE email = '$usuario'
					  AND senha = '$senha'";
				 
		$resultado1 = mysqli_query($conexao,$consulta1) or die ("0" .mysqli_error($conexao));
		
		if(mysqli_num_rows($resultado1) == 1){
			session_start();
			$linha = mysqli_fetch_assoc($resultado1);
			$_SESSION["autorizado"] = $linha["CNPJ"];
			$_SESSION["CliOuLoja"] = "Loja";
			echo "1";
		}else{
			echo "2";
		}
	}else{
		$consulta = "SELECT * FROM usuario
					 WHERE email = '$usuario'
					 AND senha = '$senha'";
				 
		$resultado = mysqli_query($conexao,$consulta) or die ("0" .mysqli_error($conexao));
		
		if(mysqli_num_rows($resultado) == 1){
			session_start();
			$linha = mysqli_fetch_assoc($resultado);
			$_SESSION["autorizado"] = $linha["CPF"];
			$_SESSION["CliOuLoja"] = "Usuário";
			echo "1";
		}else{
			echo "2";
		}
	}
?>