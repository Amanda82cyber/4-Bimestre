<?php
	include("conexao.php");
	session_start();
	
	$material = $_POST["material"];
	$tamanho = $_POST["tamanho"];
	$ano_lancamento = $_POST["ano_lancamento"];
	$marca = $_POST["marca"];
	$quantidade = $_POST["quantidade"];
	$cor = $_POST["cor"];
	$tipo = $_POST["tipo"];
	$preco = $_POST["preco"];
	$genero = $_POST["genero"];
	$cnpj = $_SESSION["autorizado"];
	
	// var dump mostra se está vindo algo ou não --> tirei esta parte
	
	$foto = $_FILES['arquivo']; // esta variável contém a imagem
	
	if (!empty($foto["name"])) {
 
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);

		}
	}
	
	$insercao = "INSERT INTO roupa(material,tamanho,ano_lancamento,quantidade,marca,cor,tipo,preco,genero,CNPJ,foto)
				 VALUES('$material','$tamanho','$ano_lancamento','$quantidade','$marca','$cor','$tipo','$preco','$genero','$cnpj','$nome_imagem')";
				 
	mysqli_query($conexao,$insercao) or die($insercao."0" . mysqli_error($conexao));
	
	echo "1";
?>