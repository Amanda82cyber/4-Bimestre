<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" href = "../arquivos_bootstrap/css/bootstrap.css" />
		<script src = "../arquivos_bootstrap/js/jquery-3.4.1.min.js"></script>
		<script src = "../arquivos_bootstrap/js/bootstrap.min.js"></script>
	</head>	
	
	<body>
		<div class = "container-fluid">
			<div class = "container-fluid">
				<div class = "row justify-content-center">
					<div class="col-12 text-center">
						<h1 class = "card-header bg-dark text-white">Aristoclécia Fashion Week</h1>
					</div>
				</div>
			</div>	
		
		<?php
			
			session_start();
			
			include_once("conexao.php");
			
			echo '<div class="container-fluid mt-3 mb-3">
					  <div class="card text-center bg-secondary text-white">
						<div class="card-header">
							<ul class = "nav nav-tabs card-header-tabs">';
						if(isset($_SESSION["autorizado"])){
							if($_SESSION["CliOuLoja"] == "Loja"){
								echo '<li class = "nav-item"><a href = "form_roupa.php" class = "nav-link text-white">Roupas</a></li>
									  <li class = "nav-item"><a href = "logout.php" class = "nav-link text-white">Sair</a></li>';
							}else{
								echo '<li class = "nav-item"><a href = "listar_roupa1.php" class = "nav-link text-white">Listar Roupas</a></li>
									  <li class = "nav-item"><a href = "logout.php" class = "nav-link text-white">Sair</a></li>';
							}
						}else{
							echo '<li class = "nav-item"><a href = "login.php" class = "nav-link text-white">Logar</a></li>
								   <li class = "nav-item"><a href = "listar_roupa1.php" class = "nav-link text-white">Listar Roupas</a></li>';
						}
					  echo '</ul>
						</div>
					  </div>
				  </div>';
		?>
