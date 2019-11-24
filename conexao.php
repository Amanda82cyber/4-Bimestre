<?php
	$local = "localhost:3307";
	$usuario = "root";
	$senha = "usbw";
	$bd = "ad";
	
	$conexao = mysqli_connect($local,$usuario,$senha,$bd) or die("ERRO");
?>